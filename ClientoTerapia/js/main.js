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

/***/ "./src/js/components/services.js":
/*!***************************************!*\
  !*** ./src/js/components/services.js ***!
  \***************************************/
/***/ (() => {

$(document).ready(function () {
  if (window.innerWidth >= 991) {
    //When page loads...
    $(".tab_content, .tab_content_child").hide(); //Hide all content

    $("ul.tabs li:first").addClass("active").show(); //Activate first tab

    $("ul.tabs_child li:first").addClass("active").show(); //Activate first tab

    $(".tab_content:first").show(); //Show first tab content

    $(".tab_content_child:first").show(); //Show first tab content
    //On Click Event

    $("ul.tabs li").click(function () {
      $("ul.tabs li").removeClass("active"); //Remove any "active" class

      $(this).addClass("active"); //Add "active" class to selected tab

      $(".tab_content").hide(); //Hide all tab content

      var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content

      $(activeTab).fadeIn(); //Fade in the active ID content

      return false;
    }); //On Click child tabs Event

    $("ul.tabs_child li").click(function () {
      $("ul.tabs_child li").removeClass("active"); //Remove any "active" class

      $(this).addClass("active"); //Add "active" class to selected tab

      $(".tab_content_child").hide(); //Hide all tab content 

      var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content

      $(activeTab).fadeIn(); //Fade in the active ID content 

      return false;
    });
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