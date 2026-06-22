# AGENTS.md

## 1. Objetivo

Este arquivo define regras comuns para agentes de IA que atuarem neste repositório.

Aplica-se a:

- Claude Code;
- Codex;
- ChatGPT;
- agentes de revisão;
- agentes de implementação;
- agentes de documentação;
- agentes de QA.

O objetivo é padronizar comportamento, reduzir risco e impedir alterações baseadas em suposição.

---

## 2. Regra de entrada

Antes de qualquer tarefa, o agente deve ler:

1. `PROJECT_RULES.md`;
2. `CLAUDE.md`, quando estiver usando Claude Code;
3. `README.md`, se existir;
4. arquivos de configuração;
5. arquivos diretamente relacionados ao escopo.

O agente deve declarar quais arquivos foram lidos no relatório final.

---

## 3. Modos de atuação

### 3.1 Modo implementação

O agente pode editar arquivos quando solicitado.

Obrigatório:

- entender o código antes de editar;
- propor plano;
- implementar incrementalmente;
- preservar padrões existentes;
- validar com comandos disponíveis;
- gerar relatório final.

### 3.2 Modo revisão

O agente não deve editar arquivos, salvo se o usuário pedir correção.

Obrigatório:

- ler diff;
- ler arquivos alterados;
- comparar com escopo;
- identificar regressões;
- classificar achados por severidade;
- recomendar ou não merge.

### 3.3 Modo planejamento

O agente não deve editar arquivos.

Obrigatório:

- mapear arquitetura;
- identificar riscos;
- propor etapas;
- definir critérios de aceite;
- sugerir validações.

---

## 4. Proibições

Agentes não devem:

- inventar estrutura de projeto;
- inventar APIs;
- inventar tabelas;
- inventar scripts;
- inventar dependências;
- alterar secrets;
- executar deploy;
- fazer push;
- fazer merge;
- apagar arquivos em massa;
- executar comandos destrutivos;
- modificar banco de dados sem plano;
- ignorar erro de validação;
- declarar sucesso sem evidência.

---

## 5. Evidência obrigatória

Toda conclusão técnica deve se apoiar em evidência:

- arquivo lido;
- trecho de código;
- script encontrado;
- erro reproduzido;
- teste executado;
- build executado;
- padrão já existente no projeto;
- documentação oficial quando necessário.

Quando não houver evidência suficiente, o agente deve declarar incerteza.

---

## 6. Critérios para decisões técnicas

Priorizar:

1. correção;
2. segurança;
3. compatibilidade;
4. simplicidade;
5. manutenibilidade;
6. testabilidade;
7. performance;
8. baixo risco;
9. reversibilidade.

Não priorizar novidade técnica sem necessidade.

---

## 7. Refatoração

Refatoração só deve ocorrer quando:

- fizer parte do escopo;
- reduzir risco;
- remover duplicação relevante;
- melhorar clareza sem alterar comportamento;
- for necessária para implementar a tarefa.

Toda refatoração deve preservar comportamento existente.

---

## 8. Testes e validação

O agente deve procurar scripts reais no projeto.

Exemplos possíveis, dependendo da stack:

- `npm run lint`;
- `npm run test`;
- `npm run build`;
- `npm run typecheck`;
- `pnpm test`;
- `yarn build`;
- `mvn test`;
- `./mvnw test`;
- `./gradlew test`.

Se não houver testes, o agente deve propor validação manual objetiva.

---

## 9. Relatório final

Todo agente deve finalizar com:

```md
## Relatório final

### Resumo
...

### Arquivos lidos
...

### Arquivos alterados
...

### Decisões técnicas
...

### Validações executadas
...

### Riscos
...

### Pendências
...

### Recomendações
...

### Status final
Aprovado | Aprovado com observações | Requer ajustes | Bloqueado
```

---

## 10. Regra de parada

O agente deve parar e pedir autorização quando a tarefa envolver:

- dados de produção;
- deploy;
- credenciais;
- alteração destrutiva;
- mudança ampla de arquitetura;
- alteração de autenticação/autorização;
- alteração irreversível de banco;
- escopo ambíguo com alto risco.
