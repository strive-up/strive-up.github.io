/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
const menuBtn = document.querySelector('.header__burger');
const menu = document.querySelector('.header__menu');
var quizValid = false;

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
let quizOpen = false;
$(function () {
  $('.btn__calc__price').click(function () {
    if (quizOpen == false) {
      $('.quiz__wrapp').addClass('quiz__active');
      document.body.style.overflow = 'hidden';
      quizOpen = true;
    }
  });
  document.addEventListener('mousedown', function (e) {
    if (quizOpen == true && quizValid == false) {
      if (e.target.closest('.quiz') === null) {
        $('.quiz__wrapp').removeClass('quiz__active');
        document.body.style.overflow = 'auto';
        quizOpen = false;
      }
    } else {
      return;
    }
  });
  $('.quiz__close').click(function () {
    if (quizOpen == true && quizValid == false) {
      $('.quiz__wrapp').removeClass('quiz__active');
      document.body.style.overflow = 'auto';
      quizOpen = false;
    } else {
      return;
    }
  });
});
var steps = [false, false, false, false, false, false, false, false, false];
var quizStepsUnBlock = false;
var curr_step = 0;
var int_val = 0; //для проверки площади
// возможность возвращаться к предыдущему вопросу

function set_history(index) {
  if (!(window.history && history.pushState)) {
    return false;
  }

  if (steps[index] == false) {
    history.pushState({
      'step_x': index
    }, null, window.location.href);
    steps[index] = true;
  }
}

function check_input_value(elem_id) {
  var obj = $('input[name="' + elem_id + '"]');

  if (obj.length && obj.val() == "") {
    $('.steps__form__input__item[data-name="' + elem_id + '"]').addClass('valid__warning');
    return false;
  } else {
    $('.steps__form__input__item[data-name="' + elem_id + '"]').removeClass('valid__warning');
  }

  return true;
} // переходы по шагам


function to_step(index, need_push) {
  curr_step = index;

  for (var i = 0; i < steps.length; i++) {
    if (!$("#step" + i).is(':hidden')) {
      $("#step" + i).hide();
    }
  }

  ;
  $("#step" + index).show();
  var progress__num = Math.round(100 * index / 6);
  $("#curr_step").html(`Готово: <span>${progress__num}%</span>`);
  $(".progress__line").css({
    width: 100 * index / 6 + "%"
  }); // Разделение на #step0, #other_steps и #last_step

  if (index + 1 == 8) {
    // если шаг равен общему количеству шагов
    if (!$("#other_steps").is(':hidden')) {
      $("#other_steps").hide();
      $("#last_step").show();
    }
  } else if (index > 0) {
    // если шаг больше ноля
    if ($("#other_steps").is(':hidden')) {
      $("#other_steps").show();
    }

    if (!$("#last_step").is(':hidden')) {
      $("#last_step").hide();
    }
  } else if (!$("#other_steps").is(':hidden')) {
    // если шаг равен нолю
    $("#other_steps").hide();
  }

  if (need_push) {
    if (index == 2) {
      $("#area_input").focus();
    } // Фокусировка на поле площадь


    set_history(index);
  }
}

$(document).ready(function () {
  var btn__nexts = document.querySelectorAll('.btn__next');
  Array.from(btn__nexts, function (el) {
    el.setAttribute("disabled", "disabled");
  });
  jQuery('body').on('change', '#quiz_form', function () {
    // Обводка для label input[type=radio]
    $('input[type=radio]').each(function () {
      if ($(this).is(':checked')) {
        $(this).parent('label').addClass('checked');
      } else {
        $(this).parent('label').removeClass('checked');
      }
    }); // Обводка для label input[type=checkbox]

    $('input[type=checkbox]').each(function () {
      if ($(this).is(':checked')) {
        $(this).parent('label').addClass('checked');
      } else {
        $(this).parent('label').removeClass('checked');
      }
    });
    $('.steps__wrapp').each(function () {
      $('label.quiz__label').each(function () {
        if ($(this).is('.checked')) {
          $(this).parent('.loc__option__item').addClass('quiz__item__active');
          $('#step3').find('.btn__next').removeAttr('disabled', 'disabled');
          /* setTimeout(() =>{to_step(4, true);}, 500); */
        } else {
          $(this).parent('.loc__option__item').removeClass('quiz__item__active');
        }
      });
      $('label.quiz__labels').each(function () {
        if ($(this).is('.checked')) {
          $(this).parent('.choice__style__item').addClass('label__active');
          $(this).parent('.loc__option__item').addClass('label__active');

          if ($(this).is('.quiz__labels-to__step4')) {
            setTimeout(() => {
              to_step(4, true);
            }, 500);
          } else if ($(this).is('.step1__label')) {
            $('#step1').find('.btn__next').removeAttr('disabled', 'disabled');
          } else if ($(this).is('.step2__label')) {
            $('#step2').find('.btn__next').removeAttr('disabled', 'disabled');
          } else if ($(this).is('.step4__label')) {
            /* if($(this).is('.econom')){
            	$('.step5').addClass('econom');
            } else {
            	$('.step5').removeClass('econom');
            }
            if ($(this).is('.standart')){
            	$('.step5').addClass('standart');
            } else {
            	$('.step5').removeClass('standart');
            }
            if ($(this).is('.premium')){
            	$('.step5').addClass('premium');
            } else {
            	$('.step5').removeClass('premium');
            } */
            $('#step4').find('.btn__next').removeAttr('disabled', 'disabled');
          } else if ($(this).is('.step5__label')) {
            if ($(this).is('.gift__item1')) {
              $('.prelast__step').addClass('gift__item1');
            } else {
              $('.prelast__step').removeClass('gift__item1');
            }

            if ($(this).is('.gift__item2')) {
              $('.prelast__step').addClass('gift__item2');
            } else {
              $('.prelast__step').removeClass('gift__item2');
            }

            if ($(this).is('.gift__item3')) {
              $('.prelast__step').addClass('gift__item3');
            } else {
              $('.prelast__step').removeClass('gift__item3');
            }

            if ($(this).is('.gift__item4')) {
              $('.prelast__step').addClass('gift__item4');
            } else {
              $('.prelast__step').removeClass('gift__item4');
            }

            if ($(this).is('.gift__item5')) {
              $('.prelast__step').addClass('gift__item5');
            } else {
              $('.prelast__step').removeClass('gift__item5');
            }

            if ($(this).is('.gift__item6')) {
              $('.prelast__step').addClass('gift__item6');
            } else {
              $('.prelast__step').removeClass('gift__item6');
            }

            if ($(this).is('.gift__item7')) {
              $('.prelast__step').addClass('gift__item7');
            } else {
              $('.prelast__step').removeClass('gift__item7');
            }

            if ($(this).is('.gift__item8')) {
              $('.prelast__step').addClass('gift__item8');
            } else {
              $('.prelast__step').removeClass('gift__item8');
            }

            $('#step5').find('.btn__next').removeAttr('disabled', 'disabled');
          }
        } else {
          $(this).parent('.choice__style__item').removeClass('label__active');
          $(this).parent('.loc__option__item').removeClass('label__active');
        }
      });
    });
  });
});

(function ($) {
  const form__quiz = document.getElementById('quiz_form');
  $(document).ready(function () {
    to_step(0, true);
  }); // задаем первоначальный индекс

  $("#to_step1").click(function (event) {
    event.preventDefault();
    to_step(1, true);
    quizValid = true;
  });
  $("#to_step2").click(function (event) {
    event.preventDefault();
    to_step(2, true);
  });
  $("#to_step3").click(function (event) {
    event.preventDefault();
    to_step(3, true);
  });
  $("#to_step4").click(function (event) {
    event.preventDefault();
    to_step(4, true);
  });
  $("#to_step5").click(function (event) {
    event.preventDefault();
    to_step(5, true);
  });
  $("#to_step6").click(function (event) {
    event.preventDefault();
    /* if(check_input_value("quiz__name") && check_input_value("quiz__phone") ){
    	$("#quiz_form").submit();
    } */

    to_step(6, true);
    $('#other_steps').addClass('last__step__bar');
  });
  $("#to_step7").click(function (event) {
    event.preventDefault();

    if (check_input_value("quiz__name") && check_input_value("quiz__phone")) {
      $("#quiz_form").submit();
    }
  });
  $("#back__step1").click(function (event) {
    event.preventDefault();
    to_step(1, true);
  });
  $("#back__step2").click(function (event) {
    event.preventDefault();
    to_step(2, true);
  });
  $("#back__step3").click(function (event) {
    event.preventDefault();
    to_step(3, true);
  });
  $("#back__step4").click(function (event) {
    event.preventDefault();
    to_step(4, true);
  });
  $("#to_step4-choice__style").click(function (event) {
    event.preventDefault();
    setTimeout(() => {
      to_step(4, true);
    }, 1000);
  });
  $('#quiz_form').submit(function (event) {
    event.preventDefault();
    var quiz__name = $(this).find("input[name='quiz__name']").val();
    var quiz__phone = $(this).find("input[name='quiz__phone']").val();
    var quiz__style = document.querySelector(".choice__style label.checked input[type='radio']").value;
    var quiz__fasad = document.querySelector(".choice__fasad label.checked input[type='radio']").value;
    var quiz__loc = document.querySelector(".choice__location label.checked input[type='radio']").value;
    var quiz__price = document.querySelector(".choice__price label.checked input[type='radio']").value;
    var quiz__gift = document.querySelector(".choice__gift label.checked input[type='radio']").value;
    $.ajax({
      type: 'POST',
      async: true,
      cache: false,
      data: {
        name: quiz__name,
        number: quiz__phone,
        style: quiz__style,
        fasad: quiz__fasad,
        location: quiz__loc,
        price: quiz__price,
        gift: quiz__gift
      },
      url: "sendmail.php",
      success: function (data) {
        to_step(7, true);
        quizValid = false;
      }
    });
    return false;
  }); // для возврата к предыдущему вопросу

  window.addEventListener("popstate", function (e) {
    var step = 0;

    if (e.state) {
      step = e.state.step_x;
    }

    to_step(step);
  });
})(jQuery);

var items = document.querySelectorAll('input.phone__masks');
items.forEach(function (el) {
  var dispatchMask = new IMask(el, {
    mask: [{
      mask: '+7 (000) 000-00-00',
      startsWith: '7',
      lazy: false,
      country: 'Russia'
    }, {
      mask: '8 (000) 000-00-00',
      startsWith: '8',
      lazy: false,
      country: 'Russia'
    }, {
      mask: '+(000) 000-00-00',
      startsWith: '',
      country: 'unknown'
    }],
    dispatch: function (appended, dynamicMasked) {
      var number = (dynamicMasked.value + appended).replace(/\D/g, '');
      return dynamicMasked.compiledMasks.find(function (m) {
        return number.indexOf(m.startsWith) === 0;
      });
    }
  });
});
/******/ })()
;
//# sourceMappingURL=main.js.map