# Instalação — Configuração Claude Code Senior Agent

## Onde colocar os arquivos

Copie os arquivos para a raiz do projeto, ficando assim:

```txt
.
├── PROJECT_RULES.md
├── CLAUDE.md
├── AGENTS.md
└── .claude/
    ├── settings.json
    ├── commands/
    │   ├── implementar-etapa.md
    │   ├── revisar-implementacao.md
    │   ├── corrigir-bug.md
    │   ├── refatorar-seguro.md
    │   ├── auditar-arquitetura.md
    │   ├── melhorar-ui-ux.md
    │   ├── revisar-seguranca.md
    │   ├── revisar-performance.md
    │   ├── relatorio-pos-implementacao.md
    │   └── checklist-merge.md
    └── skills/
        └── senior-code-agent/
            └── SKILL.md
```

## Arquivos obrigatórios

- `CLAUDE.md`
- `PROJECT_RULES.md`
- `AGENTS.md`

## Arquivos recomendados

- `.claude/settings.json`
- `.claude/commands/*.md`
- `.claude/skills/senior-code-agent/SKILL.md`

## Como usar no Claude Code

1. Abra o VS Code na raiz do projeto.
2. Confirme que os arquivos estão na raiz.
3. Abra Claude Code.
4. Rode `/memory` para confirmar que `CLAUDE.md` foi carregado.
5. Use os comandos de `.claude/commands/` pelo menu `/`, se aparecerem na sua versão.
6. Para tarefa grande, comece em modo de planejamento e só depois autorize edição.

## Observação importante

O `CLAUDE.md` importa `PROJECT_RULES.md` e `AGENTS.md` usando a sintaxe:

```md
@PROJECT_RULES.md
@AGENTS.md
```

Assim, as regras principais ficam reutilizáveis por outros agentes e o Claude Code também recebe esse contexto.
