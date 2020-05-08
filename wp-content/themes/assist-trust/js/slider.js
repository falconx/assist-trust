document.addEventListener('DOMContentLoaded', function() {
  var slider = document.querySelector('.slider');

  if (!slider) {
    return;
  }

  var slides = slider.querySelectorAll('li');
  var previous = document.getElementById('previous');
  var next = document.getElementById('next');
  var navItems = slider.closest('.slider--wrapper').querySelectorAll('.slider--nav li');

  var ACTIVE_NAV_CLASS = 'active';

  var activeIndex = 0;

  function update() {
    var scrollPos = activeIndex * (slider.scrollWidth / slides.length);

    // scroll to active slide
    slider.scrollLeft = scrollPos;

    // mark active slide on slider nav
    Array.prototype.forEach.call(navItems, function(item, index) {
      if (index === activeIndex) {
        item.classList.add(ACTIVE_NAV_CLASS);
      } else {
        item.classList.remove(ACTIVE_NAV_CLASS);
      }
    });
  }

  previous.addEventListener('click', function() {
    activeIndex--;
    
    if (activeIndex < 0) {
      activeIndex = slides.length - 1;
    }

    update();
  });

  next.addEventListener('click', function() {
    activeIndex++;

    if (activeIndex >= slides.length) {
      activeIndex = 0;
    }

    update();
  });

  Array.prototype.forEach.call(navItems, function(item, index) {
    item.addEventListener('click', function() {
      activeIndex = index;
      update();
    });
  });
});