(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Scroll reveal
  var items = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && !reduce) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    items.forEach(function (el) { io.observe(el); });
  } else {
    items.forEach(function (el) { el.classList.add('in'); });
  }

  // Navbar shadow after scrolling
  var nav = document.getElementById('siteNav');
  function onScroll() { nav.classList.toggle('scrolled', window.scrollY > 8); }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // Solid nav background while the mobile menu is open
  var menuEl = document.getElementById('navMenu');
  if (menuEl) {
    menuEl.addEventListener('show.bs.collapse', function () { nav.classList.add('menu-open'); });
    menuEl.addEventListener('hidden.bs.collapse', function () { nav.classList.remove('menu-open'); });
  }

  // 3D tilt on cards (mouse only)
  if (!reduce && window.matchMedia('(hover: hover)').matches) {
    document.querySelectorAll('[data-tilt]').forEach(function (card) {
      card.addEventListener('mousemove', function (ev) {
        var r = card.getBoundingClientRect();
        var px = (ev.clientX - r.left) / r.width - 0.5;
        var py = (ev.clientY - r.top) / r.height - 0.5;
        card.style.setProperty('--ry', (px * 12).toFixed(2) + 'deg');
        card.style.setProperty('--rx', (-py * 12).toFixed(2) + 'deg');
        card.classList.add('is-tilting');
      });
      card.addEventListener('mouseleave', function () {
        card.style.setProperty('--ry', '0deg');
        card.style.setProperty('--rx', '0deg');
        card.classList.remove('is-tilting');
      });
    });
  }

  // Close the mobile menu after choosing a link
  document.querySelectorAll('#navMenu .nav-link, #navMenu .btn').forEach(function (link) {
    link.addEventListener('click', function () {
      var menu = document.getElementById('navMenu');
      if (menu.classList.contains('show') && window.bootstrap) {
        window.bootstrap.Collapse.getOrCreateInstance(menu).hide();
      }
    });
  });

  // Stop double submits
  var form = document.querySelector('.contact-form');
  if (form) {
    form.addEventListener('submit', function (ev) {
      if (!form.checkValidity()) {
        ev.preventDefault();
        form.classList.add('was-validated');
        return;
      }
      var btn = form.querySelector('button[type="submit"]');
      btn.disabled = true;
      btn.textContent = 'Sending...';
    });
  }
})();
