<?php
$currentPage = $currentPage ?? 'home';
$isPortfolio = $currentPage === 'portfolio';
?>
<header class="site-header <?php echo $isPortfolio ? 'is-solid' : ''; ?>">
  <div class="container">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="index.php#home" aria-label="Página inicial da Gulini.Dev">
        <span>G</span>ulini.Dev
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Abrir menu">
        <span class="menu-line"></span>
        <span class="menu-line"></span>
        <span class="menu-line"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link <?php echo !$isPortfolio ? 'active' : ''; ?>" href="index.php#home" data-section="home">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#servicos" data-section="servicos">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#projetos" data-section="projetos">Projetos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php#processo" data-section="processo">Processo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $isPortfolio ? 'active' : ''; ?>" href="portfolio.php">Portfólio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-cta" href="index.php#contato" data-section="contato">Contato</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
