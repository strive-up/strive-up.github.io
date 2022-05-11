/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/_components.js":
/*!*******************************!*\
  !*** ./src/js/_components.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_menu_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/menu.js */ "./src/js/components/menu.js");
/* harmony import */ var _components_menu_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_components_menu_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_services_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/services.js */ "./src/js/components/services.js");
/* harmony import */ var _components_services_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_components_services_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _components_svg_fill_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/svg-fill.js */ "./src/js/components/svg-fill.js");
/* harmony import */ var _components_svg_fill_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_components_svg_fill_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _components_portfolio_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/portfolio.js */ "./src/js/components/portfolio.js");
/* harmony import */ var _components_portfolio_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_components_portfolio_js__WEBPACK_IMPORTED_MODULE_3__);





/***/ }),

/***/ "./src/js/components/menu.js":
/*!***********************************!*\
  !*** ./src/js/components/menu.js ***!
  \***********************************/
/***/ (() => {

var menuBtn = document.querySelector('.header__burger');
var menu = document.querySelector('.header__nav');
menuBtn.addEventListener('click', function () {
  menu.classList.toggle('menu__active');
});

/***/ }),

/***/ "./src/js/components/portfolio.js":
/*!****************************************!*\
  !*** ./src/js/components/portfolio.js ***!
  \****************************************/
/***/ (() => {

var $st = $('.pagination');
var $slickEl = $('.center');
$slickEl.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
  var i = (currentSlide ? currentSlide : 0) + 1;
  $st.html(i + '<span><span class="slash">/</span>' + slick.slideCount + '</span>');
});
$('.slider').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  variableWidth: true,
  arrows: true,
  prevArrow: $('.slider__arrow--prev'),
  nextArrow: $('.slider__arrow--next'),
  dots: true,
  speed: "1000ms"
});

if (window.innerWidth < 990) {
  $('ul.slick-dots').appendTo('.portfolio__slider');
  $('.slider__item__info').appendTo('.portfolio__slider');
}

/***/ }),

/***/ "./src/js/components/services.js":
/*!***************************************!*\
  !*** ./src/js/components/services.js ***!
  \***************************************/
/***/ (() => {

$('.services__content').each(function () {
  var tabTabs = $(this).find('ul.tabs li');
  var tabItems = $(this).find('.tab_content').hide();
  $(".tab_container .tab_content.active").show();
  tabTabs.each(function (i) {
    $(this).click(function () {
      $(this).addClass('active').show();
      tabTabs.not(this).removeClass('active');
      $(tabItems[i]).addClass('active').show();
      tabItems.not(tabItems[i]).removeClass('active').hide();
    });
  });
});
$('.tab_content .button .btn__arrow__stroke').click(function () {
  var tabsContent = $(this).closest('.tab_content.active');
  var tabsToggler = $(this).closest('.tab_container').prev().find('li.active');
  var dir = $(this).text().trim() == 'Пред.' ? 'prev' : 'next';

  if (dir == 'prev') {
    if (tabsToggler.prev().length) {
      tabsToggler.prev().addClass('active').siblings().removeClass('active');
      tabsContent.prev().show().addClass('active').siblings().hide().removeClass('active');
    }
  } else {
    if (tabsToggler.next().length) {
      tabsToggler.next().addClass('active').siblings().removeClass('active');
      tabsContent.next().show().addClass('active').siblings().hide().removeClass('active');
    }
  }
});
$('.dev2__list__item .title').click(function (e) {
  e.preventDefault();
  var $this = $(this);

  if ($this.next().hasClass('active')) {
    $this.next().removeClass('active');
    $this.next().slideUp(350);
  } else {
    $this.parent().parent().find('.dev2__list__item p.text').removeClass('active');
    $this.parent().parent().find('.dev2__list__item p.text').slideUp(350);
    $this.next().toggleClass('active');
    $this.next().slideToggle(350);
  }
});

/***/ }),

/***/ "./src/js/components/svg-fill.js":
/*!***************************************!*\
  !*** ./src/js/components/svg-fill.js ***!
  \***************************************/
/***/ (() => {

$('img.img-svg').each(function () {
  var $img = $(this);
  var imgClass = $img.attr('class');
  var imgURL = $img.attr('src');
  $.get(imgURL, function (data) {
    var $svg = $(data).find('svg');

    if (typeof imgClass !== 'undefined') {
      $svg = $svg.attr('class', imgClass + ' replaced-svg');
    }

    $svg = $svg.removeAttr('xmlns:a');

    if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
      $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
    }

    $img.replaceWith($svg);
  }, 'xml');
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_components */ "./src/js/_components.js");

})();

/******/ })()
;
//# sourceMappingURL=main.js.map