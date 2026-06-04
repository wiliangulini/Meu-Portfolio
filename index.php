<?php
$currentPage = 'home';
$whatsappUrl = 'https://api.whatsapp.com/send?phone=5546991168949&text=Gostaria%20de%20saber%20mais%20sobre%20seu%20trabalho';
$pageTitle = 'Sites, Landing Pages e Sistemas Web no PR | Gulini.Dev';
$pageDescription = 'Desenvolvimento de sites, landing pages e sistemas sob medida para empresas em Pato Branco, Coronel Vivida e sudoeste do PR. Fale com Wilian Gulini.';
$canonicalUrl = 'https://gulini.com.br/';
$ogImage = 'https://gulini.com.br/assets/images/oniun.webp';
$pageType = 'website';
$structuredData = [
  [
    '@context' => 'https://schema.org',
    '@graph' => [
      [
        '@type' => 'WebSite',
        '@id' => 'https://gulini.com.br/#website',
        'url' => 'https://gulini.com.br/',
        'name' => 'Gulini.Dev',
        'inLanguage' => 'pt-BR',
        'publisher' => [
          '@id' => 'https://gulini.com.br/#business'
        ]
      ],
      [
        '@type' => ['ProfessionalService', 'LocalBusiness'],
        '@id' => 'https://gulini.com.br/#business',
        'name' => 'Gulini.Dev',
        'url' => 'https://gulini.com.br/',
        'image' => 'https://gulini.com.br/assets/images/wilian_gulini.webp',
        'logo' => 'https://gulini.com.br/assets/images/gulini.dev.webp',
        'description' => $pageDescription,
        'email' => 'gulini.dev@gmail.com',
        'telephone' => '+55 46 99116-8949',
        'priceRange' => '$$',
        'founder' => [
          '@id' => 'https://gulini.com.br/#person'
        ],
        'address' => [
          '@type' => 'PostalAddress',
          'addressRegion' => 'PR',
          'addressCountry' => 'BR'
        ],
        'areaServed' => [
          ['@type' => 'City', 'name' => 'Pato Branco'],
          ['@type' => 'City', 'name' => 'Coronel Vivida'],
          ['@type' => 'AdministrativeArea', 'name' => 'Sudoeste do Paraná']
        ],
        'serviceType' => [
          'Desenvolvimento de sites institucionais',
          'Desenvolvimento de landing pages',
          'Desenvolvimento de sistemas web sob medida',
          'SEO técnico para sites'
        ],
        'sameAs' => [
          'https://github.com/wiliangulini',
          'https://www.linkedin.com/in/wilian-gulini-4aa4391b8/'
        ]
      ],
      [
        '@type' => 'Person',
        '@id' => 'https://gulini.com.br/#person',
        'name' => 'Wilian Gulini',
        'jobTitle' => 'Desenvolvedor de software',
        'url' => 'https://gulini.com.br/',
        'image' => 'https://gulini.com.br/assets/images/wilian_gulini.webp',
        'sameAs' => [
          'https://github.com/wiliangulini',
          'https://www.linkedin.com/in/wilian-gulini-4aa4391b8/'
        ],
        'worksFor' => [
          '@id' => 'https://gulini.com.br/#business'
        ]
      ],
      [
        '@type' => 'FAQPage',
        '@id' => 'https://gulini.com.br/#faq',
        'mainEntity' => [
          [
            '@type' => 'Question',
            'name' => 'A Gulini.Dev desenvolve apenas sites?',
            'acceptedAnswer' => [
              '@type' => 'Answer',
              'text' => 'A Gulini.Dev desenvolve sites institucionais, landing pages e sistemas web sob medida, incluindo front-end, back-end e banco de dados quando o projeto precisa.'
            ]
          ],
          [
            '@type' => 'Question',
            'name' => 'A Gulini.Dev atende empresas fora de Pato Branco e Coronel Vivida?',
            'acceptedAnswer' => [
              '@type' => 'Answer',
              'text' => 'Sim. O foco de SEO é regional no sudoeste do Paraná, mas os projetos podem ser conduzidos remotamente com empresas de outras regiões.'
            ]
          ],
          [
            '@type' => 'Question',
            'name' => 'Os projetos incluem SEO?',
            'acceptedAnswer' => [
              '@type' => 'Answer',
              'text' => 'Os sites e landing pages podem incluir estrutura técnica de SEO, responsividade, metadados, sitemap e organização de conteúdo para facilitar a compreensão pelos buscadores.'
            ]
          ]
        ]
      ]
    ]
  ]
];
require 'assets/include/head.php';
?>
  <body class="home-page">
    <main id="home">
      <section class="hero-section">
        <?php require 'assets/include/header.php'; ?>
        <div class="overlay" aria-hidden="true"></div>
        <div class="container hero-content">
          <div class="hero-copy">
            <span class="section-kicker">Olá! Eu sou</span>
            <h1>Wilian Gulini</h1>
            <h2>Eu sou um desenvolvedor <span class="txt-rotate" aria-live="polite"></span></h2>
            <p>Desenvolvo sites, landing pages e sistemas web sob medida para empresas em Pato Branco, Coronel Vivida e sudoeste do Paraná.</p>
            <div class="hero-actions">
              <a class="btn-primary-action" href="<?php echo esc($whatsappUrl); ?>" target="_blank" rel="noopener noreferrer">Pedir orçamento no WhatsApp</a>
              <a class="btn-secondary-action" href="#projetos">Ver projetos</a>
            </div>
            <div class="hero-proof" aria-label="Resumo da experiência da Gulini.Dev">
              <div>
                <strong>5 anos</strong>
                <span>de experiência</span>
              </div>
              <div>
                <strong>22</strong>
                <span>projetos completos</span>
              </div>
              <div>
                <strong>PR</strong>
                <span>Pato Branco, Coronel Vivida e região</span>
              </div>
            </div>
          </div>
          <div class="arrow" aria-hidden="true">
            <div class="svg">
              <svg width="24" height="41" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z"/></svg>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-light" id="servicos">
        <div class="container">
          <div class="section-heading">
            <span class="section-kicker">Serviços</span>
            <h2>Desenvolvimento para gerar presença, contato e operação</h2>
            <p>O trabalho combina interface, código e estrutura de SEO para criar páginas e sistemas que possam ser usados de verdade pelo seu negócio.</p>
          </div>

          <div class="service-grid">
            <article class="service-card">
              <span>01</span>
              <h3>Sites institucionais</h3>
              <p>Sites responsivos para apresentar sua empresa, serviços, diferenciais e canais de contato com uma estrutura clara para clientes e buscadores.</p>
            </article>
            <article class="service-card">
              <span>02</span>
              <h3>Landing pages</h3>
              <p>Páginas focadas em captação de leads, campanhas, lançamentos e orçamentos, com CTA bem definido e conteúdo direto ao ponto.</p>
            </article>
            <article class="service-card">
              <span>03</span>
              <h3>Sistemas web sob medida</h3>
              <p>Soluções para controle interno, estoque, dashboards e automações, usando front-end, back-end e banco de dados conforme a necessidade.</p>
            </article>
          </div>
        </div>
      </section>

      <section class="section" id="diferenciais">
        <div class="container">
          <div class="split-layout">
            <div>
              <span class="section-kicker">Como o projeto é pensado</span>
              <h2>Menos página bonita sem direção, mais construção com objetivo</h2>
            </div>
            <div class="feature-list">
              <div class="feature-item">
                <h3>SEO técnico desde a base</h3>
                <p>Metadados, sitemap, canonical, textos rastreáveis e estrutura semântica entram no projeto desde a implementação.</p>
              </div>
              <div class="feature-item">
                <h3>Responsividade e desempenho</h3>
                <p>Layouts pensados para mobile e desktop, com imagens otimizadas e navegação objetiva.</p>
              </div>
              <div class="feature-item">
                <h3>Entrega alinhada ao negócio</h3>
                <p>Antes de codar, a oferta, o público e o fluxo de contato precisam estar claros para a página trabalhar a favor da empresa.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-light" id="projetos">
        <div class="container">
          <div class="section-heading">
            <span class="section-kicker">Projetos selecionados</span>
            <h2>Trabalhos que mostram sites, landing pages e sistemas em produção</h2>
            <p>Alguns projetos foram desenvolvidos pela Gulini.Dev como freela; outros foram entregas realizadas durante experiências profissionais anteriores.</p>
          </div>

          <div class="project-grid">
            <article class="project-card">
              <a href="https://www.oniun.com.br/" target="_blank" rel="noopener noreferrer">
                <img src="assets/images/oniun.webp" alt="Tela do site institucional da Oniun desenvolvido pela Gulini.Dev">
                <div class="project-content">
                  <span>Site institucional</span>
                  <h3>Oniun</h3>
                  <p>Site desenvolvido como freela pela Gulini.Dev para apresentar a marca, serviços e canais de contato.</p>
                </div>
              </a>
            </article>
            <article class="project-card">
              <a href="https://gulini.com.br/construtora-acredite/" target="_blank" rel="noopener noreferrer">
                <img src="assets/images/construtora_acredite.webp" alt="Tela do site da Construtora Acredite desenvolvido pela Gulini.Dev">
                <div class="project-content">
                  <span>Site institucional</span>
                  <h3>Construtora Acredite</h3>
                  <p>Projeto web para apresentar a construtora, seus serviços, portfólio e formas de contato.</p>
                </div>
              </a>
            </article>
            <article class="project-card">
              <a href="https://lavanderia-e5a18.firebaseapp.com/" target="_blank" rel="noopener noreferrer">
                <img src="assets/images/lavanderia.webp" alt="Tela do sistema de controle de estoque para lavanderia desenvolvido pela Gulini.Dev">
                <div class="project-content">
                  <span>Sistema web</span>
                  <h3>Controle de Estoque</h3>
                  <p>Sistema com Angular e Spring criado para uso interno, com foco em organização operacional.</p>
                </div>
              </a>
            </article>
          </div>

          <div class="center-action">
            <a class="btn-secondary-action dark" href="portfolio.php">Ver portfólio completo</a>
          </div>
        </div>
      </section>

      <section class="section" id="processo">
        <div class="container">
          <div class="section-heading compact">
            <span class="section-kicker">Processo</span>
            <h2>Um fluxo simples para sair da ideia e chegar na entrega</h2>
          </div>

          <div class="process-grid">
            <div class="process-step">
              <span>1</span>
              <h3>Diagnóstico</h3>
              <p>Entendimento da empresa, público, objetivo, conteúdo disponível e prioridades do projeto.</p>
            </div>
            <div class="process-step">
              <span>2</span>
              <h3>Estrutura</h3>
              <p>Definição de páginas, seções, chamadas, tecnologias e pontos essenciais de SEO técnico.</p>
            </div>
            <div class="process-step">
              <span>3</span>
              <h3>Desenvolvimento</h3>
              <p>Implementação responsiva com revisão visual, ajustes de conteúdo e publicação.</p>
            </div>
            <div class="process-step">
              <span>4</span>
              <h3>Validação</h3>
              <p>Checagem de links, metadados, sitemap, navegação, WhatsApp, responsividade e experiência final.</p>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-light" id="sobre">
        <div class="container">
          <div class="about-layout">
            <div class="about-image">
              <img src="assets/images/wilian_gulini.webp" alt="Foto de Wilian Gulini, desenvolvedor da Gulini.Dev">
            </div>
            <div class="about-copy">
              <span class="section-kicker">Sobre Wilian Gulini</span>
              <h2>Desenvolvedor com experiência em front-end, back-end e projetos web para empresas</h2>
              <p>Tenho experiência com Angular, JavaScript, TypeScript, PHP, Java, Spring, MySQL, HTML5, CSS3, Bootstrap, jQuery, WordPress e Git. Minha especialidade é front-end, mas também atuo em back-end e banco de dados quando o projeto exige.</p>
              <p>Hoje o foco da Gulini.Dev é desenvolver sites, landing pages e sistemas web com responsividade, organização técnica e SEO quando necessário.</p>
              <div class="contact-links">
                <a href="mailto:gulini.dev@gmail.com">gulini.dev@gmail.com</a>
                <a href="https://github.com/wiliangulini" target="_blank" rel="noopener noreferrer">GitHub</a>
                <a href="https://www.linkedin.com/in/wilian-gulini-4aa4391b8/" target="_blank" rel="noopener noreferrer">LinkedIn</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section" id="faq">
        <div class="container">
          <div class="section-heading compact">
            <span class="section-kicker">FAQ</span>
            <h2>Dúvidas comuns antes de começar</h2>
          </div>

          <div class="faq-list">
            <details>
              <summary>A Gulini.Dev desenvolve apenas sites?</summary>
              <p>Não. Além de sites institucionais e landing pages, também desenvolvo sistemas web sob medida com front-end, back-end e banco de dados quando necessário.</p>
            </details>
            <details>
              <summary>Vocês atendem empresas fora de Pato Branco e Coronel Vivida?</summary>
              <p>Sim. O foco de SEO é regional no sudoeste do Paraná, mas os projetos podem ser conduzidos remotamente com empresas de outras regiões.</p>
            </details>
            <details>
              <summary>Os projetos incluem SEO?</summary>
              <p>Sites e landing pages podem incluir SEO técnico, como estrutura semântica, metadados, sitemap, canonical, responsividade e organização do conteúdo.</p>
            </details>
          </div>
        </div>
      </section>

      <section class="section contact-section" id="contato">
        <div class="container">
          <div class="contact-panel">
            <span class="section-kicker">Contato</span>
            <h2>Precisa de um site, landing page ou sistema web?</h2>
            <p>Envie uma mensagem com o objetivo do projeto, prazo desejado e o que já existe hoje. A partir disso, dá para entender o caminho mais adequado.</p>
            <div class="hero-actions">
              <a class="btn-primary-action" href="<?php echo esc($whatsappUrl); ?>" target="_blank" rel="noopener noreferrer">Pedir orçamento no WhatsApp</a>
              <a class="btn-secondary-action" href="mailto:gulini.dev@gmail.com">Enviar e-mail</a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php require './assets/include/btn-whats.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
