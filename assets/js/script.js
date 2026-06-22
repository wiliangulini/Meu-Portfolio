(function () {
  var motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
  var prefersReducedMotion = motionQuery.matches;
  var header = document.querySelector('.site-header');
  var navLinks = Array.prototype.slice.call(document.querySelectorAll('.site-header .nav-link'));
  var rotatingText = document.querySelector('.txt-rotate');
  var words = ['Sites.', 'Landing Pages.', 'Sistemas Web.'];

  var REVEAL_SELECTORS = '.service-card, .skill-card, .feature-item, .project-card, .process-step, .about-layout, .faq-list, .contact-panel';
  var UTM_KEYS = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term'];

  function storeUtms() {
    if (typeof window.URLSearchParams !== 'function') {
      return;
    }

    var search = new URLSearchParams(window.location.search);
    var utms = {};

    UTM_KEYS.forEach(function (key) {
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

  function setupTracking() {
    storeUtms();

    document.addEventListener('click', function (event) {
      if (!event.target || typeof event.target.closest !== 'function') {
        return;
      }

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
  }

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

  function revealAll() {
    var elements = Array.prototype.slice.call(document.querySelectorAll(REVEAL_SELECTORS));
    elements.forEach(function (element) {
      element.classList.add('fadeInUpNow');
    });
  }

  function setupRevealObserver() {
    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
      revealAll();
      return;
    }

    var observer = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('fadeInUpNow');
          obs.unobserve(entry.target);
        }
      });
    }, {
      rootMargin: '0px 0px -80px 0px',
      threshold: 0
    });

    var elements = Array.prototype.slice.call(document.querySelectorAll(REVEAL_SELECTORS));
    elements.forEach(function (element) {
      if (!element.classList.contains('fadeInUpNow')) {
        observer.observe(element);
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

  window.addEventListener('scroll', updateHeaderState, { passive: true });

  motionQuery.addEventListener('change', function (e) {
    prefersReducedMotion = e.matches;
    if (prefersReducedMotion) {
      if (rotatingText) {
        rotatingText.textContent = words[0];
      }
      revealAll();
    }
  });

  setupTracking();
  updateHeaderState();
  setupRevealObserver();
  observeSections();
  if (!prefersReducedMotion) {
    startTypewriter();
  } else if (rotatingText) {
    rotatingText.textContent = words[0];
  }
})();
