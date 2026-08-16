#!/usr/bin/env bash
set -Eeuo pipefail

umask 077

readonly REMOTE_USER="${REMOTE_USER:-root}"
readonly REMOTE_HOST="${REMOTE_HOST:-31.97.160.61}"
readonly REMOTE_PATH="/var/www/html/gulini.com.br"
readonly BACKUP_ROOT="/var/backups/gulini.com.br"
readonly SITE_URL="https://gulini.com.br"
readonly EXPECTED_DEPLOY_BRANCH="feature/seo-landing-conversion"
readonly PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
readonly SOURCE_PATH="${PROJECT_ROOT}/"

declare -ar PUBLIC_ROOT_FILES=(
  ".htaccess"
  "index.php"
  "portfolio.php"
  "robots.txt"
  "sitemap.xml"
)

declare -ar SSH_COMMAND=(
  ssh
  -o BatchMode=yes
  -o PasswordAuthentication=no
  -o KbdInteractiveAuthentication=no
  -o ChallengeResponseAuthentication=no
  -o PreferredAuthentications=publickey
  -o PubkeyAuthentication=yes
  -o StrictHostKeyChecking=yes
  -o ConnectTimeout=10
  -o ConnectionAttempts=1
)

printf -v RSYNC_SSH_COMMAND '%q ' "${SSH_COMMAND[@]}"
RSYNC_SSH_COMMAND="${RSYNC_SSH_COMMAND% }"
readonly RSYNC_SSH_COMMAND

declare -ar RSYNC_FILTERS=(
  "--include=/.htaccess"
  "--exclude=.*"
  "--exclude=*.md"
  "--exclude=*.markdown"
  "--exclude=*.yml"
  "--exclude=*.yaml"
  "--exclude=*.pem"
  "--exclude=*.key"
  "--exclude=*.sql"
  "--exclude=*.bak"
  "--include=/index.php"
  "--include=/portfolio.php"
  "--include=/robots.txt"
  "--include=/sitemap.xml"
  "--include=/assets/***"
  "--exclude=*"
)

declare -ar RSYNC_BASE_ARGS=(
  -az
  --checksum
  --delete-delay
  --delay-updates
  --omit-dir-times
  --itemize-changes
  --human-readable
  --safe-links
  --no-devices
  --no-specials
  --chown=www-data:www-data
  --chmod=D755,F644
)

MODE="dry-run"
ROLLBACK_ID=""
SSH_TARGET=""
GIT_BRANCH=""
GIT_COMMIT=""
GIT_DIRTY=""
PAYLOAD_HASH=""
PAYLOAD_KB=0
DEPLOY_ID=""
ROLLBACK_NEEDED="false"

log() {
  printf '%s\n' "$*"
}

warn() {
  printf 'Aviso: %s\n' "$*" >&2
}

die() {
  printf 'Erro: %s\n' "$*" >&2
  exit 1
}

usage() {
  cat <<'USAGE'
Uso:
  ./scripts/deploy_vps.sh                         # simula o deploy
  ./scripts/deploy_vps.sh --dry-run               # simula o deploy
  ./scripts/deploy_vps.sh --apply                 # executa o deploy real
  ./scripts/deploy_vps.sh --rollback <backup-id>  # restaura um backup

O destino e fixo em /var/www/html/gulini.com.br.
REMOTE_USER e REMOTE_HOST podem selecionar o acesso SSH, sem senha no script.
USAGE
}

parse_arguments() {
  case "$#" in
    0)
      MODE="dry-run"
      ;;
    1)
      case "$1" in
        --apply)
          MODE="apply"
          ;;
        --dry-run)
          MODE="dry-run"
          ;;
        -h|--help)
          usage
          exit 0
          ;;
        *)
          usage >&2
          exit 2
          ;;
      esac
      ;;
    2)
      if [[ "$1" != "--rollback" ]]; then
        usage >&2
        exit 2
      fi

      MODE="rollback"
      ROLLBACK_ID="$2"
      ;;
    *)
      usage >&2
      exit 2
      ;;
  esac

  if [[ "$MODE" == "rollback" ]] &&
    ! valid_backup_id "$ROLLBACK_ID"; then
    die "backup-id invalido; use YYYYMMDDTHHMMSSZ-<12 caracteres hexadecimais>."
  fi
}

valid_backup_id() {
  local backup_id="$1"
  local timestamp
  local normalized_timestamp

  [[ "$backup_id" =~ ^[0-9]{8}T([01][0-9]|2[0-3])[0-5][0-9][0-5][0-9]Z-[0-9a-f]{12}$ ]] ||
    return 1

  timestamp="${backup_id%%-*}"
  normalized_timestamp="$(
    date -u \
      -d "${timestamp:0:8} ${timestamp:9:2}:${timestamp:11:2}:${timestamp:13:2} UTC" \
      '+%Y%m%dT%H%M%SZ' 2>/dev/null
  )" || return 1

  [[ "$normalized_timestamp" == "$timestamp" ]]
}

require_command() {
  local command_name="$1"
  command -v "$command_name" >/dev/null 2>&1 ||
    die "comando obrigatorio nao encontrado: ${command_name}"
}

validate_connection_config() {
  [[ "$REMOTE_USER" =~ ^[a-z_][a-z0-9_-]*$ ]] ||
    die "REMOTE_USER possui formato invalido."
  [[ "$REMOTE_HOST" =~ ^[A-Za-z0-9][A-Za-z0-9.-]*$ ]] ||
    die "REMOTE_HOST possui formato invalido."

  SSH_TARGET="${REMOTE_USER}@${REMOTE_HOST}"
}

validate_local_dependencies() {
  local command_name

  for command_name in ssh rsync curl php node git sha256sum find sort xargs du awk date sleep; do
    require_command "$command_name"
  done
}

validate_rollback_dependencies() {
  local command_name

  for command_name in ssh curl; do
    require_command "$command_name"
  done
}

validate_local_payload() {
  local relative_path
  local php_file
  local js_file
  local unsafe_entry
  local forbidden_entry

  for relative_path in "${PUBLIC_ROOT_FILES[@]}"; do
    [[ -f "${PROJECT_ROOT}/${relative_path}" ]] ||
      die "arquivo publico ausente: ${relative_path}"
    [[ ! -L "${PROJECT_ROOT}/${relative_path}" ]] ||
      die "links simbolicos nao sao permitidos no payload: ${relative_path}"
  done

  [[ -d "${PROJECT_ROOT}/assets" && ! -L "${PROJECT_ROOT}/assets" ]] ||
    die "diretorio publico assets ausente ou inseguro."

  unsafe_entry="$(
    find "${PROJECT_ROOT}/assets" \
      \( -type l -o -type b -o -type c -o -type p -o -type s \) \
      -print -quit
  )"
  [[ -z "$unsafe_entry" ]] ||
    die "entrada especial nao permitida no payload: ${unsafe_entry}"

  forbidden_entry="$(
    find "${PROJECT_ROOT}/assets" \
      \( \
        -path '*/.*' \
        -o -iname '*.md' \
        -o -iname '*.markdown' \
        -o -iname '*.yml' \
        -o -iname '*.yaml' \
        -o -iname '*.pem' \
        -o -iname '*.key' \
        -o -iname '*.sql' \
        -o -iname '*.bak' \
        -o -iname 'README*' \
        -o -iname 'id_rsa*' \
        -o -iname 'id_ed25519*' \
      \) \
      -print -quit
  )"
  [[ -z "$forbidden_entry" ]] ||
    die "arquivo interno ou sensivel nao permitido no payload: ${forbidden_entry}"

  php -l "${PROJECT_ROOT}/index.php" >/dev/null
  php -l "${PROJECT_ROOT}/portfolio.php" >/dev/null

  while IFS= read -r -d '' php_file; do
    php -l "$php_file" >/dev/null
  done < <(find "${PROJECT_ROOT}/assets" -type f -name '*.php' -print0)

  while IFS= read -r -d '' js_file; do
    node --check "$js_file" >/dev/null
  done < <(find "${PROJECT_ROOT}/assets" -type f -name '*.js' -print0)
}

calculate_payload_hash() {
  (
    cd "$PROJECT_ROOT"
    export LC_ALL=C
    {
      find assets -type d -printf 'directory:%p\n' | sort
      {
        printf '%s\0' "${PUBLIC_ROOT_FILES[@]}"
        find assets -type f -print0
      } |
        sort -z |
        xargs -0 sha256sum --
    } |
      sha256sum |
      awk '{print $1}'
  )
}

inspect_local_release() {
  GIT_BRANCH="$(git -C "$PROJECT_ROOT" branch --show-current)"
  [[ -n "$GIT_BRANCH" ]] || GIT_BRANCH="detached"

  GIT_COMMIT="$(git -C "$PROJECT_ROOT" rev-parse HEAD)"
  [[ "$GIT_COMMIT" =~ ^[0-9a-f]{40,64}$ ]] ||
    die "nao foi possivel determinar um commit Git valido."

  if [[ -n "$(git -C "$PROJECT_ROOT" status --porcelain --untracked-files=all)" ]]; then
    GIT_DIRTY="yes"
  else
    GIT_DIRTY="no"
  fi

  PAYLOAD_HASH="$(calculate_payload_hash)"
  [[ "$PAYLOAD_HASH" =~ ^[0-9a-f]{64}$ ]] ||
    die "nao foi possivel calcular o hash do payload."

  PAYLOAD_KB="$(du -sk "${PROJECT_ROOT}/assets" | awk '{print $1}')"
  [[ "$PAYLOAD_KB" =~ ^[0-9]+$ ]] ||
    die "nao foi possivel calcular o tamanho do payload."
  PAYLOAD_KB=$((PAYLOAD_KB + 1024))

  log "Branch:       ${GIT_BRANCH}"
  log "Commit:       ${GIT_COMMIT}"
  log "Git alterado: ${GIT_DIRTY}"
  log "Payload SHA:  ${PAYLOAD_HASH}"
}

ensure_payload_unchanged() {
  local current_hash

  current_hash="$(calculate_payload_hash)"
  [[ "$current_hash" == "$PAYLOAD_HASH" ]] ||
    die "o payload foi alterado durante o deploy; operacao interrompida."
}

remote_bash() {
  local remote_command="bash -se --"
  local argument
  local quoted_argument

  for argument in "$@"; do
    printf -v quoted_argument '%q' "$argument"
    remote_command+=" ${quoted_argument}"
  done

  "${SSH_COMMAND[@]}" "$SSH_TARGET" "$remote_command"
}

preflight_remote() {
  local required_kb=$((PAYLOAD_KB * 3))

  remote_bash "$required_kb" <<'REMOTE'
set -Eeuo pipefail

readonly required_kb="$1"
readonly target="/var/www/html/gulini.com.br"
readonly backup_parent="/var/backups"
readonly backup_root="/var/backups/gulini.com.br"

[[ "$required_kb" =~ ^[0-9]+$ ]]
[[ -d "$target" && ! -L "$target" ]]
[[ "$(realpath -e -- "$target")" == "$target" ]]
[[ -w "$target" ]]
[[ "$(stat -c '%U:%G' -- "$target")" == "www-data:www-data" ]]

for command_name in rsync php apache2ctl curl realpath install stat find awk grep df systemctl mkdir chmod mv sha256sum sort xargs; do
  command -v "$command_name" >/dev/null
done

systemctl is-active --quiet apache2
apache2ctl -t
apache2ctl -M 2>/dev/null | grep 'rewrite_module' >/dev/null

for config_file in \
  /etc/apache2/sites-enabled/gulini.com.br.conf \
  /etc/apache2/sites-enabled/gulini.com.br-le-ssl.conf; do
  [[ -r "$config_file" ]]
  awk -v target="$target" \
    '$1 == "DocumentRoot" && $2 == target { found = 1 } END { exit !found }' \
    "$config_file"
done

for protected_dir in construtora-acredite diorran mokbeats; do
  [[ -d "${target}/${protected_dir}" ]]
done

for forbidden_file in \
  AGENTS.md CLAUDE.md PROJECT_RULES.md README_INSTALACAO_CLAUDE_CODE.md \
  plano-5.md prompt-claude-auditor.md; do
  if [[ -e "${target}/${forbidden_file}" || -L "${target}/${forbidden_file}" ]]; then
    printf 'Arquivo interno encontrado no DocumentRoot: %s\n' "$forbidden_file" >&2
    exit 1
  fi
done

[[ -d "$backup_parent" && ! -L "$backup_parent" ]]
[[ "$(realpath -e -- "$backup_parent")" == "$backup_parent" ]]
[[ -w "$backup_parent" ]]

if [[ -e "$backup_root" || -L "$backup_root" ]]; then
  [[ -d "$backup_root" && ! -L "$backup_root" ]]
  [[ "$(realpath -e -- "$backup_root")" == "$backup_root" ]]
fi

available_kb="$(df -Pk "$target" | awk 'NR == 2 { print $4 }')"
[[ "$available_kb" =~ ^[0-9]+$ ]]
((available_kb >= required_kb))

printf 'SSH por chave: ok\n'
printf 'DocumentRoot: %s\n' "$target"
printf 'Espaco disponivel: %s KiB\n' "$available_kb"
REMOTE
}

run_rsync() {
  local sync_mode="$1"
  local -a arguments=("${RSYNC_BASE_ARGS[@]}")

  if [[ "$sync_mode" == "dry-run" ]]; then
    arguments+=(--dry-run)
  elif [[ "$sync_mode" != "apply" ]]; then
    die "modo rsync interno invalido: ${sync_mode}"
  fi

  rsync \
    "${arguments[@]}" \
    "${RSYNC_FILTERS[@]}" \
    -e "$RSYNC_SSH_COMMAND" \
    "$SOURCE_PATH" \
    "${SSH_TARGET}:${REMOTE_PATH}/"
}

create_remote_backup() {
  remote_bash \
    "$DEPLOY_ID" \
    "$GIT_BRANCH" \
    "$GIT_COMMIT" \
    "$GIT_DIRTY" \
    "$PAYLOAD_HASH" <<'REMOTE'
set -Eeuo pipefail
umask 077

readonly backup_id="$1"
readonly branch="$2"
readonly commit="$3"
readonly dirty="$4"
readonly payload_hash="$5"
readonly target="/var/www/html/gulini.com.br"
readonly backup_root="/var/backups/gulini.com.br"
readonly backup="${backup_root}/${backup_id}"
readonly site_backup="${backup}/site"

[[ "$backup_id" =~ ^[0-9]{8}T([01][0-9]|2[0-3])[0-5][0-9][0-5][0-9]Z-[0-9a-f]{12}$ ]]
[[ "$commit" =~ ^[0-9a-f]{40,64}$ ]]
[[ "$dirty" == "yes" || "$dirty" == "no" ]]
[[ "$payload_hash" =~ ^[0-9a-f]{64}$ ]]
[[ -d "$target" && ! -L "$target" ]]
[[ "$(realpath -e -- "$target")" == "$target" ]]

[[ ! -L "$backup_root" ]]
install -d -m 0700 -- "$backup_root"
[[ "$(realpath -e -- "$backup_root")" == "$backup_root" ]]
[[ ! -e "$backup" && ! -L "$backup" ]]

mkdir -m 0700 -- "$backup"
mkdir -m 0700 -- "$site_backup"

sources=()
for relative_path in .htaccess index.php portfolio.php robots.txt sitemap.xml; do
  if [[ -e "${target}/${relative_path}" || -L "${target}/${relative_path}" ]]; then
    sources+=("${target}/${relative_path}")
  fi
done
[[ -d "${target}/assets" && ! -L "${target}/assets" ]]
sources+=("${target}/assets")

rsync -a -- "${sources[@]}" "${site_backup}/"

backup_hash="$(
  cd "$site_backup"
  export LC_ALL=C
  find . -type f -print0 |
    sort -z |
    xargs -0 sha256sum -- |
    sha256sum |
    awk '{print $1}'
)"
[[ "$backup_hash" =~ ^[0-9a-f]{64}$ ]]

{
  printf 'backup_id=%s\n' "$backup_id"
  printf 'branch=%s\n' "$branch"
  printf 'commit=%s\n' "$commit"
  printf 'git_dirty=%s\n' "$dirty"
  printf 'payload_sha256=%s\n' "$payload_hash"
  printf 'backup_sha256=%s\n' "$backup_hash"
  printf 'created_at_utc=%s\n' "${backup_id%%-*}"
} >"${backup}/metadata"
chmod 0600 "${backup}/metadata"
: >"${backup}/.complete"
chmod 0600 "${backup}/.complete"

printf 'Backup criado: %s\n' "$backup"
REMOTE
}

move_remote_repository() {
  remote_bash "$DEPLOY_ID" <<'REMOTE'
set -Eeuo pipefail

readonly backup_id="$1"
readonly target="/var/www/html/gulini.com.br"
readonly backup_root="/var/backups/gulini.com.br"
readonly backup="${backup_root}/${backup_id}"
readonly repository_backup="${backup}/repository.git"

[[ "$backup_id" =~ ^[0-9]{8}T([01][0-9]|2[0-3])[0-5][0-9][0-5][0-9]Z-[0-9a-f]{12}$ ]]
[[ -d "$target" && ! -L "$target" ]]
[[ "$(realpath -e -- "$target")" == "$target" ]]
[[ -d "$backup" && ! -L "$backup" ]]
[[ "$(realpath -e -- "$backup")" == "$backup" ]]
[[ -f "${backup}/.complete" && ! -L "${backup}/.complete" ]]
[[ ! -e "$repository_backup" && ! -L "$repository_backup" ]]

if [[ -e "${target}/.git" || -L "${target}/.git" ]]; then
  mv -- "${target}/.git" "$repository_backup"
  printf 'Repositorio Git movido para: %s\n' "$repository_backup"
else
  printf 'Repositorio Git ja esta fora do DocumentRoot.\n'
fi
REMOTE
}

restore_remote_backup() {
  local backup_id="$1"

  remote_bash "$backup_id" <<'REMOTE'
set -Eeuo pipefail

readonly backup_id="$1"
readonly target="/var/www/html/gulini.com.br"
readonly backup_root="/var/backups/gulini.com.br"
readonly backup="${backup_root}/${backup_id}"
readonly site_backup="${backup}/site"

[[ "$backup_id" =~ ^[0-9]{8}T([01][0-9]|2[0-3])[0-5][0-9][0-5][0-9]Z-[0-9a-f]{12}$ ]]
[[ -d "$target" && ! -L "$target" ]]
[[ "$(realpath -e -- "$target")" == "$target" ]]
[[ -d "$backup_root" && ! -L "$backup_root" ]]
[[ "$(realpath -e -- "$backup_root")" == "$backup_root" ]]
[[ -d "$backup" && ! -L "$backup" ]]
[[ "$(realpath -e -- "$backup")" == "$backup" ]]
[[ -d "$site_backup" && ! -L "$site_backup" ]]
[[ "$(realpath -e -- "$site_backup")" == "$site_backup" ]]
[[ -f "${backup}/.complete" && ! -L "${backup}/.complete" ]]
[[ -f "${backup}/metadata" && ! -L "${backup}/metadata" ]]

expected_backup_hash="$(
  awk -F= '$1 == "backup_sha256" { print substr($0, index($0, "=") + 1) }' \
    "${backup}/metadata"
)"
[[ "$expected_backup_hash" =~ ^[0-9a-f]{64}$ ]]

actual_backup_hash="$(
  cd "$site_backup"
  export LC_ALL=C
  find . -type f -print0 |
    sort -z |
    xargs -0 sha256sum -- |
    sha256sum |
    awk '{print $1}'
)"
[[ "$actual_backup_hash" == "$expected_backup_hash" ]]

rsync \
  -az \
  --checksum \
  --delete-delay \
  --delay-updates \
  --omit-dir-times \
  --itemize-changes \
  --safe-links \
  --no-devices \
  --no-specials \
  --chown=www-data:www-data \
  --chmod=D755,F644 \
  --include='/.htaccess' \
  --exclude='.*' \
  --exclude='*.md' \
  --exclude='*.markdown' \
  --exclude='*.yml' \
  --exclude='*.yaml' \
  --exclude='*.pem' \
  --exclude='*.key' \
  --exclude='*.sql' \
  --exclude='*.bak' \
  --include='/index.php' \
  --include='/portfolio.php' \
  --include='/robots.txt' \
  --include='/sitemap.xml' \
  --include='/assets/***' \
  --exclude='*' \
  "${site_backup}/" \
  "${target}/"

printf 'Backup restaurado: %s\n' "$backup"
printf 'O diretorio .git permaneceu fora do DocumentRoot.\n'
REMOTE
}

verify_remote_state() {
  remote_bash <<'REMOTE'
set -Eeuo pipefail

readonly target="/var/www/html/gulini.com.br"

[[ -d "$target" && ! -L "$target" ]]
[[ "$(realpath -e -- "$target")" == "$target" ]]
[[ ! -e "${target}/.git" && ! -L "${target}/.git" ]]

apache2ctl -t
php -l "${target}/index.php" >/dev/null
php -l "${target}/portfolio.php" >/dev/null
find "${target}/assets" -type f -name '*.php' -exec php -l {} \; >/dev/null

for origin_path in \
  / \
  /portfolio.php \
  /assets/css/styles.css \
  /assets/js/script.js \
  /sitemap.xml \
  /construtora-acredite/ \
  /diorran/ \
  /mokbeats/; do
  origin_status="$(
    curl \
      --silent \
      --show-error \
      --location \
      --connect-timeout 5 \
      --max-time 20 \
      --path-as-is \
      --resolve gulini.com.br:443:127.0.0.1 \
      --output /dev/null \
      --write-out '%{http_code}' \
      "https://gulini.com.br${origin_path}"
  )"
  [[ "$origin_status" == "200" ]]
done

for relative_path in .htaccess index.php portfolio.php robots.txt sitemap.xml; do
  [[ "$(stat -c '%U:%G %a' -- "${target}/${relative_path}")" == "www-data:www-data 644" ]]
done

invalid_asset="$(
  find "${target}/assets" \
    \( \
      -type d \( ! -user www-data -o ! -group www-data -o ! -perm 0755 \) \
      -o \
      -type f \( ! -user www-data -o ! -group www-data -o ! -perm 0644 \) \
    \) \
    -print -quit
)"
[[ -z "$invalid_asset" ]]

for protected_dir in construtora-acredite diorran mokbeats; do
  [[ -d "${target}/${protected_dir}" ]]
done

printf 'Sintaxe, ownership, modos e arquivos protegidos: ok\n'
REMOTE
}

verify_sync_matches_source() {
  local differences

  differences="$(run_rsync dry-run)"
  if [[ -n "$differences" ]]; then
    printf '%s\n' "$differences" >&2
    die "a verificacao pos-deploy encontrou diferencas no payload remoto."
  fi
}

http_status() {
  local path="$1"
  local separator="?"
  local cache_token="${DEPLOY_ID:-${GIT_COMMIT:-preflight}}"

  if [[ "$path" == *\?* ]]; then
    separator="&"
  fi

  curl \
    --silent \
    --show-error \
    --location \
    --max-redirs 5 \
    --connect-timeout 5 \
    --max-time 20 \
    --path-as-is \
    --header 'Cache-Control: no-cache' \
    --output /dev/null \
    --write-out '%{http_code}' \
    "${SITE_URL}${path}${separator}deploy_check=${cache_token}"
}

expect_http_status() {
  local path="$1"
  local label="$2"
  shift 2

  local attempt
  local status
  local expected

  for ((attempt = 1; attempt <= 3; attempt++)); do
    status=""

    if status="$(http_status "$path")"; then
      for expected in "$@"; do
        if [[ "$status" == "$expected" ]]; then
          log "HTTP ${status}: ${label}"
          return 0
        fi
      done
    fi

    if ((attempt < 3)); then
      warn "health check ${label} falhou na tentativa ${attempt}; repetindo."
      sleep 2
    fi
  done

  [[ -n "$status" ]] || status="falha de conexao"
  die "health check invalido para ${label}: HTTP ${status}; esperado: $*"
}

check_core_health() {
  expect_http_status "/" "pagina inicial" 200
  expect_http_status "/portfolio.php" "portfolio" 200
  expect_http_status "/assets/css/styles.css" "CSS principal" 200
  expect_http_status "/assets/js/script.js" "JavaScript principal" 200
  expect_http_status "/robots.txt" "robots.txt" 200
  expect_http_status "/sitemap.xml" "sitemap.xml" 200
  expect_http_status "/construtora-acredite/" "subprojeto construtora-acredite" 200
  expect_http_status "/diorran/" "subprojeto diorran" 200
  expect_http_status "/mokbeats/" "subprojeto mokbeats" 200
}

check_predeploy_security_status() {
  local status

  if ! status="$(http_status "/.git/HEAD")"; then
    warn "nao foi possivel consultar /.git/HEAD antes do deploy."
    return 0
  fi

  if [[ "$status" == "403" || "$status" == "404" ]]; then
    log "HTTP ${status}: .git ja esta protegido"
  else
    warn "/.git/HEAD responde HTTP ${status}; o apply movera e bloqueara esse diretorio."
  fi
}

check_postdeploy_security() {
  expect_http_status "/.git/HEAD" ".git protegido" 403 404
  expect_http_status "/%2egit/HEAD" ".git codificado protegido" 403 404
  expect_http_status "/.htaccess" ".htaccess protegido" 403
  expect_http_status "/.env" ".env protegido" 403
  expect_http_status "/assets/.cache/codex-check" "dotdir aninhado protegido" 403
  expect_http_status "/assets/.well-known/codex-check" ".well-known aninhado protegido" 403
  expect_http_status "/.well-known/.secret" "dotfile sob .well-known protegido" 403
  expect_http_status "/.well-known/acme-challenge/codex-check-inexistente" ".well-known preservado" 404
  expect_http_status "/assets/js/header.js" "JavaScript obsoleto removido" 404
}

check_rollback_health() {
  check_core_health
  expect_http_status "/.git/HEAD" ".git permanece fora do DocumentRoot" 403 404
}

rollback_after_failure() {
  local original_status="$1"
  local rollback_status=0

  trap - EXIT INT TERM HUP
  set +e

  warn "falha detectada; iniciando rollback automatico ${DEPLOY_ID}."
  restore_remote_backup "$DEPLOY_ID"
  rollback_status=$?

  if ((rollback_status == 0)); then
    verify_remote_state
    rollback_status=$?
  fi

  if ((rollback_status == 0)); then
    (check_rollback_health)
    rollback_status=$?
  fi

  if ((rollback_status != 0)); then
    printf 'Erro critico: rollback automatico falhou. Backup preservado: %s/%s\n' \
      "$BACKUP_ROOT" "$DEPLOY_ID" >&2
    exit 90
  fi

  warn "rollback automatico concluido; backup preservado em ${BACKUP_ROOT}/${DEPLOY_ID}."
  exit "$original_status"
}

handle_exit() {
  local status=$?

  trap - EXIT

  if ((status != 0)) && [[ "$ROLLBACK_NEEDED" == "true" ]]; then
    rollback_after_failure "$status"
  fi

  exit "$status"
}

run_dry_run() {
  log "Modo dry-run: nenhuma alteracao sera feita na VPS."
  log "Origem:  ${SOURCE_PATH}"
  log "Destino: ${SSH_TARGET}:${REMOTE_PATH}/"

  preflight_remote
  check_core_health
  check_predeploy_security_status

  log "Alteracoes previstas pelo rsync:"
  run_rsync dry-run
  log "Dry-run concluido sem criar backup ou alterar a VPS."
}

run_apply() {
  [[ "$GIT_BRANCH" == "$EXPECTED_DEPLOY_BRANCH" ]] ||
    die "branch nao autorizada para deploy: ${GIT_BRANCH}; esperada: ${EXPECTED_DEPLOY_BRANCH}."

  DEPLOY_ID="$(date -u +%Y%m%dT%H%M%SZ)-${GIT_COMMIT:0:12}"
  valid_backup_id "$DEPLOY_ID" ||
    die "nao foi possivel gerar um identificador de deploy valido."

  log "Modo apply: deploy real para ${SSH_TARGET}:${REMOTE_PATH}/"
  log "Backup ID: ${DEPLOY_ID}"

  preflight_remote
  check_core_health
  create_remote_backup

  ROLLBACK_NEEDED="true"
  trap handle_exit EXIT
  trap 'exit 130' INT
  trap 'exit 143' TERM
  trap 'exit 129' HUP

  move_remote_repository
  ensure_payload_unchanged
  run_rsync apply
  ensure_payload_unchanged
  verify_remote_state
  verify_sync_matches_source
  check_core_health
  check_postdeploy_security

  ROLLBACK_NEEDED="false"
  trap - EXIT INT TERM HUP

  log "Deploy concluido com sucesso."
  log "Backup para rollback: ${BACKUP_ROOT}/${DEPLOY_ID}"
}

run_explicit_rollback() {
  log "Rollback solicitado: ${ROLLBACK_ID}"
  preflight_remote
  restore_remote_backup "$ROLLBACK_ID"
  verify_remote_state
  check_rollback_health
  log "Rollback concluido. O diretorio .git permaneceu fora do DocumentRoot."
}

main() {
  parse_arguments "$@"
  validate_connection_config

  case "$MODE" in
    dry-run|apply)
      validate_local_dependencies
      validate_local_payload
      inspect_local_release

      if [[ "$MODE" == "dry-run" ]]; then
        run_dry_run
      else
        run_apply
      fi
      ;;
    rollback)
      validate_rollback_dependencies
      PAYLOAD_KB=0
      run_explicit_rollback
      ;;
    *)
      die "modo interno invalido: ${MODE}"
      ;;
  esac
}

main "$@"
