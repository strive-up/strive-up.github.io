let menuValid = false;

document.querySelector('.burger_menu').addEventListener('click', () => {
	if(menuValid == false){
		$('.burger_menu').addClass('active');
		$('.header').addClass('active');
		$('.nav').addClass('active');
		$('.header_body').addClass('active');
		$('body').addClass('active');
		$('.nav ul').addClass('active');
		$('.btn-close').addClass('active');
		$('.burger_menu span').addClass('active');
		menuValid = true;
	} else {
		$('.burger_menu').removeClass('active');
		$('.header').removeClass('active');
		$('.nav').removeClass('active');
		$('.header_body').removeClass('active');
		$('body').removeClass('active');
		$('.nav ul').removeClass('active');
		$('.btn-close').removeClass('active');
		$('.burger_menu span').removeClass('active');
		menuValid = false;
	}
	
})

document.querySelector('.btn-close').addEventListener('click', () => {
	$('.burger_menu').removeClass('active');
	$('.header').removeClass('active');
	$('.nav').removeClass('active');
	$('.header_bWody').removeClass('active');
	$('body').removeClass('active');
	$('.nav ul').removeClass('active');
	$('.btn-close').removeClass('active');
	$('.burger_menu span').removeClass('active');
	menuValid = false;
})

let Mymap;

function initMap() {

	var pos = { lat: 55.754357, lng: 37.643577 };

	Mymap = new google.maps.Map(document.getElementById("map"), {
		center: pos,
		zoom: 14,
	});

	marker = new google.maps.Marker({
		position: pos,
		map: Mymap,
		icon: 'libs/img/adress.svg',
	});

}

$('.experts_name').click(function() {
	$(this).next('.experts_data').css("display", $(this).next('.experts_data').css("display")=='none' ? 'block' : 'none' );
})

function moreJobs() {
	$('.jobs_descript_full').hide();
	moreValid = false;

	$('.jobs_more').on('click', function() {

		if(moreValid === false){
			$(this).siblings('.jobs_descript_full').toggle();
			$(this).html('Скрыть <span><ion-icon name="chevron-up-outline"></ion-icon></span>');
			moreValid = true;
		} else {
			$(this).siblings('.jobs_descript_full').toggle();
			$(this).html('Подробнее <span><ion-icon name="chevron-down-outline"></ion-icon></span>');
			moreValid = false;
		}
	});

}

$(function(){
	if ( $(window).width() < 525 ) {
		$('.next').html('Следущая страница');
		$('.arrow_body').hide();
	}
});

moreJobs();

let docValid;

function Doc() {
	$('.doc_discript').hide();
	docValid = false;

	$('.doc_items').on('click', function() {
		
		if(docValid === false){
			$(this).find('.doc_discript').toggle();
			$(this).find('.doc_arrow').html('<ion-icon name="chevron-up-outline"></ion-icon>');
			moreValid = true;
		} else {
			$(this).find('.doc_discript').toggle();
			$(this).find('.doc_arrow').html('<ion-icon name="chevron-down-outline"></ion-icon>');
			moreValid = false;
		}

	});

}

Doc();

$(document).ready(function($) {
	// Клик по ссылке "Закрыть".
	$('.popup-close').click(function() {
		$(this).parents('.popup-fade').fadeOut();
		return false;
	});        
 
	// Закрытие по клавише Esc.
	$(document).keydown(function(e) {
		if (e.keyCode === 27) {
			e.stopPropagation();
			$('.popup-fade').fadeOut();
		}
	});
	
	// Клик по фону, но не по окну.
	$('.popup-fade').click(function(e) {
		if ($(e.target).closest('.popup').length == 0) {
			$(this).fadeOut();					
		}
	});	
});