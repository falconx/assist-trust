// object-fit shim
function objectFit(image) {
  if ('objectFit' in document.documentElement.style === false && image.currentStyle['object-fit']) {
    image.style.background = 'url("' + image.src + '") no-repeat 50%/' + image.currentStyle['object-fit'];
    image.src = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='" + image.width + "' height='" + image.height + "'%3E%3C/svg%3E";
  }
}

document.addEventListener('DOMContentLoaded', function() {
  var galleries = document.querySelector('.galleries');

  if (!galleries) {
    return;
  }

  var images = galleries.querySelectorAll('img');

  // apply CSS object-fit equivalent for IE + Edge
  Array.prototype.forEach.call(images, objectFit);

  var SimpleLightbox = window.SimpleLightbox;

  document.querySelectorAll('.gallery').forEach(function(gallery) {
    new SimpleLightbox({
      elements: gallery.querySelectorAll('a')
    });

    // lightbox.show();
  });
});