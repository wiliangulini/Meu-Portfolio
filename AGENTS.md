# AGENTS.md — Regras para Agentes de IA no Projeto Gulini.Dev

Este arquivo orienta qualquer agente de IA que trabalhe no projeto do portfólio profissional **Gulini.Dev**, disponível em:

- Produção: https://gulini.com.br/
- Repositório: https://github.com/wiliangulini/Meu-Portfolio
- Branch de trabalho/produção atual: `feature/seo-landing-conversion`

## 1. Contexto do projeto

Este projeto é o portfólio profissional e landing page comercial de **Wilian Gulini**, desenvolvedor web/front-end com capacidade full-stack.

O site deve funcionar como:

- portfólio profissional;
- landing page de serviços;
- página de aquisição de clientes;
- base de SEO local;
- canal de conversão via WhatsApp/e-mail;
- vitrine de projetos reais;
- peça central da presença digital da marca Gulini.Dev.

## 2. Stack real do projeto

O projeto atual é baseado em:

- PHP;
- HTML;
- CSS;
- JavaScript;
- Bootstrap;
- jQuery;
- imagens WebP;
- metadados SEO;
- JSON-LD/Schema.org;
- sitemap.xml;
- robots.txt.

Não assumir que o projeto é Next.js, React, Angular, Laravel ou WordPress.

## 3. Objetivo comercial

O site deve comunicar e vender serviços de:

- criação de sites institucionais;
- criação de landing pages;
- desenvolvimento de sistemas web sob medida;
- front-end com React.js, Next.js e Angular;
- sistemas administrativos;
- dashboards;
- integrações com APIs;
- deploy e manutenção de aplicações web;
- SEO técnico para sites e landing pages.

## 4. Foco de SEO local

O conteúdo deve reforçar, de forma natural:

- Pato Branco;
- Coronel Vivida;
- sudoeste do Paraná;
- Paraná;
- atendimento remoto para todo o Brasil.

Evitar keyword stuffing. O texto deve ser comercial, natural e útil para o usuário.

## 5. Regras obrigatórias antes de alterar código

Antes de qualquer alteração:

1. Confirmar a branch atual.
2. Ler a estrutura real do projeto.
3. Identificar os arquivos afetados.
4. Entender o impacto em SEO, conversão e funcionamento.
5. Verificar se a alteração é realmente necessária.
6. Não alterar arquivos fora do escopo.
7. Não fazer commit.
8. Não fazer push.
9. Não fazer deploy.
10. Não criar branch nova sem autorização explícita.

## 6. Arquivos principais

Arquivos normalmente relevantes:

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

Antes de alterar qualquer um desses arquivos, avaliar impacto em produção.

## 7. Regras de SEO técnico

Manter ou melhorar:

- `<title>` único e estratégico por página;
- meta description única e comercial;
- canonical correto;
- Open Graph;
- Twitter Card;
- `robots` meta;
- `html lang="pt-BR"`;
- apenas um H1 por página;
- hierarquia correta de headings;
- alt text útil em imagens;
- links externos com `rel="noopener noreferrer"`;
- links internos funcionais;
- sitemap.xml com URLs públicas e canônicas;
- robots.txt permitindo indexação pública;
- JSON-LD válido e coerente com o conteúdo visível.

Não adicionar `noindex`, `nofollow`, bloqueios em robots.txt ou alterações de canonical sem justificativa clara.

## 8. Regras de marketing e conversão

O site deve responder rapidamente:

- o que Wilian Gulini faz;
- para quem ele faz;
- quais problemas resolve;
- quais serviços vende;
- por que contratar;
- quais projetos comprovam experiência;
- como pedir orçamento;
- o que enviar no primeiro contato.

Manter CTAs claros para:

- WhatsApp;
- e-mail;
- portfólio/projetos;
- GitHub;
- LinkedIn.

O CTA principal deve ser comercial e orientado a orçamento.

## 9. WhatsApp

Não alterar o telefone sem autorização explícita.

A mensagem de WhatsApp deve ser comercial, clara e pré-preenchida, por exemplo:

> Olá, Wilian! Vi seu portfólio e gostaria de um orçamento para um site, landing page ou sistema web. Posso te explicar minha ideia?

Aplicar a mesma lógica em todos os pontos de contato: home, portfólio e botão flutuante.

## 10. Analytics e eventos

Não inserir ID fictício de GA4 ou GTM.

Se preparar rastreamento, usar abordagem segura:

- `gtag` se existir;
- `dataLayer.push` se existir;
- fallback sem erro caso nenhum esteja configurado.

Eventos recomendados:

- `lead_whatsapp`;
- `lead_email`;
- `project_click`;
- `portfolio_click`;
- `social_click`;
- `nav_click`.

Preservar UTMs quando possível:

- `utm_source`;
- `utm_medium`;
- `utm_campaign`;
- `utm_content`;
- `utm_term`.

## 11. Schema.org / JSON-LD

Dados estruturados devem refletir conteúdo visível.

Tipos úteis:

- `WebSite`;
- `Person`;
- `ProfessionalService`;
- `LocalBusiness`;
- `Service`;
- `FAQPage`;
- `BreadcrumbList`;
- `CollectionPage`;
- `CreativeWork`;
- `ContactPoint`, se aplicável.

Não inventar propriedades, métricas, avaliações, clientes, depoimentos ou resultados.

## 12. Portfólio e projetos

Os projetos devem ser apresentados com linguagem comercial, não apenas técnica.

Quando possível, cada projeto deve conter:

- nome;
- tipo;
- contexto;
- problema/necessidade;
- benefício qualitativo;
- tecnologias;
- papel de Wilian no projeto;
- link;
- imagem;
- alt text útil.

Não adicionar projeto que não esteja realmente no código ou que o usuário não tenha autorizado.

## 13. Performance e acessibilidade

Preservar ou melhorar:

- imagens WebP;
- `loading="lazy"` em imagens abaixo da dobra;
- evitar lazy na imagem principal se prejudicar LCP;
- `width` e `height` em imagens quando possível;
- `decoding="async"` quando fizer sentido;
- contraste;
- foco de teclado;
- nomes acessíveis em links;
- `aria-labels`;
- semântica das seções;
- navegação mobile.

Não remover Bootstrap/jQuery apenas por preferência. Só alterar se houver benefício claro e baixo risco.

## 14. Proibições

Não fazer:

- prometer primeira posição no Google;
- criar depoimentos falsos;
- inventar métricas;
- inventar clientes;
- adicionar projetos inexistentes;
- usar keyword stuffing;
- adicionar ID fictício de GA4/GTM;
- quebrar links atuais;
- remover CTA de WhatsApp;
- alterar telefone/e-mail sem autorização;
- alterar `.htaccess` sem necessidade comprovada;
- refatoração radical sem autorização.

## 15. Validações recomendadas

Após alterações, rodar quando possível:

```bash
php -l index.php
php -l portfolio.php
php -l assets/include/head.php
php -l assets/include/btn-whats.php
git diff --check
git diff
```

Também verificar:

- apenas um H1 por página;
- WhatsApp com mensagem correta;
- links externos seguros;
- sitemap.xml válido;
- robots.txt permitindo indexação;
- ausência de `noindex`;
- ausência de IDs fictícios;
- JSON-LD sem erro de sintaxe;
- site visualmente estável.

## 16. Relatório esperado

Ao finalizar qualquer etapa, entregar:

1. resumo executivo;
2. arquivos alterados;
3. justificativa técnica;
4. justificativa de SEO/marketing/conversão;
5. validações executadas;
6. riscos restantes;
7. pendências que dependem do usuário.
