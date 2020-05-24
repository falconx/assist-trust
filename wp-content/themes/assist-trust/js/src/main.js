document.addEventListener('DOMContentLoaded', () => {
  // invert aria-expanded state for toggle buttons on click
  Array.prototype.forEach.call(document.querySelectorAll('[aria-expanded]'), button => {
    button.addEventListener('click', () => {
      const expanded = button.getAttribute('aria-expanded') === 'true';
      const nav = button.nextElementSibling;

      button.setAttribute('aria-expanded', !expanded);
      nav.hidden = expanded;
    });
  });

  // preserve main menu state between viewport changes and ensure elements which are
  // not applicable at the current viewport are marked as [hidden]
  const updateMainMenu = mq => {
    const nav = document.getElementById('menu-main').closest('nav');
    const navToggle = nav.previousElementSibling;

    if (mq.matches) {
      // >= 576px
      // there is no nav toggle on larger viewports and the menu is always visible
      nav.hidden = false;
    } else {
      // < 576px
      // reset the expanded state of menu for smaller viewports
      const expanded = navToggle.getAttribute('aria-expanded') === 'true';
      nav.hidden = !expanded;
    }

    navToggle.hidden = mq.matches;
  }

  const mq = window.matchMedia('(min-width: 576px)');
  mq.addListener(updateMainMenu);
  updateMainMenu(mq);

  if (typeof HTMLDetailsElement !== 'undefined') {
    document.body.classList.add('supports-details-el');
  }
});

document.addEventListener('click', e => {
  const menu = document.getElementById('menu-main');
  const menuToggle = document.querySelector('.button--menu-toggle');

  // close the main menu when the user clicks outside
  if (!menu.contains(e.target) && !menuToggle.contains(e.target)) {
    const expanded = menu.querySelectorAll('[aria-expanded="true"]');

    Array.prototype.forEach.call(expanded, function(item) {
      item.setAttribute('aria-expanded', false);
    });

    menuToggle.setAttribute('aria-expanded', false);
  }
});