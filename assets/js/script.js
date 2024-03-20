let comp = ['Angular.','JavaScript.','PHP.'];
let rotate = document.querySelector('.txt-rotate');
let array = comp[0].split('');
let array1 = comp[1].split('');
let array2 = comp[2].split('');

let typeWriter = () => {
  rotate.innerHTML = '';
  array.forEach((letra, i) => {
    setTimeout(() => {
      rotate.innerHTML += letra
      if(rotate.innerHTML == 'Angular.') {

        setTimeout(() => {
          let newArray = Object.values(array);
          let interval = setInterval(() => {
            newArray.pop();
            rotate.innerHTML = newArray.join('');
          }, 300);
    
          setTimeout(() => {
            clearInterval(interval);
            setTimeout(() => {
              a1();
            }, 1000);
          }, 425 * i)

        }, 1000);

      }
    }, 400 * i)

  });

  let a1 = () => {

    array1.forEach((letra, i) => {
      setTimeout(() => {
        rotate.innerHTML += letra
        if(rotate.innerHTML == 'JavaScript.') {

          setTimeout(() => {
            let newArray = Object.values(array1);
            let interval = setInterval(() => {
              newArray.pop();
              rotate.innerHTML = newArray.join('');
            }, 300);
      
            setTimeout(() => {
              clearInterval(interval);
              setTimeout(() => {
                a2();
              }, 1000);
            }, 425 * i)
          }, 1000);
        }
      }, 400 * i)
  
    });
  }
    
  let a2 = () => {

    array2.forEach((letra, i) => {
      setTimeout(() => {
        rotate.innerHTML += letra
        if(rotate.innerHTML == 'PHP.') {

          setTimeout(() => {
            let newArray = Object.values(array2);
            let interval = setInterval(() => {
              newArray.pop();
              rotate.innerHTML = newArray.join('');
            }, 300);
      
            setTimeout(() => {
              clearInterval(interval);
              setTimeout(() => {
                typeWriter();
              }, 1000)
            }, 330 * i)
          }, 1000);
        }
      }, 400 * i)
    })

  }

}

let education = document.querySelector("ul li.education");
let experience = document.querySelector("ul li.experience");
let skills = document.querySelector('ul li.skills');
let animate = document.getElementById('animate');
let animate1 = document.getElementById('animate1');
let res = document.getElementById('res');
let header = document.querySelector('header');
let a1 = document.querySelector('.a1');
let a2 = document.querySelector('.a2');
let a3 = document.querySelector('.a3');
let a4 = document.querySelector('.a4');
let spanHome = document.querySelector('.spanHome');
let spanAbout = document.querySelector('.spanAbout');
let spanResume = document.querySelector('.spanResume');
let svg = document.querySelector('.svg');
let menu = document.querySelector('header .container .linha nav button svg');
let body = document.querySelector('body');
let gulini = document.querySelector('a.navbar-brand');
let spanAll = document.querySelectorAll('a.nav-link span');
let navbarNav = document.querySelector('#navbarNav');
let esperiencia = document.querySelector('li.experience a');
let educ = document.querySelector('li.education a');
let ski = document.querySelector('li.skills a');

let edActive = () => {
  education.classList.add("active");
  experience.classList.remove("active");
  skills.classList.remove("active");
}
let exActive = () => {
  experience.classList.add("active");
  education.classList.remove("active");
  skills.classList.remove("active");
}
let skActive = () => {
  skills.classList.add("active");
  experience.classList.remove("active");
  education.classList.remove("active");
}


if(screen.width > 768) {

  education.addEventListener("click", () => {
    edActive();
  })
  experience.addEventListener("click", () => {
    exActive();
  })
  skills.addEventListener("click", () => {
    skActive();
  })
  
}

// Seleciona o elemento que contém os contadores
let e = $('#education');
let el = $('#skills');
let ele = $('#experienceInt');
let h2 = $('#home');
let elm = $('#animate');
let elemento = $('#animate1');
let element1 = $('#pb');
let executed = false;

let isScrolledIntoView = (e) => {

    let docViewTop = $(window).scrollTop();
    let docViewBottom = docViewTop + $(window).height();
    let elemTop = $(e).offset().top;
    let elemBottom = elemTop + $(e).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

let scrollHeader = () => {
  if(body.offsetWidth >= 2075 && body.offsetWidth <= 2999) {
    console.log('screen2090')
    svg.classList.add('right');
  } else if(body.offsetWidth >= 3000 && body.offsetWidth <= 4000) {
    console.log('screen4000')
    svg.classList.add('right1');
  } else {
    svg.classList.remove('right');
  }
}

if(screen.width < 768) {

  a1.classList.remove('active');
  spanHome.classList.add('active');
  esperiencia.setAttribute('href', 'javascript:void(0);');
  educ.setAttribute('href', 'javascript:void(0);');
  ski.setAttribute('href', 'javascript:void(0);');
  esperiencia.style.cursor = 'initial';
  ski.style.cursor = 'initial';
  educ.style.cursor = 'initial';

} else if(screen.width >= 768 && screen.width <= 1024) {

  a1.classList.remove('active');
  spanHome.classList.add('active');

}

a4?.addEventListener('click', () => {
  a1.classList.remove('active');
  a2.classList.remove('active');
  a3.classList.remove('active');
  a4.classList.add('active');
});

let sWidth = () => {
  if(screen.width > 768) {
    a1.classList.remove('active');
    a2.classList.remove('active');
    a3.classList.add('active');
  } else if(screen.width <= 768) {
    spanHome.classList.remove('active');
    spanAbout.classList.remove('active');
    spanResume.classList.add('active');
  }
}

$(window).on('scroll', function() {
  if(isScrolledIntoView(e)) {
    if(!executed) {
        $(() => {
          edActive();
          sWidth();
        });  
    }         
  } 
  
  if(isScrolledIntoView(ele)) {
    if(!executed) {
        $(() => {
          console.log('Scrolled')
          exActive();
          sWidth();
        });  
    }         
  } 
  if(isScrolledIntoView(el)) {
    if(!executed) {
        $(() => {
          skActive();
        });  
    }         
  }
  if(isScrolledIntoView(elm)) {
    if(!executed) {
      $(() => {
        animate.classList.add('fadeInUpNow');
        if(screen.width > 768) {
          a1.classList.remove('active');
          a3.classList.remove('active');
          a2.classList.add('active');
        } else if(screen.width <= 768) {
          spanHome.classList.remove('active');
          spanAbout.classList.add('active');
          spanResume.classList.remove('active');
        }
        
      })
    }
  }
  if(isScrolledIntoView(elemento)) {
    if(!executed) {
      $(() => {
        animate1.classList.add('fadeInUpNow');
      })
    }
  }
  document.querySelectorAll('.resumeInt').forEach((e) => {
    
    if(isScrolledIntoView(e)) {
      if(!executed) {
        $(() => {
          e.classList.add('fadeInUpNow');
        })
      }
    }
  });
  if(isScrolledIntoView(element1)) {
    if(!executed) {
      $(() => {
        document.getElementById('pb').classList.add('fadeInUpNow');
      });
    }
  }
  if(isScrolledIntoView(h2)) {
    console.log(h2);
    if(!executed) {
      $(() => {
        if(screen.width > 768) {
          a1.classList.add('active');
          a2.classList.remove('active');
          a3.classList.remove('active');
        } else if(screen.width <= 768) {
          spanHome.classList.add('active');
          spanAbout.classList.remove('active');
          spanResume.classList.remove('active');
        }
      })
    }
  }

  if (window.scrollY >= 200) {
    header.classList.add('fixed');
  } else {
    a1.classList.add('active');
    a2.classList.remove('active');
    a3.classList.remove('active');
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

  if(screen.width >= 768 && screen.width <= 1024) {
    
    let isScrolledIntoView1 = (e) => {

      let docViewTop = $(window).scrollTop();
      let docViewBottom = docViewTop + $(window).height();
      let elemTop = $(e).offset().top;
      let elemBottom =  $(e).height();
  
      return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
    if(isScrolledIntoView1($('#experience'))) {
      if(!executed) {
          $(() => {
            console.log('Scrolled')
            exActive();
          });  
      }         
    } 

  }
}); 

scrollHeader();