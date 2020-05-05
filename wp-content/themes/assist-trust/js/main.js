document.addEventListener('DOMContentLoaded', function() {
  // invert aria-expanded state for toggle buttons on click
  Array.prototype.forEach.call(document.querySelectorAll('[aria-expanded]'), function(button) {
    button.addEventListener('click', function() {
      var expanded = button.getAttribute('aria-expanded') === 'true';
      var nav = button.nextElementSibling;

      button.setAttribute('aria-expanded', !expanded);
      nav.hidden = expanded;
    });
  });

  // preserve main menu state between viewport changes and ensure elements which are
  // not applicable at the current viewport are marked as [hidden]
  function updateMainMenu(mq) {
    var nav = document.getElementById('menu-main').closest('nav');
    var navToggle = nav.previousElementSibling;

    if (mq.matches) {
      // >= 576px
      // there is no nav toggle on larger viewports and the menu is always visible
      nav.hidden = false;
    } else {
      // < 576px
      // reset the expanded state of menu for smaller viewports
      var expanded = navToggle.getAttribute('aria-expanded') === 'true';
      nav.hidden = !expanded;
    }

    navToggle.hidden = mq.matches;
  }

  const mq = window.matchMedia('(min-width: 576px)');
  mq.addListener(updateMainMenu);
  updateMainMenu(mq);
});

document.addEventListener('click', function(e) {
  var header = document.querySelector('.header');
  var menu = document.getElementById('menu-main');
  var menuToggle = document.querySelector('.button--menu-toggle');

  // close the main menu when the user clicks outside
  if (!menu.contains(e.target) && !menuToggle.contains(e.target)) {
    var expanded = menu.querySelectorAll('[aria-expanded="true"]');

    Array.prototype.forEach.call(expanded, function(item) {
      item.setAttribute('aria-expanded', false);
    });

    menuToggle.setAttribute('aria-expanded', false);
  }
});