(function () {
  var header = document.querySelector('.site-header');

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

  window.addEventListener('scroll', updateHeaderState, { passive: true });
  updateHeaderState();
})();
