let searchValid = false;

$('.search__icons').click(function() {
  if(window.innerWidth >= 992){
    if(searchValid == false){
      $('.search__icons').css('background', '#F8F8F8');
      $('.search__input').css('display', 'block');
      $('.search__input').css('width', '515px');
      $('.search__icons').css('border-radius', '3px 0 0 3px');
      $('.contact__number').css('display', 'none');
      if( window.innerWidth <= 1490 && window.innerWidth >= 992){
        $('.search__input').css('width', '400px');
      } if(window.innerWidth <= 1405 && window.innerWidth >= 992) {
        $('.search__input').css('width', '350px');
      } if(window.innerWidth <= 1280 && window.innerWidth >= 992) {
        $('.search__input').css('width', '250px');
      } if(window.innerWidth <= 1076 && window.innerWidth >= 992) {
        $('.search__input').css('width', '200px');
      } if(window.innerWidth <= 1076 && window.innerWidth >= 992){
        $('.contact__number__wrapper').css('display', 'none');
      } if(window.innerWidth <= 999 && window.innerWidth >= 992) {
        $('.search__input').css('width', '150px');
      }
      searchValid = true;
    } else {
      $('.search__icons').css('background', '#F9E8FA');
      $('.search__input').css('display', 'none');
      $('.search__input').css('width', '0');
      $('.search__icons').css('border-radius', '3px');
      $('.contact__number').css('display', 'block');
      if(window.innerWidth <= 1076){
        $('.contact__number__wrapper').css('display', 'flex');
      }
      searchValid = false;
    }
  }
});

if(window.innerWidth <= 1076 && window.innerWidth >= 992){
  $('.contact__number__wrapper').css('display', 'flex');
  $('.contact__number').prependTo('.contact__number__wrapper');
}

let menuValid = false;

$('.burger__wrapper').click(function() {
  if(menuValid == false){
    $('.nav__content--mobile').addClass('mobile-active');
    $('.burger__wrapper').removeClass('burger__wrapper');
    $('.nav__content--mobile').addClass('burger__wrapper');
    menuValid == true;
  } else {
    $('.nav__content--mobile').removeClass('mobile-active');
    menuValid == false;
  }
});