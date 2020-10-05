import objectFit from './object-fit-shim';

document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.slider');

  if (!slider) {
    return;
  }

  const images = slider.querySelectorAll('img');

  if (images.length <= 1) {
    return;
  }

  const slides = slider.querySelectorAll('li');
  const previous = document.getElementById('previous');
  const next = document.getElementById('next');
  const navItems = slider.closest('.slider--wrapper').querySelectorAll('.slider--nav li');

  const ACTIVE_NAV_CLASS = 'active';

  let activeIndex = 0;

  // apply CSS object-fit equivalent for IE + Edge
  Array.prototype.forEach.call(images, objectFit);

  const update = () => {
    const scrollPos = activeIndex * (slider.scrollWidth / slides.length);

    // scroll to active slide
    slider.scrollLeft = scrollPos;

    // mark active slide on slider nav
    Array.prototype.forEach.call(navItems, (item, index) => {
      if (index === activeIndex) {
        item.classList.add(ACTIVE_NAV_CLASS);
      } else {
        item.classList.remove(ACTIVE_NAV_CLASS);
      }
    });
  }

  previous.addEventListener('click', () => {
    activeIndex--;
    
    if (activeIndex < 0) {
      activeIndex = slides.length - 1;
    }

    update();
  });

  next.addEventListener('click', () => {
    activeIndex++;

    if (activeIndex >= slides.length) {
      activeIndex = 0;
    }

    update();
  });

  Array.prototype.forEach.call(navItems, (item, index) => {
    item.addEventListener('click', () => {
      activeIndex = index;
      update();
    });
  });
});