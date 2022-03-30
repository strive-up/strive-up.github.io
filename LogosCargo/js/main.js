let menuValid = false;

$('.--menu').click(function() {
    if(menuValid == false){
        $('.header__nav').addClass('nav__active');
        menuValid = true;
    } else {
        $('.header__nav').removeClass('nav__active');
        menuValid = false;
    }
});

$('.nav__close__btn').click(function() {
    if(menuValid == false){
        $('.header__nav').addClass('nav__active');
        menuValid = true;
    } else {
        $('.header__nav').removeClass('nav__active');
        menuValid = false;
    }
});