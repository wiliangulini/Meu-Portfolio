# Prompt — Auditor/Revisor SEO e Marketing para Claude Code no VS Code

Atue como auditor técnico sênior especialista em SEO técnico, SEO local, marketing digital, copywriting de conversão, CRO, analytics, acessibilidade e desenvolvimento PHP/HTML/CSS/JS.

Você irá auditar/revisar as alterações feitas no projeto `Meu-Portfolio`.

- Site em produção: https://gulini.com.br/
- Repositório GitHub: https://github.com/wiliangulini/Meu-Portfolio/tree/feature/seo-landing-conversion
- Branch correta: `feature/seo-landing-conversion`
- Stack real do projeto: PHP, HTML, CSS e JavaScript.

## Objetivo da auditoria

Revisar criticamente as alterações feitas pelo agente anterior, seja Codex ou Claude Code, e verificar se elas realmente melhoraram:

- SEO técnico;
- SEO local;
- marketing;
- conversão;
- clareza comercial;
- acessibilidade;
- performance;
- dados estruturados;
- segurança dos links;
- rastreabilidade de eventos;
- geração de leads por WhatsApp/e-mail.

Esta etapa é uma auditoria. A primeira resposta deve ser apenas revisão, sem implementar código.

---

## Regras obrigatórias

1. Não implemente código nesta primeira resposta.
2. Não altere arquivos.
3. Não faça commit.
4. Não faça push.
5. Não faça deploy.
6. Não crie branches.
7. Revise o diff atual do projeto.
8. Compare as alterações com o objetivo de SEO + marketing + conversão.
9. Aponte problemas reais, não sugestões genéricas.
10. Classifique a entrega.
11. Se forem necessários ajustes, gere um prompt de pós-revisão para o Codex ou Claude Code aplicar apenas as correções necessárias.

---

## Antes de revisar

Execute uma leitura/auditoria do estado atual:

1. Confirme que está na branch `feature/seo-landing-conversion`.
2. Rode `git status`.
3. Rode `git diff`.
4. Liste os arquivos alterados.
5. Leia os arquivos alterados.
6. Leia também os arquivos principais mesmo que não tenham sido alterados, se forem relevantes:
   - `index.php`;
   - `portfolio.php`;
   - `assets/include/head.php`;
   - `assets/include/header.php`;
   - `assets/include/btn-whats.php`;
   - CSS principal;
   - JS principal;
   - `robots.txt`;
   - `sitemap.xml`.

---

## O que auditar

### 1. SEO técnico

Verifique se a entrega tem:

- `<title>` único e coerente por página;
- meta description única e comercial por página;
- canonical correto;
- `robots` meta correto;
- Open Graph correto;
- Twitter Card correto;
- favicon funcional;
- `html lang="pt-BR"`;
- hierarquia correta de headings;
- apenas um H1 por página;
- alt text útil em imagens;
- links internos coerentes;
- links externos com `rel="noopener noreferrer"`;
- sitemap.xml válido;
- robots.txt correto;
- URLs canônicas;
- ausência de bloqueio indevido de indexação;
- ausência de duplicação crítica de conteúdo;
- ausência de links quebrados evidentes.

Classifique qualquer problema como:

- crítico;
- médio;
- baixo;
- sugestão.

---

### 2. SEO local

Verifique se o SEO local foi implementado de forma natural para:

- Pato Branco;
- Coronel Vivida;
- sudoeste do Paraná;
- Paraná;
- atendimento remoto para Brasil.

Avalie se os termos foram usados com naturalidade ou se houve keyword stuffing.

Termos de referência:

- desenvolvedor de sites em Pato Branco;
- criação de sites em Pato Branco;
- criação de landing pages em Pato Branco;
- desenvolvimento de sistemas web em Pato Branco;
- desenvolvedor web em Coronel Vivida;
- criação de sites no sudoeste do Paraná;
- sistemas web para empresas no Paraná;
- desenvolvedor front-end remoto;
- sites profissionais para pequenas empresas.

Não exija que todos apareçam literalmente. O importante é intenção semântica, naturalidade e utilidade para o usuário.

---

### 3. Marketing e posicionamento

Verifique se a página responde claramente:

- O que Wilian Gulini faz?
- Para quem ele faz?
- Que problema resolve?
- Que serviços vende?
- Por que contratar?
- Quais tecnologias domina?
- Quais projetos comprovam experiência?
- Como funciona o processo?
- Como pedir orçamento?
- O que o cliente deve enviar no primeiro contato?

Avalie se o site deixou de parecer apenas um “currículo/portfólio” e passou a funcionar como página comercial.

---

### 4. CRO e conversão

Verifique se existem:

- CTA principal claro acima da dobra;
- CTA secundário coerente;
- CTAs repetidos em pontos estratégicos;
- mensagem de WhatsApp pré-preenchida;
- microcopy comercial;
- seção de serviços;
- seção de dores/problemas;
- seção de solução;
- seção de projetos/prova;
- seção de processo;
- FAQ;
- CTA final;
- redução de fricção para contato.

Valide se o WhatsApp continua funcionando e se a mensagem pré-preenchida está orientada a orçamento.

---

### 5. Portfólio/projetos

Verifique se os projetos foram apresentados com linguagem comercial, não apenas técnica.

Cada projeto deveria, quando possível, conter:

- nome;
- tipo;
- contexto;
- problema resolvido;
- tecnologias;
- resultado/benefício;
- link;
- imagem;
- alt text.

Não aceite métricas inventadas, promessas falsas ou resultados não comprovados.

---

### 6. Schema.org / JSON-LD

Audite se os dados estruturados estão coerentes.

Avalie:

- `WebSite`;
- `Person`;
- `ProfessionalService`;
- `LocalBusiness`;
- `Organization`, se usado;
- `Service`, se usado;
- `FAQPage`;
- `BreadcrumbList`;
- `CollectionPage`;
- `CreativeWork`;
- `ContactPoint`, se usado.

Verifique se:

- o JSON-LD é válido do ponto de vista de sintaxe PHP/HTML;
- os dados estruturados refletem conteúdo visível;
- não existem propriedades falsas;
- não existem exageros;
- os dados da home e do portfólio são coerentes;
- não há duplicação problemática;
- não há schema que prometa algo que a página não mostra.

---

### 7. Analytics e rastreabilidade

Verifique se a estrutura de mensuração:

- não usa ID fictício;
- não quebra o site se `gtag` ou `dataLayer` não existir;
- permite rastrear clique no WhatsApp;
- permite rastrear clique em e-mail;
- permite rastrear clique em projetos;
- permite rastrear clique em GitHub;
- permite rastrear clique em LinkedIn;
- respeita a ausência atual de GA4/GTM;
- documenta onde inserir o ID futuramente.

Se a implementação adicionou scripts externos desnecessários ou invasivos, aponte.

---

### 8. Performance e acessibilidade

Verifique:

- imagens WebP;
- uso correto de `loading="lazy"`;
- imagem principal sem lazy se for relevante para LCP;
- largura/altura em imagens para reduzir CLS;
- fontes externas;
- scripts desnecessários;
- Bootstrap/jQuery usados sem piorar muito a página;
- contraste;
- foco de teclado;
- nomes acessíveis em links;
- `aria-labels`;
- semântica das seções;
- navegação mobile.

Não peça refatoração radical sem necessidade. Aponte apenas riscos reais.

---

### 9. Risco técnico

Verifique se o agente anterior:

- quebrou PHP;
- gerou erro de sintaxe;
- alterou includes de forma perigosa;
- duplicou funções;
- criou dependências desnecessárias;
- removeu conteúdo importante;
- quebrou caminhos relativos;
- alterou URLs sem necessidade;
- mexeu em `.htaccess` ou servidor sem justificativa;
- deixou código morto;
- deixou comentários excessivos;
- quebrou compatibilidade com hospedagem PHP comum.

---

## Validações recomendadas

Quando possível, rode:

- `php -l index.php`;
- `php -l portfolio.php`;
- `php -l assets/include/head.php`;
- `git diff --check`;
- busca por mais de um `<h1>`;
- busca por `target="_blank"` sem `rel`;
- busca por `GA-`, `G-XXXXXXXX`, `GTM-XXXX` ou IDs fictícios;
- busca por `noindex`;
- verificação manual do `robots.txt`;
- verificação manual do `sitemap.xml`.

Não precisa rodar testes inexistentes.

---

## Classificação final

No final, classifique a entrega como uma das opções:

1. **Aprovado**  
   A implementação está tecnicamente correta e comercialmente forte. Só restam ações externas como Search Console, GA4, Google Business Profile e divulgação.

2. **Aprovado com observações**  
   A implementação está boa, mas há pequenos ajustes ou melhorias não críticas.

3. **Requer ajustes**  
   Existem problemas relevantes de SEO, marketing, conversão, acessibilidade ou código que devem ser corrigidos antes de publicar.

4. **Reprovado**  
   A implementação quebrou funcionalidades, criou riscos importantes ou não cumpriu o objetivo.

---

## Saída esperada

Entregue um relatório com:

1. Classificação final.
2. Resumo executivo.
3. Arquivos revisados.
4. Problemas críticos encontrados.
5. Problemas médios encontrados.
6. Problemas baixos/sugestões.
7. Riscos de SEO técnico.
8. Riscos de SEO local.
9. Riscos de marketing/conversão.
10. Riscos de acessibilidade/performance.
11. Riscos técnicos/PHP.
12. Validações executadas e resultados.
13. O que ficou bom.
14. O que ainda precisa melhorar.
15. Decisão final: pode publicar ou não?
16. Se precisar de ajustes, gere um prompt de pós-revisão.

---

## Prompt de pós-revisão

Se encontrar problemas que exigem correção, gere ao final um prompt pronto para ser usado no Codex ou Claude Code.

Esse prompt deve:

- ser específico;
- conter somente os ajustes necessários;
- não reabrir todo o escopo;
- não pedir refatoração ampla;
- citar os arquivos afetados;
- dizer claramente o que corrigir;
- dizer claramente o que não alterar;
- exigir validação final.

Formato esperado:

```md
# Pós-revisão — Ajustes SEO/Marketing Portfolio

Atue como desenvolvedor sênior PHP/HTML/CSS/JS e especialista em SEO técnico.

## Contexto

A auditoria encontrou os seguintes problemas:

...

## Ajustes obrigatórios

1. ...
2. ...
3. ...

## Arquivos prováveis

- ...

## Regras

- Não refatore o projeto inteiro.
- Não altere a identidade visual sem necessidade.
- Não faça commit.
- Não faça push.
- Não faça deploy.
- Preserve links e CTAs existentes.

## Validação

- Rode ...
- Entregue relatório final.
```

## Importante

Esta auditoria deve ser crítica. Não aprove automaticamente se houver problemas reais.

Também não reprovar por preferências subjetivas. Foque em riscos concretos de SEO, marketing, conversão, acessibilidade, performance e funcionamento técnico.
