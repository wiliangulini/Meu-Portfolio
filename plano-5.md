# Plano 5 — Execução SEO + Marketing + Conversão — Gulini.Dev

Este plano consolida os pontos fortes do **Plano 3** e do **Plano 4** para executar melhorias no portfólio profissional **Gulini.Dev** com segurança, precisão técnica e foco comercial.

## 1. Contexto

O portfólio de Wilian Gulini, disponível em:

- Produção: https://gulini.com.br/
- Portfólio: https://gulini.com.br/portfolio.php
- Repositório: https://github.com/wiliangulini/Meu-Portfolio
- Branch correta: `feature/seo-landing-conversion`

já possui uma base sólida de SEO e landing page:

- metadados básicos;
- Open Graph;
- Twitter Card;
- canonical;
- JSON-LD;
- robots.txt;
- sitemap.xml;
- imagens WebP;
- portfólio com projetos reais;
- CTA de WhatsApp;
- estrutura PHP/HTML/CSS/JS.

O objetivo desta etapa **não é reconstruir o site do zero**, mas refinar os pontos fracos, melhorar conversão, reforçar SEO local, preparar analytics/eventos e tornar o portfólio mais comercial.

---

## 2. Objetivo principal

Transformar o portfólio em uma landing page comercial mais forte para:

- SEO técnico;
- SEO local;
- marketing digital;
- copywriting de conversão;
- CRO;
- captação de leads;
- geração de orçamento por WhatsApp/e-mail;
- apresentação profissional dos projetos;
- autoridade técnica;
- rastreabilidade por eventos e UTMs.

A entrega deve melhorar o site sem quebrar layout, links, PHP, schema ou CTAs existentes.

---

## 3. Stack real do projeto

O projeto usa:

- PHP;
- HTML;
- CSS;
- JavaScript;
- Bootstrap;
- jQuery;
- WebP;
- JSON-LD;
- sitemap.xml;
- robots.txt.

Não assumir que o projeto é Next.js, React, Angular, Laravel ou WordPress.

---

## 4. Regras obrigatórias

1. Trabalhar somente na branch `feature/seo-landing-conversion`.
2. Confirmar a branch antes de alterar arquivos.
3. Rodar `git status` antes de iniciar.
4. Não fazer commit.
5. Não fazer push.
6. Não fazer deploy.
7. Não criar branch nova.
8. Não alterar `.htaccess` sem necessidade comprovada.
9. Não alterar telefone, e-mail, GitHub ou LinkedIn.
10. Não remover CTA de WhatsApp.
11. Não quebrar links atuais.
12. Não inventar clientes, métricas, depoimentos ou resultados.
13. Não prometer primeira posição no Google.
14. Não usar keyword stuffing.
15. Não adicionar ID fictício de GA4/GTM.
16. Não adicionar dependências externas sem necessidade real.
17. Não fazer refatoração radical.
18. Preservar identidade visual geral.
19. Alterar CSS somente se necessário para mini briefing, microcopy, responsividade, acessibilidade ou pequenas melhorias visuais de suporte.
20. Manter os números “5 anos” e “22 projetos” se estiverem confirmados como legítimos.
21. Manter Rosa de Saron no portfólio se já estiver presente no `portfolio.php` local/online.
22. Antes de alterar o portfólio, ler o array/lista real de projetos em `portfolio.php` e modificar apenas projetos existentes no código atual.

---

## 5. Diagnóstico inicial obrigatório

Antes de implementar, auditar e confirmar:

1. Branch atual.
2. Estado do Git com `git status`.
3. Arquivos principais existentes:
   - `index.php`;
   - `portfolio.php`;
   - `assets/include/head.php`;
   - `assets/include/header.php`;
   - `assets/include/btn-whats.php`;
   - `assets/js/script.js`;
   - `assets/css/styles.css`;
   - `robots.txt`;
   - `sitemap.xml`.
4. Se `robots.txt` permite indexação.
5. Se `sitemap.xml` contém apenas URLs públicas e canônicas.
6. Se a home e o portfólio possuem apenas um H1.
7. Se o JSON-LD atual renderiza sem erro.
8. Se o WhatsApp atual está funcionando.
9. Se Rosa de Saron está presente no `portfolio.php`.
10. Se os links externos possuem `rel="noopener noreferrer"`.
11. Se há IDs fictícios de GA4/GTM.
12. Se há `noindex` indevido.

---

## 6. Arquivos que provavelmente serão alterados

Alterar somente se necessário:

- `index.php`;
- `portfolio.php`;
- `assets/include/head.php`;
- `assets/include/btn-whats.php`;
- `assets/js/script.js`;
- `assets/css/styles.css`;
- `sitemap.xml`.

Manter `robots.txt` se já estiver correto.

Não alterar `.htaccess` nesta etapa.

---

# 7. Implementação detalhada

## 7.1 Atualizar WhatsApp com mensagem comercial

Atualizar a URL do WhatsApp em todos os pontos de contato:

- `index.php`;
- `portfolio.php`;
- `assets/include/btn-whats.php`;
- qualquer outro include que use `$whatsappUrl`.

Preservar o telefone atual.

Mensagem oficial:

```txt
Olá, Wilian! Vi seu portfólio e gostaria de um orçamento para um site, landing page ou sistema web. Posso te explicar minha ideia?
```

URL codificada sugerida:

```txt
https://api.whatsapp.com/send?phone=5546991168949&text=Ol%C3%A1%2C%20Wilian%21%20Vi%20seu%20portf%C3%B3lio%20e%20gostaria%20de%20um%20or%C3%A7amento%20para%20um%20site%2C%20landing%20page%20ou%20sistema%20web.%20Posso%20te%20explicar%20minha%20ideia%3F
```

Critério de aceite:

- WhatsApp abre com a nova mensagem em home, portfólio e botão flutuante.
- Número de telefone permanece inalterado.

---

## 7.2 Melhorar meta robots

Arquivo provável:

- `assets/include/head.php`

Atualizar:

```html
<meta name="robots" content="index, follow" />
```

Para:

```html
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
```

Critério de aceite:

- Não inserir `noindex`.
- Não bloquear snippets/imagens.
- Manter página indexável.

---

## 7.3 Refinar schema JSON-LD da home

Arquivo:

- `index.php`

Melhorar o schema sem refazer tudo do zero.

### 7.3.1 LocalBusiness

Adicionar `addressLocality` se ainda não existir:

```php
'address' => [
  '@type' => 'PostalAddress',
  'addressLocality' => 'Pato Branco',
  'addressRegion' => 'PR',
  'addressCountry' => 'BR'
],
```

Manter `areaServed` com:

- Pato Branco;
- Coronel Vivida;
- sudoeste do Paraná;
- Paraná;
- Brasil/remoto, se coerente com o schema atual.

### 7.3.2 Person

Atualizar `jobTitle` para algo mais específico e coerente com a oferta.

Usar preferencialmente:

```php
'jobTitle' => 'Desenvolvedor Web FullStack',
```

Justificativa: o site vende sites, landing pages, sistemas web, dashboards, integrações, deploy e manutenção.

### 7.3.3 serviceType

Ampliar os serviços do schema para refletir o conteúdo visível:

```php
'serviceType' => [
  'Desenvolvimento de sites institucionais',
  'Desenvolvimento de landing pages',
  'Desenvolvimento de sistemas web sob medida',
  'Front-end com React.js, Next.js e Angular',
  'Sistemas administrativos e dashboards',
  'Integrações com APIs',
  'Deploy e manutenção de aplicações web',
  'SEO técnico para sites'
],
```

Não adicionar serviço que não esteja visível ou coerente com a página.

### 7.3.4 FAQPage

Garantir que o FAQPage do schema esteja coerente com o FAQ visível no HTML.

Adicionar, se ainda não existir:

```php
[
  '@type' => 'Question',
  'name' => 'O que devo enviar para receber um orçamento?',
  'acceptedAnswer' => [
    '@type' => 'Answer',
    'text' => 'Para agilizar, informe o tipo de projeto (site, landing page ou sistema), o objetivo, o prazo desejado, referências de sites que gosta e o que já existe hoje. Com essas informações, é possível retornar com uma direção técnica e estimativa inicial.'
  ]
]
```

Também considerar FAQ sobre atendimento remoto, se ainda não estiver bem coberto:

```php
[
  '@type' => 'Question',
  'name' => 'Você atende empresas fora de Pato Branco e do Paraná?',
  'acceptedAnswer' => [
    '@type' => 'Answer',
    'text' => 'Sim. O atendimento pode ser feito remotamente para empresas de todo o Brasil, mantendo foco regional em Pato Branco, Coronel Vivida e sudoeste do Paraná para SEO local.'
  ]
]
```

Critério de aceite:

- FAQ visível e FAQPage devem estar coerentes.
- Não criar pergunta no schema que não exista no HTML.
- JSON-LD deve continuar válido.
- Não inventar dados.

---

## 7.4 Melhorar FAQ visível da home

Arquivo:

- `index.php`

Adicionar ou melhorar `<details>` dentro da seção FAQ.

Pergunta obrigatória:

```html
<details>
  <summary>O que devo enviar para receber um orçamento?</summary>
  <p>Para agilizar, informe o tipo de projeto (site, landing page ou sistema), o objetivo, o prazo desejado, referências de sites que gosta e o que já existe hoje. Com essas informações, consigo retornar com uma direção técnica e estimativa inicial.</p>
</details>
```

Pergunta recomendada, se ainda não existir:

```html
<details>
  <summary>Você atende empresas fora de Pato Branco e do Paraná?</summary>
  <p>Sim. O atendimento pode ser feito remotamente para empresas de todo o Brasil. O foco regional ajuda no SEO local para Pato Branco, Coronel Vivida e sudoeste do Paraná, mas os projetos podem ser conduzidos online.</p>
</details>
```

Critério de aceite:

- O FAQ deve ajudar o visitante a tomar decisão.
- O conteúdo deve ser visível e coerente com o JSON-LD.
- Não exagerar no número de perguntas.

---

## 7.5 Adicionar mini briefing na seção de contato

Arquivo:

- `index.php`

Adicionar microcopy na seção de contato para reduzir fricção e orientar o lead.

Exemplo:

```html
<p class="contact-hint">
  Para agilizar, inclua na mensagem: <strong>tipo de projeto</strong> (site, landing page ou sistema),
  <strong>objetivo</strong> (gerar contato, vender, organizar operação) e
  <strong>prazo desejado</strong>.
</p>
```

Se necessário, adicionar CSS mínimo em `assets/css/styles.css` para `.contact-hint`.

Critério de aceite:

- Microcopy deve aparecer de forma legível.
- Não quebrar layout mobile.
- Não criar poluição visual.

---

## 7.6 Melhorar copy da home sem reescrever tudo

Arquivo:

- `index.php`

Ajustar textos apenas onde houver ganho real de clareza e conversão.

A home deve responder rapidamente:

- O que Wilian faz?
- Para quem faz?
- Que problema resolve?
- Que serviços oferece?
- Por que contratar?
- Como pedir orçamento?
- O que enviar no primeiro contato?

Reforçar naturalmente:

- criação de sites;
- landing pages;
- sistemas web;
- Pato Branco;
- Coronel Vivida;
- sudoeste do Paraná;
- atendimento remoto.

Não transformar a página em lista de keywords.

Não mudar visual estruturalmente.

Critério de aceite:

- Hero e seções principais devem ficar mais comerciais.
- O site deve parecer uma oferta profissional, não apenas um currículo.
- Copy deve ser honesta, direta e natural.

---

## 7.7 Melhorar portfólio/projetos

Arquivo:

- `portfolio.php`

Antes de alterar:

1. Ler o array/lista real de projetos.
2. Confirmar quais projetos existem no código local.
3. Manter Rosa de Saron se estiver presente.
4. Não adicionar projeto inexistente.
5. Não inventar métricas.

Melhorar descrições com linguagem comercial.

Cada projeto pode apresentar, quando possível:

- nome;
- tipo;
- contexto;
- problema/necessidade;
- benefício qualitativo;
- tecnologias;
- papel no projeto;
- link;
- imagem;
- alt text.

Benefícios qualitativos permitidos:

- presença digital mais profissional;
- apresentação institucional mais clara;
- geração de contato comercial;
- organização operacional interna;
- experiência responsiva;
- clareza de serviços;
- apoio à conversão por WhatsApp;
- melhoria de navegação.

Não usar números ou resultados sem confirmação.

### Meta description do portfolio.php

Melhorar a meta description com referência local e remota.

Sugestão:

```php
$pageDescription = 'Projetos de sites institucionais, landing pages e sistemas web desenvolvidos por Wilian Gulini para empresas em Pato Branco, Coronel Vivida, sudoeste do Paraná e atendimento remoto no Brasil.';
```

Ajustar para ficar natural e dentro de tamanho razoável.

Critério de aceite:

- Portfólio deve vender melhor.
- Projetos devem continuar reais.
- Links devem permanecer corretos.
- Rosa de Saron deve permanecer se estiver presente.
- Nenhuma métrica inventada.

---

## 7.8 Ajustar CollectionPage e CreativeWork

Arquivo:

- `portfolio.php`

Se o JSON-LD do portfólio já usa `CollectionPage` e `CreativeWork`, refinar para ficar coerente com os projetos reais.

Garantir que:

- todos os projetos do schema existem visualmente;
- os nomes correspondem ao HTML;
- as URLs estão corretas;
- as imagens existem;
- as descrições não inventam resultados.

Critério de aceite:

- Schema do portfólio deve refletir apenas projetos reais.
- Não adicionar projeto ausente no HTML.
- Não deixar projeto visual sem representação coerente no schema, se o schema já mapeia projetos.

---

## 7.9 Analytics, eventos e UTMs

Arquivo:

- `assets/js/script.js`

Implementar sem ID fictício de GA4/GTM.

### Captura de UTMs

Preservar em `sessionStorage`:

- `utm_source`;
- `utm_medium`;
- `utm_campaign`;
- `utm_content`;
- `utm_term`.

Exemplo de implementação segura:

```javascript
function storeUtms() {
  var utmKeys = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term'];
  var search = new URLSearchParams(window.location.search);
  var utms = {};

  utmKeys.forEach(function (key) {
    var value = search.get(key);
    if (value) {
      utms[key] = value;
    }
  });

  if (Object.keys(utms).length > 0) {
    try {
      sessionStorage.setItem('gulini_utms', JSON.stringify(utms));
    } catch (error) {}
  }
}
```

### Função segura de tracking

```javascript
function getStoredUtms() {
  try {
    return JSON.parse(sessionStorage.getItem('gulini_utms') || '{}');
  } catch (error) {
    return {};
  }
}

function trackEvent(name, params) {
  var data = Object.assign({}, getStoredUtms(), params || {});

  if (typeof window.gtag === 'function') {
    window.gtag('event', name, data);
  }

  if (window.dataLayer && Array.isArray(window.dataLayer)) {
    window.dataLayer.push(Object.assign({ event: name }, data));
  }
}
```

### Eventos desejados

- `lead_whatsapp`;
- `lead_email`;
- `project_click`;
- `portfolio_click`;
- `social_click`;
- `nav_click`.

### Listener sugerido

```javascript
document.addEventListener('click', function (event) {
  var target = event.target.closest('a');

  if (!target) {
    return;
  }

  var href = target.getAttribute('href') || '';
  var text = (target.textContent || '').trim().substring(0, 80);

  if (href.indexOf('api.whatsapp.com') !== -1 || href.indexOf('wa.me') !== -1) {
    trackEvent('lead_whatsapp', { link_url: href, link_text: text });
    return;
  }

  if (href.indexOf('mailto:') === 0) {
    trackEvent('lead_email', { link_url: href, link_text: text });
    return;
  }

  if (target.closest('.project-card, .portfolio-card')) {
    trackEvent('project_click', { link_url: href, link_text: text });
    return;
  }

  if (href === 'portfolio.php' || href.indexOf('portfolio') !== -1) {
    trackEvent('portfolio_click', { link_url: href, link_text: text });
    return;
  }

  if (href.indexOf('github.com') !== -1 || href.indexOf('linkedin.com') !== -1) {
    trackEvent('social_click', { link_url: href, link_text: text });
    return;
  }

  if (target.closest('header, .site-header, nav')) {
    trackEvent('nav_click', { link_url: href, link_text: text });
  }
});
```

Adaptar os seletores à estrutura real do projeto.

Critério de aceite:

- Não quebrar scripts existentes.
- Não depender de GA4/GTM configurado.
- Não usar ID fictício.
- UTMs devem ser preservadas em `sessionStorage`.
- Eventos devem funcionar se `gtag` ou `dataLayer` existirem.
- Site deve funcionar normalmente se nenhum existir.

---

## 7.10 Imagens, performance e acessibilidade

Arquivos prováveis:

- `index.php`;
- `portfolio.php`;
- CSS, se necessário.

Melhorias permitidas:

- adicionar `decoding="async"` em imagens abaixo da dobra;
- manter `loading="lazy"` em imagens abaixo da dobra;
- não usar lazy na imagem principal se ela impacta LCP;
- adicionar `width` e `height` nas imagens quando as dimensões forem confirmadas com segurança;
- melhorar `alt` quando estiver genérico;
- garantir links com nomes acessíveis;
- manter `rel="noopener noreferrer"` em links externos;
- melhorar foco/contraste apenas se necessário.

Não remover WebP.

Não refatorar sistema de imagens.

Critério de aceite:

- Sem regressão visual.
- Melhor estabilidade de layout quando possível.
- Melhor acessibilidade sem mudanças agressivas.

---

## 7.11 CSS mínimo

Arquivo:

- `assets/css/styles.css`

Alterar apenas se necessário para:

- `.contact-hint`;
- microcopies novas;
- responsividade;
- pequenas correções de legibilidade;
- espaçamento de FAQ/contato, se necessário.

Não redesenhar o site.

Critério de aceite:

- Visual preservado.
- Mobile preservado.
- CSS sem crescimento desnecessário.

---

## 7.12 Sitemap e robots

### robots.txt

Manter se estiver correto:

```txt
User-agent: *
Allow: /

Sitemap: https://gulini.com.br/sitemap.xml
```

### sitemap.xml

Atualizar `lastmod` para `2026-06-22` apenas nas páginas realmente alteradas.

URLs canônicas esperadas:

```xml
<loc>https://gulini.com.br/</loc>
<loc>https://gulini.com.br/portfolio.php</loc>
```

Critério de aceite:

- XML estruturalmente válido.
- Apenas URLs públicas e canônicas.
- `robots.txt` não bloqueia indexação.

---

# 8. Ordem de execução

1. Confirmar branch e `git status`.
2. Ler arquivos principais.
3. Validar estado atual rapidamente.
4. Atualizar WhatsApp em todos os pontos.
5. Atualizar meta robots.
6. Refinar schema da home.
7. Adicionar FAQ visível e mini briefing.
8. Melhorar copy pontual da home.
9. Melhorar `portfolio.php` e projetos reais.
10. Refinar JSON-LD do portfólio, se necessário.
11. Implementar UTMs e eventos em `script.js`.
12. Ajustar imagens, `decoding`, `width`/`height` e alt text onde for seguro.
13. Ajustar CSS mínimo, se necessário.
14. Atualizar `sitemap.xml`.
15. Rodar validações.
16. Revisar `git diff`.
17. Entregar relatório final.

---

# 9. Validações obrigatórias

Rodar quando possível:

```bash
php -l index.php
php -l portfolio.php
php -l assets/include/head.php
php -l assets/include/btn-whats.php
git diff --check
git diff
```

Checklist manual:

- [ ] Branch correta: `feature/seo-landing-conversion`.
- [ ] Nenhum commit, push ou deploy realizado.
- [ ] Home possui apenas um H1.
- [ ] Portfólio possui apenas um H1.
- [ ] WhatsApp abre com mensagem comercial na home.
- [ ] WhatsApp abre com mensagem comercial no portfólio.
- [ ] WhatsApp abre com mensagem comercial no botão flutuante.
- [ ] Meta robots inclui diretivas de snippet.
- [ ] `addressLocality: Pato Branco` presente, se coerente com o schema.
- [ ] `jobTitle` atualizado para `Desenvolvedor Web FullStack`.
- [ ] `serviceType` ampliado sem inventar serviços.
- [ ] FAQ novo visível no HTML.
- [ ] FAQPage coerente com FAQ visível.
- [ ] Mini briefing presente na seção de contato.
- [ ] Projetos do portfólio continuam reais.
- [ ] Rosa de Saron permanece no portfólio, se já estava presente.
- [ ] Nenhuma métrica ou depoimento inventado.
- [ ] Eventos implementados sem ID fictício de GA4/GTM.
- [ ] UTMs preservadas em `sessionStorage`.
- [ ] Links externos com `rel="noopener noreferrer"`.
- [ ] Ausência de `noindex`.
- [ ] `robots.txt` permite indexação.
- [ ] `sitemap.xml` com URLs canônicas e `lastmod` atualizado.
- [ ] JSON-LD sem erro de sintaxe PHP.
- [ ] Layout visual preservado.
- [ ] Mobile sem regressão aparente.

Se `SimpleXML`, `DOMDocument` ou `xmllint` não estiverem disponíveis, validar XML por inspeção estrutural ou ferramenta alternativa disponível.

---

# 10. Critérios de aceite

A implementação estará aprovada se:

1. WhatsApp estiver atualizado em todos os pontos com mensagem orientada a orçamento.
2. Meta robots estiver completo.
3. Schema LocalBusiness tiver SEO local mais preciso.
4. Person tiver `jobTitle` mais específico.
5. `serviceType` representar melhor os serviços oferecidos.
6. FAQ visível e FAQPage estiverem coerentes.
7. Seção de contato tiver mini briefing.
8. Copy da home estiver mais comercial sem parecer artificial.
9. Portfólio estiver mais orientado a benefício.
10. Rosa de Saron permanecer no portfólio se já existia.
11. Projetos não tiverem métricas inventadas.
12. Eventos e UTMs estiverem preparados sem GA4/GTM fictício.
13. Imagens tiverem melhorias seguras de performance/acessibilidade.
14. Sitemap estiver atualizado.
15. Robots continuar permitindo indexação.
16. PHP não tiver erros de sintaxe.
17. Visual não tiver regressão.

---

# 11. O que não alterar

Não alterar:

- telefone;
- e-mail;
- GitHub;
- LinkedIn;
- `.htaccess`;
- estrutura de servidor;
- identidade visual principal;
- links de projetos sem motivo;
- projetos reais já existentes;
- número “5 anos” e “22 projetos”, se legítimos;
- bibliotecas existentes apenas por preferência;
- arquivos fora do escopo.

Não adicionar:

- GA4/GTM com ID fictício;
- depoimentos falsos;
- avaliações falsas;
- métricas não comprovadas;
- clientes inexistentes;
- promessas de ranking;
- novas dependências externas.

---

# 12. Relatório final esperado

Ao final da execução, entregar relatório com:

## 12.1 Resumo executivo

Explicar em poucas linhas o que foi melhorado.

## 12.2 Arquivos alterados

Listar cada arquivo alterado e o motivo.

## 12.3 SEO técnico

Explicar melhorias em:

- meta robots;
- titles/descriptions, se alterados;
- canonical, se alterado;
- schema;
- sitemap;
- robots;
- headings;
- imagens;
- links.

## 12.4 SEO local

Explicar como foram reforçados:

- Pato Branco;
- Coronel Vivida;
- sudoeste do Paraná;
- Paraná;
- atendimento remoto.

## 12.5 Marketing e copywriting

Explicar melhorias em:

- proposta de valor;
- clareza da oferta;
- mini briefing;
- FAQ;
- linguagem comercial dos projetos.

## 12.6 Conversão/CRO

Explicar melhorias em:

- CTA;
- WhatsApp;
- e-mail;
- contato;
- redução de fricção.

## 12.7 Portfólio/projetos

Explicar quais projetos foram melhorados e como.

## 12.8 Analytics/eventos

Documentar:

- eventos criados;
- lógica de UTMs;
- como conectar GA4/GTM futuramente;
- ausência de ID fictício.

## 12.9 Performance/acessibilidade

Explicar:

- `decoding`;
- `loading`;
- `width`/`height`;
- alt text;
- links seguros;
- responsividade, se alterada.

## 12.10 Validações executadas

Listar comandos e resultados:

```bash
php -l index.php
php -l portfolio.php
php -l assets/include/head.php
php -l assets/include/btn-whats.php
git diff --check
git diff
```

## 12.11 Pendências de Wilian

Listar o que depende do proprietário:

- ID real de GA4 ou GTM;
- verificação/uso do Google Search Console;
- envio do sitemap no Search Console;
- criação/otimização do Google Business Profile;
- imagem Open Graph 1200x630, se quiser padronizar;
- coleta de depoimentos reais;
- publicação de conteúdo no LinkedIn;
- divulgação na Workana;
- campanhas com links UTM.

---

# 13. Plano de marketing off-site de 30 dias

Incluir no relatório final.

## Semana 1 — Base

- Atualizar headline do LinkedIn.
- Atualizar bio do GitHub com link para o portfólio.
- Verificar Google Search Console.
- Enviar sitemap.
- Criar ou revisar Google Business Profile, se aplicável.
- Divulgar portfólio com link UTM.

## Semana 2 — Conteúdo

- Publicar post no LinkedIn apresentando os serviços.
- Publicar um estudo de caso real do portfólio.
- Publicar bastidores da otimização do próprio portfólio.
- Compartilhar em grupos locais/regionais com abordagem profissional.

## Semana 3 — Prospecção

- Identificar 10 a 15 empresas locais com site fraco ou inexistente.
- Criar abordagem personalizada por WhatsApp/e-mail.
- Usar links com UTM.
- Oferecer diagnóstico simples de presença digital.

## Semana 4 — Autoridade

- Publicar estudo técnico sobre SEO/landing page.
- Publicar checklist para pequenas empresas.
- Melhorar perfil Workana.
- Criar proposta padrão para sites, landing pages e sistemas.
- Coletar depoimentos reais.

---

# 14. Observação final

Não declarar que o SEO está perfeito.

SEO depende de tempo, autoridade, backlinks, concorrência, comportamento do usuário, qualidade do conteúdo e mensuração.

O objetivo desta etapa é deixar a base técnica, comercial e estratégica do portfólio mais forte, segura e preparada para gerar visibilidade e leads.
