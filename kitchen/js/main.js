/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
const menuBtn = document.querySelector('.header__burger');
const menu = document.querySelector('.header__menu');

const hideMenu = event => {
  $("body").css("overflow", "auto");
  menu.classList.remove('menu__active');
};

const close = event => !menu.contains(event.target) && hideMenu(event);

menuBtn.addEventListener('click', event => {
  event.stopPropagation();

  if (!menu.classList.contains('menu__active')) {
    $("body").css("overflow", "hidden");
    menu.classList.add('menu__active');
  } else {
    $("body").css("overflow", "auto");
    menu.classList.remove('menu__active');
  }
});
window.addEventListener('click', close);
/******/ })()
;
//# sourceMappingURL=main.js.map