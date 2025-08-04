/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
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
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "closeBot": () => (/* binding */ closeBot)
/* harmony export */ });
//=============================== [ Переменные ] ===============================

var botStatus; // статус бота | 0 - бота не запущен; 1 - бот запущен
var btnBack = 0; // активна ли кнопка назад (back)
var settingsMenuOpen = 0; // открыта ли меню настроек
var settingsContentOpen = 0; // открыты ли настройки
var botAction = 0; // было ли произведено какое либо действие в боте
var diagnostic = 0; // диагностика | 0 - не была запущена; 1 - запущена
var diagnosticAction = 0; // было ли произведено какое либо действие после начала диагностики
var results = 0; // 0 - диагностика не произведена; 1 - нашел диагноз; 2 - диагноза нет в базе;
var diagnosticSteps = 0;
const botFrame = window.parent.document.querySelector('iframe[medicalbot]'); // IFrame бота

//================================ [ Настройки ] ===============================

// открытие меню

function openSettingsMenu() {
  $('.bot').addClass('settings__menu__active');
  botAction = 1;
  settingsMenuOpen = 1;
  btnBack = 1;
  if (settingsContentOpen == 1) {
    $('.bot').removeClass('settings__content__active');
  }
}
function openSettings(event) {
  let target = $(event.target),
    menu__item = target.attr("settings__menu");
  settingsMenuOpen = 0;
  $('.bot').removeClass('settings__menu__active');
  $('.bot').addClass('settings__content__active');
  $('.settings__content__item').removeClass('active');
  $(`.settings__content__item[${menu__item}]`).addClass('active');
  settingsContentOpen = 1;
  btnBack = 1;
}
$(".settings__item").click(openSettings);

// изменение цвета

function ColorLuminance(hex, lum) {
  hex = String(hex).replace(/[^0-9a-f]/gi, '');
  if (hex.length < 6) {
    hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
  }
  lum = lum || 0;
  var rgb = "#",
    c,
    i;
  for (i = 0; i < 3; i++) {
    c = parseInt(hex.substr(i * 2, 2), 16);
    c = Math.round(Math.min(Math.max(0, c + c * lum), 255)).toString(16);
    rgb += ("00" + c).substr(c.length);
  }
  return rgb;
}
const solid = [].slice.call(document.querySelectorAll('.choice__color__solid'));
const transparent = [].slice.call(document.querySelectorAll('.choice__color__transparent'));
const bots = document.querySelector('.bot');
solid.forEach(input => input.addEventListener('change', solidUpdate));
transparent.forEach(input => input.addEventListener('change', transparentUpdate));
function solidUpdate(e) {
  if (this.type === 'color') {
    bots.style.setProperty('--solid-color', this.value);
    var currentColor = bots.style.getPropertyValue("--solid-color");
    bots.style.setProperty('--solid-color-light', ColorLuminance(currentColor, 0.2));
    $('.color__input__wrapper.first p.color__value').text(currentColor);
  }
}
function transparentUpdate(e) {
  if (this.type === 'color') {
    bots.style.setProperty('--transparent-color', this.value);
    var currentColor = bots.style.getPropertyValue("--transparent-color");
    bots.style.setProperty('--transparent-color-black', ColorLuminance(currentColor, -0.5));
    bots.style.setProperty('--transparent-color-light', ColorLuminance(currentColor, 0.5));
    $('.color__input__wrapper.second p.color__value').text(currentColor);
  }
}
function changeColor(event) {
  let target = $(event.target),
    targetColor = target.attr('value-color');
  if (target.attr('name') == 'solid__color') {
    bots.style.setProperty('--solid-color', targetColor);
    var currentColor = bots.style.getPropertyValue("--solid-color");
    bots.style.setProperty('--solid-color-light', ColorLuminance(currentColor, 0.2));
    $('.color__input__wrapper.first p.color__value').text(currentColor);
  } else if (target.attr('name') == 'transparent__color') {
    bots.style.setProperty('--transparent-color', targetColor);
    var currentColor = bots.style.getPropertyValue("--transparent-color");
    bots.style.setProperty('--transparent-color-black', ColorLuminance(currentColor, -0.5));
    bots.style.setProperty('--transparent-color-light', ColorLuminance(currentColor, 0.5));
    $('.color__input__wrapper.second p.color__value').text(currentColor);
  }
}
$(".input__radio__wrapper").click(changeColor);

// копирование api кода

$('.form__input input[name="copy__code"]').click(function () {
  $(this).select();
});
$('.form__input .copy__input__code').click(function () {
  $('#copy__code').select();
  document.execCommand("copy");
});

//=============================== [ Диагностика ] ==============================
jQuery('body').on('change', '.diagnostic__page', function () {
  if (diagnostic == 1) {
    diagnosticAction = 1;
  }
  $('input[type=checkbox]').each(function () {
    if ($(this).is(':checked')) {
      $(this).parent('label').addClass('checked');
    } else {
      $(this).parent('label').removeClass('checked');
    }
  });
});
jQuery('body').on('change', '.color__radio__wrapper', function () {
  $('input[type=radio]').each(function () {
    if ($(this).is(':checked')) {
      $(this).parent('label').addClass('checked');
    } else {
      $(this).parent('label').removeClass('checked');
    }
  });
});
function showResults() {
  $('.diagnostic__page').each(function () {
    if (results == 1) {
      // нашел диагноз
      $(this).find('.successful__results').addClass('active');
    } else if (results == 2) {
      // диагноза нет в базе
      $(this).find('.undefined__results').addClass('active');
    }
  });
}
function nextStep() {
  $('.diagnostic__page').each(function () {
    let step = $(this).find('.diagnostic__step'),
      currentStep = $(this).find('.diagnostic__step[active]'),
      currentStepNum = currentStep.attr('step'),
      maxStepNum = step.length;
    let nextStepNum = Number(currentStepNum) + 1,
      nextStep = document.querySelector(`.diagnostic__step[step="${nextStepNum}"]`);
    if (nextStepNum > maxStepNum) {
      currentStep.removeAttr('active');
      results = 1;
      showResults();
    } else {
      if (currentStepNum == "undefined") {
        step.find('[step="1"]').attr('active', 'active');
      } else {
        currentStep.removeAttr('active');
        nextStep.setAttribute('active', '');
      }
    }
  });
}
$('.diagnostic__step').find('.--btn').on('click', function () {
  nextStep();
});

//=============================== [ CallBack ] ==============================
const reviews__btn = $('.footer__links__item[reviews]'),
  callback__btn = $('.footer__links__item[callback]'),
  reviews = $('.reviews__page'),
  callback = $('.callback__page');
var reviewsAction = 0,
  callbackAction = 0;

// отзывы
reviews__btn.on('click', function () {
  reviewsAction = 1;
  $('.body').addClass('reviews__active');
  botAction = 1;
  btnBack = 1;
});
reviews.each(function () {
  $(this).find('form').submit(function (event) {
    event.preventDefault();
    sendForm($(this));
  });
  $(this).find('button[back__to__site]').on('click', function () {
    reviews.find('.reviews__form').addClass('active');
    reviews.find('.reviews__success').removeClass('active');
    $('.body').removeClass('reviews__active');
    reviewsAction = 0;
    reviews.find('form').trigger('reset');
  });
  $(this).find('button[change__reviews]').on('click', function () {
    reviews.find('.reviews__form').addClass('active');
    reviews.find('.reviews__success').removeClass('active');
  });
});

// обратная связь
callback__btn.on('click', function () {
  callbackAction = 1;
  $('.body').addClass('callback__active');
  botAction = 1;
  btnBack = 1;
});
callback.each(function () {
  $(this).find('form').submit(function (event) {
    event.preventDefault();
    sendForm($(this));
  });
  $(this).find('button[back__to__site]').on('click', function () {
    callback.find('.callback__form').addClass('active');
    callback.find('.callback__success').removeClass('active');
    $('.body').removeClass('callback__active');
    callbackAction = 0;
    callback.find('form').trigger('reset');
  });
  $(this).find('button[cancel__callback]').on('click', function () {
    callback.find('.callback__form').addClass('active');
    callback.find('.callback__success').removeClass('active');
  });
});
function sendForm(str) {
  var name = str.find(".form__input input[name='name']").val();
  var review = str.find(".form__input textarea[name='reviews']").val();
  var phone = str.find(".form__input input[name='phone']").val();
  if (reviewsAction == 1) {
    if (name == "" || review == "") {
      alert('поля не заполнены');
      return;
    } else {
      reviews.find('.reviews__form').removeClass('active');
      reviews.find('.reviews__success').addClass('active');
    }
  } else if (callbackAction == 1) {
    if (name == "" || phone == "") {
      alert('поля не заполнены');
      return;
    } else {
      callback.find('.callback__form').removeClass('active');
      callback.find('.callback__success').addClass('active');
    }
  }
}

// маска для телефонов
$("#phone1").mask("+ 7 (999) 999-9999");
$("#phone2").mask("+ 7 (999) 999-9999");

//================================= [ Кнопки ] =================================
$('.btn__close').on('click', function () {
  closeBot();
});
$('.btn__settings').on('click', function () {
  openSettingsMenu();
});
$('.btn__back').on('click', function () {
  back();
});
$('button[start__diagnostic]').on('click', function () {
  startDiagnostic();
});

//========================== [ Ф-ции контроля ботом ] ==========================

function openBot() {
  botStatus = 1;
}
function closeBot() {
  if (botAction == 0) {
    document.querySelector('.bot').className = "bot";
    botStatus = 0;
    diagnostic = 0;
    diagnosticAction = 0;
    setTimeout(function () {
      window.parent.document.querySelector('iframe[medicalbot]').style.display = 'none';
    }, 500);
  } else if (botAction == 1) {
    $('.bot').addClass('close__bot__active');
  }
}
function back() {
  if (botAction == 1 && btnBack == 1) {
    // отмена действий для меню настроек
    if (settingsMenuOpen == 1) {
      $('.bot').removeClass('settings__menu__active');
      settingsMenuOpen = 0;
      return;
    }

    // отмена действий для настроек
    if (settingsContentOpen == 1) {
      $('.settings__content__item').removeClass('active');
      $('.bot').removeClass('settings__content__active');
      settingsContentOpen = 0;
      return;
    }

    // отмена действий для диагностики
    if (diagnostic == 1 && diagnosticSteps == 0) {
      // если диагностика была начата, но не было произведено никаких действий
      if (reviewsAction == 0 || callbackAction == 0) {
        stopDiagnostic();
      } else return;
    } else if (diagnostic == 1 && diagnosticSteps == 1) {
      return;
    }

    // отмена действий для отзывов
    if (reviewsAction == 1) {
      reviews.find('.reviews__form').addClass('active');
      reviews.find('.reviews__success').removeClass('active');
      $('.body').removeClass('reviews__active');
      reviewsAction = 0;
      reviews.find('form').trigger('reset');
      return;
    }

    // отмена действий для обратной связи
    if (callbackAction == 1) {
      callback.find('.callback__form').addClass('active');
      callback.find('.callback__success').removeClass('active');
      $('.body').removeClass('callback__active');
      callbackAction = 0;
      callback.find('form').trigger('reset');
      return;
    }
  } else return;
}
$('.close__bot .close__bot__body').each(function () {
  $(this).find('.close__bot__agree').on('click', function () {
    botAction = 0;
    closeBot();
  });
  $(this).find('.close__bot__cancel').on('click', function () {
    $('.bot').removeClass('close__bot__active');
  });
});
function startDiagnostic() {
  document.querySelector('.bot .body').className = "body";
  diagnostic = 1;
  diagnosticSteps = 0;
  $('.body').addClass('diagnostic__active');
  botAction = 1;
  btnBack = 1;
}
function stopDiagnostic() {
  if (diagnosticAction == 0) {
    document.querySelector('.bot .body').className = "body";
    diagnostic = 0;
    btnBack = 0;
    $('.body').addClass('main__active');
  } else if (diagnosticAction == 1) {
    $('.bot').addClass('diagnostic__back__active');
  }
}
$('.diagnostic__back .close__bot__body').each(function () {
  $(this).find('.close__bot__agree').on('click', function () {
    diagnosticAction = 0;
    $('.bot').removeClass('diagnostic__back__active');
    stopDiagnostic();
  });
  $(this).find('.close__bot__cancel').on('click', function () {
    $('.bot').removeClass('diagnostic__back__active');
  });
});
/******/ })()
;
//# sourceMappingURL=main.js.map