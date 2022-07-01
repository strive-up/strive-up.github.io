

$('.quiz').each(function(){

    let quiz = $(this).find('.quiz__pagination li');
    let quizItem = $(this).find('.quiz__page__content').hide();
    $(".guiz__page .quiz__page__content.active").show();

    quiz.each(function(i){
        $(this).click(function(){
            $(this).addClass('active').show();
            quiz.not(this).removeClass('active');
            $(quizItem[i]).addClass('active').show();
            quizItem.not(quizItem[i]).removeClass('active').hide();
        });
    });
});


$('.btn__quiz').click(function() {

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


var acc = document.getElementsByClassName("quiz__switch__item"), i;

for (i = 0; i < acc.length; i++) {

  acc[i].onclick = function() {

    for (j = 0; j < acc.length; j++) {

      if (acc[j] !== this) {
        acc[j].classList.remove("active");

      } else {
        this.classList.toggle("active");
      }

    }
  }

}