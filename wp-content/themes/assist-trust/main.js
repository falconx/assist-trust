document.addEventListener('DOMContentLoaded', function() {
  // invert aria-expanded state for toggle buttons on click
  document.querySelectorAll('[aria-expanded]').forEach(function(button) {
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