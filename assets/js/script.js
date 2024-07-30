const comp = ['Angular.', 'JavaScript.', 'PHP.'];
const rotate = document.querySelector('.txt-rotate');

const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms));

const typeWriter = async (text) => {
  console.log(text);
  for (let i = 0; i < text.length; i++) {
    rotate.innerHTML += text[i];
    console.log(rotate);
    console.log(text);
    await sleep(400);
  }
  await sleep(1000); // Espera um tempo antes de começar a apagar
};

const deleteWriter = async (text) => {
  console.log(text);
  for (let i = text.length; i >= 0; i--) {
    rotate.innerHTML = text.substring(0, i);
    console.log(rotate);
    console.log(text);
    await sleep(300);
  }
  await sleep(1000); // Espera um tempo antes de começar a apagar a próxima palavra
};

const startLoop = async () => {
  while (true) {
    for (let i = 0; i < comp.length; i++) {
      console.log(comp[i]);
      await typeWriter(comp[i]);
      await deleteWriter(comp[i]);
    }
  }
};
// Inicia o loop ao carregar a pagina
startLoop();

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

// btn whats mobile/desktop

let mobileCheck = () => {
  let check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
let btnWhatsapp = document.getElementById('btnWhats');
let msgEncode;
let urlApi = 'https://api.whatsapp.com/send';
let urlWhatsEnd = '&amp;text=Gostaria+de+saber+mais+sobre+seu+trabalho';
let msg = `Gostaria de saber mais sobre seu trabalho`;
let celular = '5546991168949';

msgEncode = window.encodeURIComponent(msg);
if(mobileCheck()){
  urlApi = "https://api.whatsapp.com/send";
}
//href="https://api.whatsapp.com/send?phone=5546991168949&amp;text=Gostaria+de+saber+mais+sobre+seu+trabalho"
btnWhatsapp.addEventListener('click', () => {
  console.log(urlApi + "?phone=" + celular + "&text=" + msgEncode);
  window.open(urlApi + "?phone=" + celular + "&text=" + msgEncode);
});