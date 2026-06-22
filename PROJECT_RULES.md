# PROJECT_RULES.md

## 1. Objetivo

Este arquivo define as regras técnicas obrigatórias deste projeto.

As regras valem para:

- desenvolvedores humanos;
- Claude Code;
- Codex;
- ChatGPT;
- outros agentes de IA;
- revisores de código.

Objetivo: preservar segurança, clareza, qualidade, previsibilidade, manutenibilidade e baixo risco de regressão.

---

## 2. Regra principal

Nenhuma alteração deve ser feita sem entender o contexto real do projeto.

Antes de implementar ou revisar:

1. leia este arquivo;
2. leia `README.md`, se existir;
3. identifique a stack real;
4. identifique scripts disponíveis;
5. leia arquivos diretamente relacionados ao escopo;
6. entenda o fluxo afetado;
7. avalie riscos;
8. planeje a menor alteração suficiente.

---

## 3. Escopo

Toda tarefa deve respeitar o escopo solicitado.

É proibido:

- alterar arquivos fora do escopo sem necessidade;
- misturar feature com refatoração ampla;
- modificar arquitetura sem justificativa;
- instalar dependências sem aprovação;
- remover código sem entender impacto;
- alterar contrato de API sem necessidade;
- alterar banco sem plano de migration/rollback;
- alterar autenticação/autorização sem análise;
- executar deploy sem autorização explícita.

---

## 4. Git e branch

Antes de iniciar uma tarefa:

- verificar branch atual;
- verificar `git status`;
- evitar trabalhar com alterações desconhecidas;
- não sobrescrever trabalho existente;
- não executar `git reset --hard`;
- não executar `git clean -fd`;
- não executar `git push` sem autorização explícita;
- não fazer merge sem autorização explícita.

Commits só devem ser criados quando solicitados.

---

## 5. Padrão de implementação

Toda implementação deve ser:

- incremental;
- pequena o suficiente para revisar;
- compatível com padrões existentes;
- testável;
- reversível;
- simples;
- segura;
- coerente com a arquitetura atual.

Prefira:

- menor mudança suficiente;
- nomes explícitos;
- tipagem forte;
- validação de entrada;
- tratamento de erro consistente;
- reaproveitamento de padrões reais do projeto.

Evite:

- overengineering;
- abstrações prematuras;
- duplicação desnecessária;
- lógica de negócio em componentes visuais;
- lógica de negócio em controllers;
- acoplamento excessivo;
- dependências desnecessárias.

---

## 6. Regras de TypeScript/JavaScript

- Evitar `any` sem justificativa.
- Preferir tipos explícitos em contratos importantes.
- Não silenciar erro com `// @ts-ignore` sem justificativa.
- Não esconder erro com `catch` vazio.
- Não expor secrets no client.
- Não criar estado derivado desnecessário.
- Não quebrar compatibilidade com versão configurada do projeto.
- Respeitar ESLint/Prettier quando existirem.

---

## 7. Regras de Angular

- Respeitar versão do Angular do projeto.
- Não usar APIs incompatíveis com a versão instalada.
- Preservar estrutura de modules/components/services.
- Services devem concentrar integração e lógica reutilizável.
- Components devem evitar regra de negócio complexa.
- Verificar templates, SCSS e bindings afetados.
- Verificar routing antes de alterar navegação.
- Verificar imports e providers antes de criar novos serviços.
- Evitar subscriptions sem cleanup em fluxos longos.

---

## 8. Regras de React/Next.js

- Confirmar se o projeto usa App Router ou Pages Router.
- Respeitar server/client components.
- Não expor variável sensível com prefixo público.
- Preservar SEO quando alterar páginas públicas.
- Evitar hooks condicionais.
- Evitar efeitos colaterais fora de local adequado.
- Preservar tipagem de props e retornos.
- Evitar refatoração visual que altere comportamento sem necessidade.

---

## 9. Regras de Node.js/API

- Validar entrada de dados.
- Tratar erros de forma consistente.
- Preservar status codes existentes quando fizer sentido.
- Não vazar stack trace em produção.
- Não logar tokens, senhas ou dados sensíveis.
- Separar controller, service e repository quando esse padrão existir.
- Preservar contrato de API.
- Verificar autenticação e autorização em rotas protegidas.

---

## 10. Regras de Java/Spring Boot

- Controllers não devem concentrar regra de negócio.
- Services devem concentrar regras de aplicação.
- Repositories devem concentrar acesso a dados.
- DTOs devem proteger entidades internas quando aplicável.
- Cuidado com `LazyInitializationException`.
- Cuidado com N+1 queries.
- Cuidado com transações.
- Não alterar entidades persistidas sem avaliar schema e migrations.
- Preservar compatibilidade com versão de Java/Spring usada.

---

## 11. Regras de banco de dados

Antes de alterar banco:

- identificar banco usado;
- identificar migrations;
- identificar entidades/models;
- identificar tabelas reais;
- avaliar impacto em dados existentes;
- propor rollback quando houver risco;
- evitar comandos destrutivos;
- não executar `truncate`, `drop` ou `delete` em massa sem autorização explícita.

Alterações em produção exigem plano específico.

---

## 12. Autenticação e autorização

Qualquer alteração em login, sessão, JWT, cookies, RBAC, guards, middleware ou permissões deve ser tratada como área sensível.

Antes de alterar:

- mapear fluxo atual;
- verificar pontos de entrada;
- verificar persistência de sessão;
- verificar proteção de rotas;
- verificar expiração;
- verificar impacto em usuários existentes.

---

## 13. UI/UX

Alterações visuais devem:

- preservar responsividade;
- preservar acessibilidade básica;
- evitar quebra em mobile;
- evitar mudança de fluxo sem necessidade;
- respeitar padrão visual existente;
- preservar labels, estados de erro e feedbacks.

Para dashboards e sistemas administrativos:

- priorizar clareza;
- manter ações destrutivas explícitas;
- evitar ambiguidades;
- confirmar exclusões quando aplicável.

---

## 14. Validação obrigatória

Antes de concluir, executar os comandos disponíveis e relevantes:

- lint;
- typecheck;
- test;
- build;
- testes manuais quando necessário.

Nunca inventar comando. Sempre verificar scripts reais em `package.json`, `pom.xml`, `build.gradle`, `mvnw` ou `gradlew`.

Se não houver script disponível, documentar:

> Não há script X configurado no projeto.

Se um comando falhar, documentar:

- comando;
- erro;
- provável causa;
- se o erro foi introduzido pela alteração ou já existia.

---

## 15. Secrets e variáveis de ambiente

É proibido:

- commitar `.env`;
- exibir secrets em logs;
- inventar valor de secret;
- alterar secret real sem autorização;
- usar credencial de produção em teste;
- mover secret para código fonte.

Quando uma variável for necessária, documentar apenas nome e finalidade.

---

## 16. Deploy/VPS/Linux

Deploy só pode ser executado quando explicitamente solicitado.

Antes de deploy:

- validar build;
- verificar variáveis de ambiente;
- verificar processo de rollback;
- verificar PM2/systemd/Nginx/Apache quando aplicável;
- verificar SSL/proxy quando aplicável;
- não reiniciar serviços críticos sem autorização.

---

## 17. Relatório obrigatório

Toda tarefa deve terminar com relatório contendo:

- resumo;
- arquivos lidos;
- arquivos alterados;
- decisões técnicas;
- validações executadas;
- riscos;
- pendências;
- status final.

Status final permitido:

- `Aprovado`;
- `Aprovado com observações`;
- `Requer ajustes`;
- `Bloqueado`.
