
let menu = false;
$(function() {
    menu_top = $('.header__menu').offset().top;
    $(window).scroll(function () {
      if ($(window).scrollTop() > menu_top) {
        if ($('.header__scroll').css('position') != 'fixed') {
          $('.header').append('<div class="header__scroll"></div>');

          if(window.innerWidth >= 769){
            $('.header__scroll').append('<div class="header__scroll__block"><div class="header__scroll__block__container"></div></div>');
            $('.header__intro__logo').appendTo('.header__scroll__block__container');
            $('.header__intro__contact').appendTo('.header__scroll__block__container');
            $('.search__wrapper').appendTo('.header__scroll__block__container');
          }
          if(window.innerWidth > 990){
              $('.nav__bar__items2').appendTo('.header__scroll__block__container');
          }

          if(window.innerWidth <= 990){
            $('.header__menu__body').css({
              'justify-content': 'center',
              'align-items': 'center',
            })
            $('.header__menu__body .header__menu__items').css({
              'align-items': 'center',
              'text-align': 'left'
            })
          }

          $('.header__menu').appendTo('.header__scroll');

          $('.header__scroll').css({
            'width': '100%',
            'position':'fixed',
            'top': '0',
          });

          $('.content').css('margin-top','80px');
        }
      } else {
        if ($('.header__scroll').css('position') == 'fixed') {
          $('.search__wrapper').appendTo('.header__intro__search');
          $('.header__intro__location').appendTo('.header__intro__search');
          $('.header__intro__logo').appendTo('.header__intro');
          $('.header__intro__contact').appendTo('.header__intro');
          if(window.innerWidth <= 990){
            $('.header__menu__body').css({
              'justify-content': 'flex-start',
              'align-items': 'flex-end'
            });
            $('.header__menu__body .header__menu__items').css({
              'align-items': 'flex-end'
            })
          }
          if(window.innerWidth > 990){
              $('.nav__bar__items2').appendTo('.nav__bar');
          }
          
          $('.header__scroll__block__container').remove();
          $('.header__menu').appendTo('.header');
          $('.header__scroll').remove();
          $('.content').css('margin-top','');
        }
      }
    });
});

if(window.innerWidth <= 990){
    $('.header__menu__burger').css({
        'display': 'flex',
    })
    $('.nav__bar__items2').appendTo('.header__menu__container');
    $('.header__menu__container').append('<div class="header__menu__body"></div>');
    $('.header__menu__items').appendTo('.header__menu__body');
}


$('.header__menu__burger').click(function() {
    if(menu == false){
        $(this).addClass('menu__active');
        $('.header__menu__body').addClass('menu__active');
        menu = true;
    } else{
        $(this).removeClass('menu__active');
        $('.header__menu__body').removeClass('menu__active');
        menu = false;
    }
});

$('img.img-svg').each(function(){
  var $img = $(this);
  var imgClass = $img.attr('class');
  var imgURL = $img.attr('src');
  $.get(imgURL, function(data) {
    var $svg = $(data).find('svg');
    if(typeof imgClass !== 'undefined') {
      $svg = $svg.attr('class', imgClass+' replaced-svg');
    }
    $svg = $svg.removeAttr('xmlns:a');
    if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
      $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
    }
    $img.replaceWith($svg);
  }, 'xml');
});


//==================================================================
