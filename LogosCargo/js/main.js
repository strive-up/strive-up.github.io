if(window.innerWidth <= 990){
    $('.header__logo').prependTo('.intro');
    $('.header__nav__list').after('<a href="tel:+78124072897" class="header__number"><img src="img/menu/phone.svg" alt="">+7 (812) 407-28-97</a><button class="btn --call">Заказать звонок</button>');
}

let menuValid = false;

if(window.innerWidth <= 640){
    $('.intro__btn').prependTo('.intro__container');
}

function openMenu(){
    if(menuValid == false){
        $('.header__nav').addClass('menu__active');
        $('.header__nav').prepend('<div class="menu__close" onclick="closeMenu()"><span></span></div>');
        $('.header__logo').prependTo('.header__nav__container');
        menuValid = true;
    } else {
        $('.header__nav').removeClass('menu__active');
        $('.header__logo').prependTo('.intro');
        $('.menu__close').remove();
        menuValid = false;
    }
}

function closeMenu(){
    $('.header__nav').removeClass('menu__active');
    $('.header__logo').prependTo('.intro');
    $('.menu__close').remove();
    menuValid = false;
}

$(function(){
    $("#footer__call__input").mask("+7 (999) 999-9999");
    $("#banner__call__input").mask("+7 (999) 999-9999");
});
