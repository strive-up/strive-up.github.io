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
/* harmony import */ var _components_modal_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./components/modal.js */ "./src/js/components/modal.js");
/* harmony import */ var _components_modal_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_components_modal_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _components_quiz_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./components/quiz.js */ "./src/js/components/quiz.js");
/* harmony import */ var _components_quiz_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_components_quiz_js__WEBPACK_IMPORTED_MODULE_5__);







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

/***/ "./src/js/components/modal.js":
/*!************************************!*\
  !*** ./src/js/components/modal.js ***!
  \************************************/
/***/ (() => {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var Modal = /*#__PURE__*/function () {
  function Modal(options) {
    _classCallCheck(this, Modal);

    var defaultOptions = {
      isOpen: function isOpen() {},
      isClose: function isClose() {}
    };
    this.options = Object.assign(defaultOptions, options);
    this.modal = document.querySelector('.modal');
    this.speed = false;
    this.animation = false;
    this.isOpen = false;
    this.modalContainer = false;
    this.previousActiveElement = false;
    this.fixBlocks = document.querySelectorAll('.fix-block');
    this.focusElements = ['a[href]', 'input', 'button', 'select', 'textarea', '[tabindex]'];
    this.events();
  }

  _createClass(Modal, [{
    key: "events",
    value: function events() {
      if (this.modal) {
        document.addEventListener('click', function (e) {
          var clickedElement = e.target.closest('[data-path]');

          if (clickedElement) {
            var target = clickedElement.dataset.path;
            var animation = clickedElement.dataset.animation;
            var speed = clickedElement.dataset.speed;
            this.animation = animation ? animation : 'fade';
            this.speed = speed ? parseInt(speed) : 300;
            this.modalContainer = document.querySelector("[data-target=\"".concat(target, "\"]"));
            this.open();
            return;
          }

          if (e.target.closest('.modal__close')) {
            this.close();
            return;
          }
        }.bind(this));
        window.addEventListener('keydown', function (e) {
          if (e.keyCode == 27) {
            if (this.isOpen) {
              this.close();
            }
          }

          if (e.keyCode == 9 && this.isOpen) {
            this.focusCatch(e);
            return;
          }
        }.bind(this));
        this.modal.addEventListener('click', function (e) {
          if (!e.target.classList.contains('modal__wrapp') && !e.target.closest('.modal__wrapp') && this.isOpen) {
            this.close();
          }
        }.bind(this));
      }
    }
  }, {
    key: "open",
    value: function open() {
      var _this = this;

      this.previousActiveElement = document.activeElement;
      this.modal.style.setProperty('--transition-time', "".concat(this.speed / 1000, "s"));
      this.modal.classList.add('is-open');
      this.disableScroll();
      this.modalContainer.classList.add('modal-open');
      this.modalContainer.classList.add(this.animation);
      setTimeout(function () {
        _this.options.isOpen(_this);

        _this.modalContainer.classList.add('animate-open');

        _this.isOpen = true;

        _this.focusTrap();
      }, this.speed);
    }
  }, {
    key: "close",
    value: function close() {
      if (this.modalContainer) {
        this.modalContainer.classList.remove('animate-open');
        this.modalContainer.classList.remove(this.animation);
        this.modal.classList.remove('is-open');
        this.modalContainer.classList.remove('modal-open');
        this.enableScroll();
        this.options.isClose(this);
        this.isOpen = false;
        this.focusTrap();
      }
    }
  }, {
    key: "focusCatch",
    value: function focusCatch(e) {
      var focusable = this.modalContainer.querySelectorAll(this.focusElements);
      var focusArray = Array.prototype.slice.call(focusable);
      var focusedIndex = focusArray.indexOf(document.activeElement);

      if (e.shiftKey && focusedIndex === 0) {
        focusArray[focusArray.length - 1].focus();
        e.preventDefault();
      }

      if (!e.shiftKey && focusedIndex === focusArray.length - 1) {
        focusArray[0].focus();
        e.preventDefault();
      }
    }
  }, {
    key: "focusTrap",
    value: function focusTrap() {
      var focusable = this.modalContainer.querySelectorAll(this.focusElements);

      if (this.isOpen) {
        focusable[0].focus();
      } else {
        this.previousActiveElement.focus();
      }
    }
  }, {
    key: "disableScroll",
    value: function disableScroll() {
      var pagePosition = window.scrollY;
      this.lockPadding();
      document.body.classList.add('disable-scroll');
      document.body.dataset.position = pagePosition;
      document.body.style.top = -pagePosition + 'px';
    }
  }, {
    key: "enableScroll",
    value: function enableScroll() {
      var pagePosition = parseInt(document.body.dataset.position, 10);
      this.unlockPadding();
      document.body.style.top = 'auto';
      document.body.classList.remove('disable-scroll');
      window.scroll({
        top: pagePosition,
        left: 0
      });
      document.body.removeAttribute('data-position');
    }
  }, {
    key: "lockPadding",
    value: function lockPadding() {
      var paddingOffset = window.innerWidth - document.body.offsetWidth + 'px';
      this.fixBlocks.forEach(function (el) {
        el.style.paddingRight = paddingOffset;
      });
      document.body.style.paddingRight = paddingOffset;
    }
  }, {
    key: "unlockPadding",
    value: function unlockPadding() {
      this.fixBlocks.forEach(function (el) {
        el.style.paddingRight = '0px';
      });
      document.body.style.paddingRight = '0px';
    }
  }]);

  return Modal;
}();

var modal = new Modal({
  isOpen: function isOpen(modal) {
    console.log(modal);
    console.log('opened');
  },
  isClose: function isClose() {
    console.log('closed');
  }
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
  infinite: false,
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

/***/ "./src/js/components/quiz.js":
/*!***********************************!*\
  !*** ./src/js/components/quiz.js ***!
  \***********************************/
/***/ (() => {

$('.quiz').each(function () {
  var quiz = $(this).find('.quiz__pagination li');
  var quizItem = $(this).find('.quiz__page__content').hide();
  $(".guiz__page .quiz__page__content.active").show();
  quiz.each(function (i) {
    $(this).click(function () {
      $(this).addClass('active').show();
      quiz.not(this).removeClass('active');
      $(quizItem[i]).addClass('active').show();
      quizItem.not(quizItem[i]).removeClass('active').hide();
    });
  });
});
$('.btn__quiz').click(function () {
  if ($(this).hasClass('btn__quiz--prev')) {
    if ($('.quiz__pagination .quiz__pag__item.active').prev().length) {
      $('.quiz__pagination .quiz__pag__item.active').prev().addClass('active').siblings().removeClass('active');
      $('.quiz__page__content.active').prev().show().addClass('active').siblings().hide().removeClass('active');
    }
  } else if ($(this).hasClass('btn__quiz--next')) {
    if ($('.quiz__pagination .quiz__pag__item.active').next().length) {
      $('.quiz__pagination .quiz__pag__item.active').next().addClass('active').siblings().removeClass('active');
      $('.quiz__page__content.active').next().show().addClass('active').siblings().hide().removeClass('active');
    }
  }
});
var acc = document.getElementsByClassName("quiz__switch__item"),
    i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function () {
    for (j = 0; j < acc.length; j++) {
      if (acc[j] !== this) {
        acc[j].classList.remove("active");
      } else {
        this.classList.toggle("active");
      }
    }
  };
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

  if ($(this).hasClass('btn--prev')) {
    if (tabsToggler.prev().length) {
      tabsToggler.prev().addClass('active').siblings().removeClass('active');
      tabsContent.prev().show().addClass('active').siblings().hide().removeClass('active');
    }
  } else if ($(this).hasClass('btn--next')) {
    if (tabsToggler.next().length) {
      tabsToggler.next().addClass('active').siblings().removeClass('active');
      tabsContent.next().show().addClass('active').siblings().hide().removeClass('active');
    }
  }
});
var acc = document.getElementsByClassName("offer__item"),
    i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function () {
    for (j = 0; j < acc.length; j++) {
      if (acc[j] !== this) {
        acc[j].classList.remove("active");
      } else {
        this.classList.toggle("active");
      }
    }
  };
}

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