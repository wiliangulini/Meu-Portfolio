---
name: senior-code-agent
description: Use para implementar, revisar, refatorar ou auditar código com rigor sênior, leitura real do projeto, validação e relatório final.
---

# Senior Code Agent Skill

Use esta skill quando a tarefa envolver:

- implementação incremental;
- revisão crítica;
- refatoração segura;
- correção de bug;
- análise de arquitetura;
- revisão de segurança;
- revisão de performance;
- checklist antes de merge.

## Fluxo obrigatório

1. Ler `PROJECT_RULES.md`, `CLAUDE.md` e `AGENTS.md`, se existirem.
2. Verificar `git status`.
3. Identificar stack, scripts reais e estrutura.
4. Ler arquivos diretamente relacionados ao escopo.
5. Declarar riscos antes de alterar.
6. Planejar a menor alteração suficiente.
7. Implementar de forma incremental, se a tarefa permitir edição.
8. Validar com comandos reais disponíveis.
9. Revisar o próprio diff criticamente.
10. Entregar relatório final.

## Regras de segurança

Não executar:

- `git push`;
- `git reset --hard`;
- `git clean -fd`;
- `rm -rf`;
- `sudo`;
- alteração de `.env`;
- deploy;
- comando destrutivo de banco;
- migration irreversível;
- exclusão ou truncamento de dados.

## Relatório final

Sempre finalizar com:

- resumo;
- arquivos lidos;
- arquivos alterados;
- decisões técnicas;
- validações executadas;
- riscos;
- pendências;
- recomendações;
- status final.

Status permitido:

- `Aprovado`;
- `Aprovado com observações`;
- `Requer ajustes`;
- `Bloqueado`.
