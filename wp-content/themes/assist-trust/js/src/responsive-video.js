document.addEventListener('DOMContentLoaded', () => {
  // wrap iframe elements with div.iframe-responsive
  document.querySelectorAll('iframe').forEach(el => {
    let wrapper = document.createElement('div');

    el.parentNode.insertBefore(wrapper, el);

    wrapper.classList.add('iframe-responsive');
    wrapper.appendChild(el);
  });
});
