<?php
$currentPage = 'portfolio';
$whatsappUrl = 'https://api.whatsapp.com/send?phone=5546991168949&text=Ol%C3%A1%2C%20Wilian%21%20Vi%20seu%20portf%C3%B3lio%20e%20gostaria%20de%20um%20or%C3%A7amento%20para%20um%20site%2C%20landing%20page%20ou%20sistema%20web.%20Posso%20te%20explicar%20minha%20ideia%3F';
$pageTitle = 'Portfólio de Sites e Sistemas | Gulini.Dev';
$pageDescription = 'Projetos de sites, landing pages e sistemas web de Wilian Gulini para empresas em Pato Branco, Coronel Vivida, sudoeste do Paraná e atendimento remoto.';
$canonicalUrl = 'https://gulini.com.br/portfolio.php';
$ogImage = 'https://gulini.com.br/assets/images/construtora_acredite.webp';
$ogImageAlt = 'Screenshot do site Construtora Acredite — projeto web desenvolvido pela Gulini.Dev';
$ogImageWidth = '1902';
$ogImageHeight = '939';
$pageType = 'website';
$projects = [
  [
    'title' => 'Oniun',
    'type' => 'Site institucional',
    'summary' => 'Site institucional desenvolvido como freela para apresentar marca, serviços e canais de contato com uma presença digital mais clara.',
    'image' => 'assets/images/oniun.webp',
    'width' => '1905',
    'height' => '909',
    'alt' => 'Tela do site institucional da Oniun desenvolvido pela Gulini.Dev',
    'url' => 'https://www.oniun.com.br/'
  ],
  [
    'title' => 'Construtora Acredite',
    'type' => 'Site institucional',
    'summary' => 'Site criado para organizar a apresentação institucional da construtora, seus serviços, portfólio e contato comercial.',
    'image' => 'assets/images/construtora_acredite.webp',
    'width' => '1902',
    'height' => '939',
    'alt' => 'Tela do site da Construtora Acredite desenvolvido pela Gulini.Dev',
    'url' => 'https://gulini.com.br/construtora-acredite/'
  ],
  [
    'title' => 'O Ponto de Partida',
    'type' => 'Landing page · Em produção',
    'summary' => 'Landing page desenvolvida para apresentar o Método Campeão do Diorran, estruturar a oferta e orientar o visitante para conversão e contato.',
    'image' => 'assets/images/o-ponto-de-partida.webp',
    'width' => '1918',
    'height' => '892',
    'alt' => 'Tela da landing page O Ponto de Partida desenvolvida pela Gulini.Dev',
    'url' => 'https://o-ponto-de-partida.com/'
  ],
  [
    'title' => 'Rosa de Saron',
    'type' => 'Sistema web · Em desenvolvimento',
    'summary' => 'Sistema web para floricultura com catálogo de produtos, carrinho, integração com WhatsApp e painel administrativo para apoiar a operação. Desenvolvido com Next.js, React, TypeScript, Tailwind CSS, Prisma e PostgreSQL.',
    'image' => 'assets/images/rosa-de-saron.webp',
    'width' => '1915',
    'height' => '894',
    'alt' => 'Tela do sistema web Rosa de Saron para floricultura desenvolvido pela Gulini.Dev',
    'url' => 'https://rosa-de-saron.com/'
  ],
  [
    'title' => 'CegonhaBox',
    'type' => 'Site web',
    'summary' => 'Projeto desenvolvido durante atuação na Engenharia Digital, com foco em experiência visual, navegação responsiva e apresentação do negócio.',
    'image' => 'assets/images/cegonhabox.webp',
    'width' => '1902',
    'height' => '907',
    'alt' => 'Tela do site da CegonhaBox desenvolvido com participação de Wilian Gulini',
    'url' => 'https://cegonhabox.com.br/baby/'
  ],
  [
    'title' => 'EliteFM',
    'type' => 'Site web',
    'summary' => 'Projeto desenvolvido durante atuação na Engenharia Digital para fortalecer presença digital, conteúdo online e navegação responsiva.',
    'image' => 'assets/images/elitefm.webp',
    'width' => '1900',
    'height' => '912',
    'alt' => 'Tela do site da EliteFM desenvolvido com participação de Wilian Gulini',
    'url' => 'https://www.elitefm.com.br/'
  ],
  [
    'title' => 'Fronter',
    'type' => 'Site e portfólios',
    'summary' => 'Front-end do site e páginas de portfólio desenvolvido durante atuação profissional anterior para apresentar projetos e áreas de atuação.',
    'image' => 'assets/images/fronter.webp',
    'width' => '1898',
    'height' => '908',
    'alt' => 'Tela do site e portfólios da Fronter desenvolvidos com participação de Wilian Gulini',
    'url' => 'https://fronter.eng.br/'
  ],
  [
    'title' => 'Controle de Estoque',
    'type' => 'Sistema web · Em produção',
    'summary' => 'Sistema interno desenvolvido pela Gulini.Dev com Angular 14, Java 17 e Spring Boot para apoiar controle operacional, estoque e consulta de informações. Em produção há anos, com manutenção contínua.',
    'image' => 'assets/images/lavanderia.webp',
    'width' => '1918',
    'height' => '910',
    'alt' => 'Tela do sistema de controle de estoque para lavanderia desenvolvido pela Gulini.Dev'
  ],
  [
    'title' => 'Raquel Manfroi',
    'type' => 'Site institucional',
    'summary' => 'Site institucional desenvolvido pela Gulini.Dev para apresentar a profissional, seus serviços e canais de contato de forma organizada.',
    'image' => 'assets/images/raquelmanfroi.webp',
    'width' => '1902',
    'height' => '912',
    'alt' => 'Tela do site de Raquel Manfroi desenvolvido pela Gulini.Dev',
    'url' => 'https://github.com/wiliangulini/raquel-manfroi-site'
  ]
];
$structuredData = [
  [
    '@context' => 'https://schema.org',
    '@graph' => [
      [
        '@type' => 'BreadcrumbList',
        '@id' => 'https://gulini.com.br/portfolio.php#breadcrumb',
        'itemListElement' => [
          [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Início',
            'item' => 'https://gulini.com.br/'
          ],
          [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Portfólio',
            'item' => 'https://gulini.com.br/portfolio.php'
          ]
        ]
      ],
      [
        '@type' => 'CollectionPage',
        '@id' => 'https://gulini.com.br/portfolio.php#collection',
        'url' => 'https://gulini.com.br/portfolio.php',
        'name' => 'Portfólio de Sites e Sistemas | Gulini.Dev',
        'description' => $pageDescription,
        'inLanguage' => 'pt-BR',
        'isPartOf' => [
          '@id' => 'https://gulini.com.br/#website'
        ],
        'mainEntity' => array_map(function ($project) {
          $item = [
            '@type' => 'CreativeWork',
            'name' => $project['title'],
            'description' => $project['summary'],
            'image' => 'https://gulini.com.br/' . ltrim($project['image'], '/')
          ];
          if (!empty($project['url'])) {
            $item['url'] = $project['url'];
          }
          return $item;
        }, $projects)
      ]
    ]
  ]
];
require 'assets/include/head.php';
?>
  <body class="portfolio-page">
    <a class="skip-to-content" href="#portfolio-main">Ir para o conteúdo</a>
    <?php require 'assets/include/header.php'; ?>

    <main class="page-shell" id="portfolio-main">
      <section class="portfolio-hero">
        <div class="container">
          <span class="section-kicker">Portfólio</span>
          <h1>Portfólio de sites e sistemas desenvolvidos pela Gulini.Dev</h1>
          <p>Uma seleção de projetos reais envolvendo sites institucionais, landing pages e sistemas web. Alguns foram feitos pela Gulini.Dev como freela; outros durante experiências profissionais anteriores.</p>
          <div class="hero-actions">
            <a class="btn-primary-action" href="<?php echo esc($whatsappUrl); ?>" target="_blank" rel="noopener noreferrer">Pedir orçamento no WhatsApp</a>
            <a class="btn-secondary-action dark" href="index.php">Voltar para a landing</a>
          </div>
        </div>
      </section>

      <section class="section section-light">
        <div class="container">
          <div class="portfolio-grid">
            <?php foreach ($projects as $project): ?>
              <?php $hasUrl = !empty($project['url']); ?>
              <article class="portfolio-card<?php echo $hasUrl ? '' : ' portfolio-card-static'; ?>">
                <?php if ($hasUrl): ?>
                <a href="<?php echo esc($project['url']); ?>" target="_blank" rel="noopener noreferrer">
                  <img src="<?php echo esc(asset_url($project['image'])); ?>" alt="<?php echo esc($project['alt']); ?>" width="<?php echo esc($project['width']); ?>" height="<?php echo esc($project['height']); ?>" loading="lazy" decoding="async">
                  <div class="portfolio-content">
                    <span><?php echo esc($project['type']); ?></span>
                    <h3><?php echo esc($project['title']); ?></h3>
                    <p><?php echo esc($project['summary']); ?></p>
                  </div>
                </a>
                <?php else: ?>
                  <img src="<?php echo esc(asset_url($project['image'])); ?>" alt="<?php echo esc($project['alt']); ?>" width="<?php echo esc($project['width']); ?>" height="<?php echo esc($project['height']); ?>" loading="lazy" decoding="async">
                  <div class="portfolio-content">
                    <span><?php echo esc($project['type']); ?></span>
                    <h3><?php echo esc($project['title']); ?></h3>
                    <p><?php echo esc($project['summary']); ?></p>
                  </div>
                <?php endif; ?>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </section>

      <section class="section contact-section">
        <div class="container">
          <div class="contact-panel">
            <span class="section-kicker">Novo projeto</span>
            <h2>Quer desenvolver algo parecido para sua empresa?</h2>
            <p>Envie uma mensagem com o tipo de projeto, objetivo e prazo desejado. Eu retorno com uma direção técnica e comercial para começar.</p>
            <div class="hero-actions">
              <a class="btn-primary-action" href="<?php echo esc($whatsappUrl); ?>" target="_blank" rel="noopener noreferrer">Pedir orçamento no WhatsApp</a>
              <a class="btn-secondary-action" href="mailto:gulini.dev@gmail.com">Enviar e-mail</a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <?php require './assets/include/btn-whats.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="<?php echo esc(asset_url('assets/js/script.js')); ?>"></script>
  </body>
</html>
