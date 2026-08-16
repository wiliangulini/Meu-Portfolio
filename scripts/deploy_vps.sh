#!/usr/bin/env bash
set -euo pipefail

REMOTE_USER="${REMOTE_USER:-root}"
REMOTE_HOST="${REMOTE_HOST:-31.97.160.61}"
REMOTE_PATH="${REMOTE_PATH:-/var/www/html/gulini.com.br/newVersion/}"
PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SOURCE_PATH="${PROJECT_ROOT}/"
MODE="dry-run"

usage() {
  cat <<USAGE
Uso:
  ./scripts/deploy_vps.sh            # simula o deploy
  ./scripts/deploy_vps.sh --dry-run  # simula o deploy
  ./scripts/deploy_vps.sh --apply    # executa o deploy real
USAGE
}

if [[ $# -gt 1 ]]; then
  usage
  exit 1
fi

if [[ $# -eq 1 ]]; then
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
      usage
      exit 1
      ;;
  esac
fi

RSYNC_ARGS=(
  -az
  --delete
  --itemize-changes
  --exclude=".git/"
  --exclude=".agents/"
  --exclude=".codex/"
  --exclude=".claude/"
  --exclude=".playwright-mcp/"
  --exclude="scripts/"
  --exclude="node_modules/"
  --exclude=".DS_Store"
)

if [[ "$MODE" == "dry-run" ]]; then
  RSYNC_ARGS+=(--dry-run)
  echo "Modo dry-run: nenhum arquivo sera alterado na VPS."
else
  echo "Modo apply: o deploy real sera enviado para a VPS."
fi

echo "Origem:  ${SOURCE_PATH}"
echo "Destino: ${REMOTE_USER}@${REMOTE_HOST}:${REMOTE_PATH}"

ssh "${REMOTE_USER}@${REMOTE_HOST}" "mkdir -p '${REMOTE_PATH}'"
rsync "${RSYNC_ARGS[@]}" "${SOURCE_PATH}" "${REMOTE_USER}@${REMOTE_HOST}:${REMOTE_PATH}"
