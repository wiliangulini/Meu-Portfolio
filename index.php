<?php require "assets/include/head.php"; ?>
  <body onload="typeWriter();">
    <main id="home">
      <div class="overlay"></div>
      <?php require "assets/include/header.php"; ?>
      <section class="d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
              <div class="text fadeInUp d-flex flex-column align-items-center justify-content-center">
                <span class="h5">Olá! Eu sou</span>
                <h1>Wilian Gulini</h1>
                <h2>
                  Eu sou um desenvolvedor
                  <span class="txt-rotate"></span>
                </h2>
              </div>
            </div>
          </div>
          <div class="arrow d-flex justify-content-center align-items-center">
            <div class="svg">
              <svg width="24" height="41" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 21.883l-6.235-7.527-.765.644 7.521 9 7.479-9-.764-.645-6.236 7.529v-21.884h-1v21.883z"/></svg>
            </div>
          </div>
        </div>
      </section>
    </main>
    <section id="about">
      <div id="sobre"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 img d-flex justify-content-center align-items-center">
            <img src="assets/images/wilian_gulini.webp" alt="imagem de Wilian Gulini">
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 txt d-flex flex-column align-items-start justify-content-center pl-4">
            <div id="animate" class="w-100">
              <p class="h2">Sobre</p>
              <div class="about d-flex flex-column align-items-start justify-content-center">
                <p class="h5">Estou entrando no quinto ano na área, nesse período adquiri conhecimento em algumas linguagens e também frameworks como Angular, Spring, PHP, Java, Typescript, JavaScript, HTML5, CSS3, MySQL, GIT.</p>
                <p class="h5">Trabalho com prazos pois são importantes pra manter o desenvolvimento em ordem, minha especialidade é o front-end porem também tenho conhecimento e trabalhos no back-end e banco de dados</p>
              </div>
              <div class="data d-flex">
                <ul class="ul">
                  <li class="font-weight-bold">E-email:</li>
                </ul>
                <ul>
                  <li>
                    <a href="mailto:gulini.dev@gmail.com">gulini.dev@gmail.com</a>
                  </li>
                </ul>
              </div>
              <div class="linkedin d-flex">
                <ul class="ul">
                  <li class="font-weight-bold">Linkedin:</li>
                </ul>
                <ul>
                  <li>
                    <a target="_blank" href="https://www.linkedin.com/in/wilian-gulini-4aa4391b8/">
                      linkedin.com/wiliangulini
                    </a>
                  </li>
                </ul>
              </div>
              <div class="github d-flex">
                <ul class="ul">
                  <li class="font-weight-bold">Github:</li>
                </ul>
                <ul>
                  <li>
                    <a target="_blank" href="https://github.com/wiliangulini">
                      github.com/wiliangulini
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div id="animate1" class="w-100">
              <p class="h4"><span class="blue">22 </span>Projetos Completos</p>
              <a class="download" download href="assets/Profile.pdf">DOWNLOAD CV</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="resume">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <ul>
              <li class="experience"><a href="#experience">Experiência</a></li>
              <li class="education"><a href="#education"> Educação</a></li>
              <li class="skills"><a href="#skills">Habilidades</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9" id="res">
            
            <div id="experience">
              <p id="experienceInt" class="h2 title">Experiência</p>
              <div>
                <div class="resumeInt" id="r3">
                  <div class="img">
                    <img src="assets/images/ideias.webp" alt="icon"/>
                  </div>
                  <div class="text">
                    <p class="h6">2020 - Presente</p>
                    <p class="h2">Desenvolvedor de Software, Sistemas Web/Mobile e de Sites Responsivos com SEO incluso.</p>
                    <p class="h5">Gulini.Dev</p>
                    <p class="txt">Desenvolvendo freelancers sempre que possível paralelo aos trabalhos existentes, usando HTML5, CSS3, JavaScript, Bootstrap, Jquery, Wordpress, Git, MySQL, PHP, Java, Angular, Spring. Inicialmente meu foco era mais em trabalhos fixos em tempo integral, inicialmente presencial depois de um tempo híbrido e então apenas remoto, para empresas e sempre que o tempo permitia eu pegava alguns freelas, porém agora meu foco total é na minha empresa, Gulini.Dev, atualmente projetos freelancers, tanto desenvolvimento de software ou web, todos os trabalhos feitos com responsividade e SEO incluso se necessário.</p>
                  </div>
                </div>
                <div class="resumeInt" id="r4">
                  <div class="img">
                    <img src="assets/images/ideias.webp" alt="icon"/>
                  </div>
                  <div class="text">
                    <p class="h6">2022 - 2024</p>
                    <p class="h2">Desenvolvedor de Software</p>
                    <p class="h5">INHD Sistemas</p>
                    <p class="txt">Na INHD atuei no front-end da empresa, embora algumas vezes tenha ajudado no back-end meu foco na empresa sempre foi o front-end, trabalhei via contrato PJ inicialmente de maneira híbrida porém após um tempo apenas remoto. Durante o período em que trabalhei lá as principais tecnologias usadas eram Angular, JavaScript, TypeScript, GitHub, e algumas vezes Java e PostgreSQL.</p>
                  </div>
                </div>
                <div class="resumeInt" id="r5">
                  <div class="img">
                    <img src="assets/images/ideias.webp" alt="icon"/>
                  </div>
                  <div class="text">
                    <p class="h6">2021 - 2022</p>
                    <p class="h2">Desenvolvedor Web/Mobile Front-end</p>
                    <p class="h5">Engenharia Digital</p>
                    <p class="txt">Trabalhei na Engenharia Digital durante um período de 8 meses, a empresa em questão pegava diversos projetos web na região de pato branco, foi usado nos projetos muita responsividade, SEO, HTML5, CSS3, Bootstrap, Jquery, JavaScript, PHP.</p>
                  </div>
                </div>
              </div>
              <div id="experienceInt2">
                <div class="resumeInt" id="r6">
                  <div class="img">
                    <img src="assets/images/ideias.webp" alt="icon"/>
                  </div>
                  <div class="text">
                    <p class="h6">2020 - 2022</p>
                    <p class="h2">Desenvolvedor Web/Mobile Front-end</p>
                    <p class="h5">EYHE - Suporte Emocional</p>
                    <p class="txt">O Eyhe foi o primeiro trabalho em tempo integral como desenvolvedor que consegui oficialmente, atuei principalmente no front-end da empresa desenvolvendo layouts da plataforma ao refazer a nova versão, landing pages, portfólios usando: HTML5, CSS3, JavaScript, Jquery, Bootstrap e PHP.</p>
                  </div>
                </div>
              </div>
            </div>
            <div id="education">
              <p class="h2 title">Educação</p>
              <div class="resumeInt">
                <div class="img">
                  <img src="assets/images/ideias.webp" alt="icon"/>
                </div>
                <div class="text">
                  <p class="h6">2019 - Presente</p>
                  <p class="h2">B7Web</p>
                  <p class="h5">Cursos Profissionalizantes tanto no front-end como no back-end.</p>
                </div>
              </div>
              <div class="resumeInt">
                <div class="img">
                  <img src="assets/images/ideias.webp" alt="icon"/>
                </div>
                <div class="text">
                  <p class="h6">2022 - Presente</p>
                  <p class="h2">Loiane Training</p>
                  <p class="h5">Cursos de desenvolvimento de Angular, Java e Spring</p>
                </div>
              </div>
              <div class="resumeInt">
                <div class="img">
                  <img src="assets/images/ideias.webp" alt="icon"/>
                </div>
                <div class="text">
                  <p class="h6 blue">2019 - 2020</p>
                  <p class="h2">Análise e Desenvolvimento de Sistemas (trancado atualmente)</p>
                  <p class="h5">Faculdade Unipar</p>
                </div>
              </div>
            </div>
            <div id="skills">
              <div class="title">
                <p class="h2 title">Habilidades</p>
              </div>
              <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 d-flex flex-column align-items-center justify-content-center card">
                  <p class="h4">JavaScript</p>
                  <div class="control"><div class="progresso">100%</div></div>
                  <div class="d-flex justify-content-around align-items-center">
                    <div class="txt d-flex align-items-center justify-content-center v28">
                      <p class="h3">20%</p>
                      <small>Semana Passada</small>
                    </div>
                    <div class="txt d-flex align-items-center justify-content-center v25">
                      <p class="h3">25%</p>
                      <small>Mês Passado</small>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 d-flex flex-column align-items-center justify-content-center card">
                  <p class="h4">Angular</p>
                  <div class="control"><div class="progresso">100%</div></div>
                  <div class="d-flex justify-content-around align-items-center">
                    <div class="txt d-flex align-items-center justify-content-center v28">
                      <p class="h3">60%</p>
                      <small>Semana Passada</small>
                    </div>
                    <div class="txt d-flex align-items-center justify-content-center v25">
                      <p class="h3">50%</p>
                      <small>Mês Passado</small>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 d-flex flex-column align-items-center justify-content-center card">
                  <p class="h4">TypeScript</p>
                  <div class="control"><div class="progresso">100%</div></div>
                  <div class="d-flex justify-content-around align-items-center">
                    <div class="txt d-flex align-items-center justify-content-center v28">
                      <p class="h3">20%</p>
                      <small>Semana Passada</small>
                    </div>
                    <div class="txt d-flex align-items-center justify-content-center v25">
                      <p class="h3">25%</p>
                      <small>Mês Passado</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row flex-column" id="pb">
                <div class="pb">
                  <p class="h5">JavaScript</p>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="pb">
                  <p class="h5">Angular</p>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="pb">
                  <p class="h5">TypeScript</p>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
    <?php require "./assets/include/btn-whats.php"; ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>