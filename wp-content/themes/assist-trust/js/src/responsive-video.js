document.addEventListener('DOMContentLoaded', () => {
  // wrap iframe elements with div.iframe-responsive
  document.querySelectorAll('iframe[data-src^="https://www.youtube.com"]').forEach(el => {
    let wrapper = document.createElement('div');

    el.parentNode.insertBefore(wrapper, el);

    wrapper.classList.add('iframe-responsive');
    wrapper.appendChild(el);
  });
});
