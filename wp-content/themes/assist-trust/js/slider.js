// object-fit shim
function objectFit(image) {
  if ('objectFit' in document.documentElement.style === false && image.currentStyle['object-fit']) {
    image.style.background = 'url("' + image.src + '") no-repeat 50%/' + image.currentStyle['object-fit'];
    image.src = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='" + image.width + "' height='" + image.height + "'%3E%3C/svg%3E";
  }
}

document.addEventListener('DOMContentLoaded', function() {
  var slider = document.querySelector('.slider');

  if (!slider) {
    return;
  }

  var slides = slider.querySelectorAll('li');
  var previous = document.getElementById('previous');
  var next = document.getElementById('next');
  var navItems = slider.closest('.slider--wrapper').querySelectorAll('.slider--nav li');
  var images = slider.querySelectorAll('img');

  var ACTIVE_NAV_CLASS = 'active';

  var activeIndex = 0;

  // apply CSS object-fit equivalent for IE + Edge
  Array.prototype.forEach.call(images, objectFit);

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