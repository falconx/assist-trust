document.addEventListener('DOMContentLoaded', function() {
  var slider = document.querySelector('.slider');
  var slides = slider.querySelectorAll('li');
  var previous = document.getElementById('previous');
  var next = document.getElementById('next');
  var navItems = slider.closest('.slider--wrapper').querySelectorAll('.slider--nav li');

  var activeIndex = 0;

  function update() {
    var scrollPos = activeIndex * (slider.scrollWidth / slides.length);
    slider.scrollLeft = scrollPos;
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

  navItems.forEach(function(item, index) {
    item.addEventListener('click', function() {
      activeIndex = index;
      update();
    });
  });
});