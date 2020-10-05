// https://gomakethings.com/how-to-get-all-of-an-elements-siblings-with-vanilla-js
const getSiblings = node => {
	var siblings = [];
	var sibling = node.parentNode.firstChild;

	while (sibling) {
		if (sibling.nodeType === 1 && sibling !== node) {
			siblings.push(sibling);
		}

		sibling = sibling.nextSibling;
	}

	return siblings;
};

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
      // reset the expanded state for smaller viewports
      const expanded = navToggle.getAttribute('aria-expanded') === 'true';
      nav.hidden = !expanded;
    }

    navToggle.hidden = mq.matches;
  }

  const mq = window.matchMedia('(min-width: 576px)');

  // update main menu on viewport change
  mq.addListener(updateMainMenu);

  updateMainMenu(mq);

  // collapse top level menus on large viewports when moving focus to
  // ensure that a previously expanded menu doesn't appear behind another
  // 
  // this way only one top level menu item can be active at a time
  const menuLinks = document.querySelectorAll('.menu-link__1');
  const events = ['click', 'mouseover'];

  const collapseTopLevelLinks = e => {
    // ignore mobile viewport
    if (!mq.matches) {
      return;
    }

    const siblings = getSiblings(e.target.parentNode);

    siblings.forEach(sibling => {
      const link = sibling.querySelector('.menu-link__1');
      
      if (link) {
        link.setAttribute('aria-expanded', false);
      }
    });
  };

  events.forEach(event => {
    Array.prototype.forEach.call(menuLinks, link => {
      link.addEventListener(event, collapseTopLevelLinks);
    });
  });

  // detect HTMLDetailsElement support and add classname where a fallback is needed
  if (typeof HTMLDetailsElement !== 'undefined') {
    document.body.classList.add('supports-details-el');
  }
});

// close the main menu when the user clicks outside
document.addEventListener('click', e => {
  const menu = document.getElementById('menu-main');
  const menuToggle = document.querySelector('.button--menu-toggle');

  if (!menu.contains(e.target) && !menuToggle.contains(e.target)) {
    const expanded = menu.querySelectorAll('[aria-expanded="true"]');

    Array.prototype.forEach.call(expanded, item => {
      item.setAttribute('aria-expanded', false);
    });

    menuToggle.setAttribute('aria-expanded', false);
  }
});