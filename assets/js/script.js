(function () {
  var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var header = document.querySelector('.site-header');
  var navLinks = Array.prototype.slice.call(document.querySelectorAll('.site-header .nav-link'));
  var rotatingText = document.querySelector('.txt-rotate');
  var words = ['sites.', 'landing pages.', 'sistemas web.'];

  function sleep(ms) {
    return new Promise(function (resolve) {
      window.setTimeout(resolve, ms);
    });
  }

  async function typeWord(word) {
    if (!rotatingText) {
      return;
    }

    rotatingText.textContent = '';
    for (var i = 0; i < word.length; i += 1) {
      rotatingText.textContent += word[i];
      await sleep(110);
    }
    await sleep(1150);
  }

  async function deleteWord(word) {
    if (!rotatingText) {
      return;
    }

    for (var i = word.length; i >= 0; i -= 1) {
      rotatingText.textContent = word.substring(0, i);
      await sleep(60);
    }
    await sleep(240);
  }

  async function startTypewriter() {
    if (!rotatingText) {
      return;
    }

    while (true) {
      for (var i = 0; i < words.length; i += 1) {
        await typeWord(words[i]);
        await deleteWord(words[i]);
      }
    }
  }

  function updateHeaderState() {
    if (!header) {
      return;
    }

    if (window.scrollY >= 200) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  }

  function closeMobileMenu() {
    var menu = document.getElementById('navbarNav');
    if (!menu || !menu.classList.contains('show')) {
      return;
    }

    if (window.jQuery && typeof window.jQuery(menu).collapse === 'function') {
      window.jQuery(menu).collapse('hide');
    }
  }

  function updateActiveLink(sectionId) {
    navLinks.forEach(function (link) {
      if (!link.hasAttribute('data-section')) {
        return;
      }

      if (link.getAttribute('data-section') === sectionId) {
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  }

  function revealVisibleElements() {
    var elements = Array.prototype.slice.call(document.querySelectorAll('.service-card, .skill-card, .feature-item, .project-card, .process-step, .about-layout, .faq-list, .contact-panel'));

    if (prefersReducedMotion) {
      elements.forEach(function (element) {
        element.classList.add('fadeInUpNow');
      });
      return;
    }

    var viewportBottom = window.scrollY + window.innerHeight;

    elements.forEach(function (element) {
      if (element.classList.contains('fadeInUpNow')) {
        return;
      }

      if (element.getBoundingClientRect().top + window.scrollY < viewportBottom - 80) {
        element.classList.add('fadeInUpNow');
      }
    });
  }

  function observeSections() {
    if (!document.body.classList.contains('home-page') || !('IntersectionObserver' in window)) {
      return;
    }

    var sections = Array.prototype.slice.call(document.querySelectorAll('section[id]'));
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          updateActiveLink(entry.target.id);
        }
      });
    }, {
      rootMargin: '-35% 0px -55% 0px',
      threshold: 0
    });

    sections.forEach(function (section) {
      observer.observe(section);
    });
  }

  navLinks.forEach(function (link) {
    link.addEventListener('click', closeMobileMenu);
  });

  window.addEventListener('scroll', function () {
    updateHeaderState();
    revealVisibleElements();
  }, { passive: true });

  updateHeaderState();
  revealVisibleElements();
  observeSections();
  if (!prefersReducedMotion) {
    startTypewriter();
  } else if (rotatingText) {
    rotatingText.textContent = words[0];
  }
})();
