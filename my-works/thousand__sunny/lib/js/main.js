$('.mobile-menu').on('click', function(e){
    e.preventDefault();
    $('.menu-btn').toggleClass('menu-active')
    $('.main__menu').toggleClass('menu-active')
})