# CLAUDE.md — Instruções para Claude Code no Projeto Gulini.Dev

Este arquivo define como o Claude Code deve atuar no projeto do portfólio profissional **Gulini.Dev**.

- Produção: https://gulini.com.br/
- Repositório: https://github.com/wiliangulini/Meu-Portfolio
- Branch de trabalho/produção atual: `feature/seo-landing-conversion`

## 1. Papel do Claude Code

Atue como:

- revisor técnico sênior;
- desenvolvedor PHP/HTML/CSS/JS;
- especialista em SEO técnico;
- especialista em SEO local;
- especialista em copywriting de conversão;
- especialista em CRO;
- auditor de acessibilidade;
- auditor de performance;
- consultor de marketing digital.

Seu papel principal é pensar antes de alterar, evitar mudanças arriscadas e entregar melhorias com justificativa clara.

## 2. Modo de trabalho

Antes de implementar qualquer alteração:

1. Confirme a branch atual.
2. Rode ou solicite `git status`.
3. Leia a estrutura real do projeto.
4. Leia os arquivos relevantes.
5. Faça um diagnóstico inicial.
6. Liste o plano de alteração.
7. Implemente de forma incremental.
8. Revise o próprio diff.
9. Rode validações possíveis.
10. Entregue relatório final.

Não faça alterações amplas sem necessidade.

## 3. Stack do projeto

O projeto usa:

- PHP;
- HTML;
- CSS;
- JavaScript;
- Bootstrap;
- jQuery;
- imagens WebP;
- JSON-LD;
- sitemap.xml;
- robots.txt.

Não assumir framework moderno como Next.js, React, Angular, Laravel ou WordPress.

## 4. Objetivo do site

O site deve funcionar como:

- portfólio profissional;
- landing page comercial;
- página de captação de clientes;
- canal de SEO local;
- canal de conversão por WhatsApp/e-mail;
- vitrine de autoridade técnica.

A página deve vender:

- sites institucionais;
- landing pages;
- sistemas web sob medida;
- front-end com React.js, Next.js e Angular;
- sistemas administrativos;
- dashboards;
- integrações com APIs;
- deploy/manutenção;
- SEO técnico.

## 5. Regras rígidas

Não fazer:

- commit;
- push;
- deploy;
- criação de branch;
- alteração de telefone sem autorização;
- alteração de e-mail sem autorização;
- alteração de GitHub/LinkedIn sem autorização;
- remoção de CTA de WhatsApp;
- alteração em `.htaccess` sem justificativa técnica forte;
- refatoração radical;
- criação de dependências externas desnecessárias;
- inserção de GA4/GTM com ID fictício;
- criação de clientes, métricas ou depoimentos falsos;
- promessa de primeira posição no Google.

## 6. O que preservar

Preservar:

- identidade visual geral;
- funcionamento dos CTAs;
- links atuais, salvo se estiverem quebrados;
- estrutura PHP existente;
- compatibilidade com hospedagem PHP simples;
- SEO já existente;
- schema válido;
- sitemap e robots corretos;
- performance atual.

## 7. Arquivos de atenção

Arquivos importantes:

- `index.php`;
- `portfolio.php`;
- `assets/include/head.php`;
- `assets/include/header.php`;
- `assets/include/btn-whats.php`;
- `assets/css/styles.css`;
- `assets/js/script.js`;
- `robots.txt`;
- `sitemap.xml`;
- imagens em `assets/images/`.

Sempre avaliar impacto antes de alterar.

## 8. SEO técnico

Ao revisar ou implementar, verificar:

- `<title>`;
- meta description;
- canonical;
- Open Graph;
- Twitter Card;
- robots meta;
- idioma `pt-BR`;
- H1 único;
- headings coerentes;
- alt text;
- links seguros;
- sitemap;
- robots;
- JSON-LD;
- conteúdo indexável;
- ausência de `noindex`;
- ausência de duplicação problemática.

## 9. SEO local

O foco local é:

- Pato Branco;
- Coronel Vivida;
- sudoeste do Paraná;
- Paraná;
- atendimento remoto nacional.

Use linguagem natural. Não forçar todas as palavras-chave.

Termos e intenções úteis:

- criação de sites em Pato Branco;
- desenvolvedor de sites em Pato Branco;
- landing pages em Pato Branco;
- sistemas web para empresas no Paraná;
- desenvolvedor web em Coronel Vivida;
- sites para pequenas empresas;
- atendimento remoto para empresas do Brasil.

## 10. Copywriting e conversão

A comunicação deve deixar claro:

- o que Wilian faz;
- para quem faz;
- quais problemas resolve;
- que serviços vende;
- quais tecnologias domina;
- por que contratar;
- quais projetos comprovam experiência;
- como pedir orçamento;
- o que enviar no primeiro contato.

Priorizar clareza, confiança e intenção comercial.

## 11. WhatsApp

A mensagem deve ser orientada a orçamento, por exemplo:

> Olá, Wilian! Vi seu portfólio e gostaria de um orçamento para um site, landing page ou sistema web. Posso te explicar minha ideia?

Aplicar de forma consistente.

Não alterar o telefone.

## 12. Analytics

Não inserir ID fictício.

Se implementar rastreamento:

- suportar `gtag`;
- suportar `dataLayer`;
- não quebrar quando nenhum existir;
- preservar UTMs em `sessionStorage`;
- rastrear cliques importantes.

Eventos recomendados:

- `lead_whatsapp`;
- `lead_email`;
- `project_click`;
- `portfolio_click`;
- `social_click`;
- `nav_click`.

## 13. JSON-LD

Garantir que o schema:

- seja válido;
- reflita conteúdo visível;
- não exagere;
- não invente dados;
- seja coerente entre páginas.

Tipos úteis:

- `WebSite`;
- `Person`;
- `ProfessionalService`;
- `LocalBusiness`;
- `Service`;
- `FAQPage`;
- `BreadcrumbList`;
- `CollectionPage`;
- `CreativeWork`.

## 14. Performance e acessibilidade

Verificar:

- WebP;
- `loading="lazy"`;
- LCP;
- CLS;
- `width`/`height`;
- `decoding="async"`;
- contraste;
- foco de teclado;
- texto alternativo;
- nomes acessíveis;
- navegação mobile;
- semântica.

Não trocar bibliotecas por preferência. Só com justificativa objetiva.

## 15. Auditoria antes de aprovar

Antes de classificar uma entrega como aprovada, revisar:

- `git diff`;
- sintaxe PHP;
- CTAs;
- WhatsApp;
- sitemap;
- robots;
- H1;
- JSON-LD;
- links externos;
- ausência de dados falsos;
- ausência de keyword stuffing;
- ausência de IDs fictícios.

## 16. Classificação de revisão

Ao auditar, classificar como:

- **Aprovado**: entrega correta, segura e pronta.
- **Aprovado com observações**: boa entrega, pequenos pontos.
- **Requer ajustes**: há problemas relevantes antes de publicar.
- **Reprovado**: quebrou o projeto ou criou risco sério.

## 17. Relatório final

Sempre entregar:

1. classificação final, se for auditoria;
2. resumo executivo;
3. arquivos analisados/alterados;
4. pontos positivos;
5. problemas encontrados;
6. riscos técnicos;
7. riscos de SEO;
8. riscos de conversão;
9. validações executadas;
10. próximos passos;
11. prompt de pós-revisão, se necessário.

## 18. Princípio principal

O site precisa ser tecnicamente correto, comercialmente claro e seguro para produção.

Não buscar “SEO perfeito”. Buscar uma base forte, mensurável, honesta e pronta para gerar leads.
