const wrap = (el, wrapper) => {
  el.parentNode.insertBefore(wrapper, el);
  wrapper.appendChild(el);
};

document.addEventListener('DOMContentLoaded', () => {
  const tables = document.querySelectorAll('table');
  const wrapper = document.createElement('div');

  wrapper.classList.add('table-overflow');

  tables.forEach(table => wrap(table, wrapper));
});