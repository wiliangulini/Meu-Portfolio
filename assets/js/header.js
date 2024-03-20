let a1 = document.querySelector('.a1');
let a2 = document.querySelector('.a2');
let a3 = document.querySelector('.a3');
let a4 = document.querySelector('.a4');
let header = document.querySelector('header');
let gulini = document.querySelector('a.navbar-brand');
let menu = document.querySelector('header .container .linha nav button svg');
let navbarNav = document.querySelector('#navbarNav');
let spanAll = document.querySelectorAll('a.nav-link span');
a1.classList.remove('active');
a2.classList.remove('active');
a3.classList.remove('active');
a4.classList.add('active');

$(window).on('scroll', function () {
  if (window.scrollY >= 200) {
    header.classList.add('fixed');
  } else {
    a1.classList.remove('active');
    a2.classList.remove('active');
    a3.classList.remove('active');
    a4.classList.add('active');
    header.classList.remove('fixed');
  }

  if(screen.width <= 1024) {
    if(window.scrollY >= 200) {
      gulini.style.color = '#000';
      menu.style.fill = '#000';
      navbarNav.style.backgroundColor = '#fff';
      spanAll.forEach((index) => {
        index.style.color = '#000';
      });  
    } else {
      gulini.style.color = '#fff';
      menu.style.fill = '#fff';
      navbarNav.style.backgroundColor = '#000';
      spanAll.forEach((index) => {
        index.style.color = '#fff';
      });
    }
  }
});