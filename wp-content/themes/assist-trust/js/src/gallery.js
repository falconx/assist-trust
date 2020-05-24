import SimpleLightbox from 'simplelightbox/dist/simple-lightbox.modules';

import objectFit from './object-fit-shim';

document.addEventListener('DOMContentLoaded', () => {
  var galleries = document.querySelector('.galleries');

  if (!galleries) {
    return;
  }

  var images = galleries.querySelectorAll('img');

  // apply CSS object-fit equivalent for IE + Edge
  Array.prototype.forEach.call(images, objectFit);

  new SimpleLightbox('.gallery a', {});
});