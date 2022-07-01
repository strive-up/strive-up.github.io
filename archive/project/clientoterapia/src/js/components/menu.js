const menuBtn = document.querySelector('.header__burger');
const menu = document.querySelector('.header__nav');
const overflowHidden = document.querySelector('body');

const hideMenu = (event) => {
  menu.classList.remove('menu__active');
  overflowHidden.classList.remove('overflowhidden');
}

const close = (event) => !menu.contains(event.target) && hideMenu(event);

menuBtn.addEventListener('click', (event) => {
  event.stopPropagation();
  menu.classList.toggle('menu__active');
  overflowHidden.classList.toggle('overflowhidden');
});

window.addEventListener('click', close);