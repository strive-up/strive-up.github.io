 
$('.services__content').each(function(){

    let tabTabs = $(this).find('ul.tabs li');
    let tabItems = $(this).find('.tab_content').hide();
    $(".tab_container .tab_content.active").show();

    tabTabs.each(function(i){
      $(this).click(function(){
        $(this).addClass('active').show();
        tabTabs.not(this).removeClass('active');
        $(tabItems[i]).addClass('active').show();
        tabItems.not(tabItems[i]).removeClass('active').hide();
      });
    });
    
});


$('.tab_content .button .btn__arrow__stroke').click(function() {
    
    let tabsContent = $(this).closest('.tab_content.active');
    let tabsToggler = $(this).closest('.tab_container').prev().find('li.active');

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

var acc = document.getElementsByClassName("offer__item"), i;

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