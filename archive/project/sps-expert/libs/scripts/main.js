let menuValid = false;

var swiper = new Swiper(".mySwiper", {
	spaceBetween: 30,
	pagination: {
	  el: ".swiper-pagination",
	  clickable: true,
	},
  });

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


////////////////////////////////////////

class Modal {
	constructor(options) {
		let defaultOptions = {
			isOpen: () => {},
			isClose: () => {},
		}
		this.options = Object.assign(defaultOptions, options);
		this.modal = document.querySelector('.modal');
		this.speed = false;
		this.animation = false;
		this.isOpen = false;
		this.modalContainer = false;
		this.previousActiveElement = false;
		this.fixBlocks = document.querySelectorAll('.fix-block');
		this.focusElements = [
			'a[href]',
			'input',
			'button',
			'select',
			'textarea',
			'[tabindex]'
		];
		this.events();
	}

	events() {
		if (this.modal) {
			document.addEventListener('click', function(e){
				const clickedElement = e.target.closest('[data-path]');
				if (clickedElement) {
					let target = clickedElement.dataset.path;
					let animation = clickedElement.dataset.animation;
					let speed = clickedElement.dataset.speed;
					this.animation = animation ? animation : 'fade';
					this.speed = speed ? parseInt(speed) : 300;
					this.modalContainer = document.querySelector(`[data-target="${target}"]`);
					this.open();
					return;
				}

				if (e.target.closest('.modal-close')) {
					this.close();
					return;
				}
			}.bind(this));

			window.addEventListener('keydown', function(e) {
				if (e.keyCode == 27) {
					if (this.isOpen) {
						this.close();
					}
				}

				if (e.keyCode == 9 && this.isOpen) {
					this.focusCatch(e);
					return;
				}

			}.bind(this));

			this.modal.addEventListener('click', function(e) {
				if (!e.target.classList.contains('modal__container') && !e.target.closest('.modal__container') && this.isOpen) {
					this.close();
				}
			}.bind(this));
		}
	}

	open() {
		this.previousActiveElement = document.activeElement;

		this.modal.style.setProperty('--transition-time', `${this.speed / 1000}s`);
		this.modal.classList.add('is-open');
		this.disableScroll();
		
		this.modalContainer.classList.add('modal-open');
		this.modalContainer.classList.add(this.animation);

		setTimeout(() => {
			this.options.isOpen(this);
			this.modalContainer.classList.add('animate-open');
			this.isOpen = true;
			this.focusTrap();
		}, this.speed);
	}

	close() {
		if (this.modalContainer) {
			this.modalContainer.classList.remove('animate-open');
			this.modalContainer.classList.remove(this.animation);
			this.modal.classList.remove('is-open');
			this.modalContainer.classList.remove('modal-open');

			this.enableScroll();
			this.options.isClose(this);
			this.isOpen = false;
			this.focusTrap();
		}
	}

	focusCatch(e) {
		const focusable = this.modalContainer.querySelectorAll(this.focusElements);
		const focusArray = Array.prototype.slice.call(focusable);
		const focusedIndex = focusArray.indexOf(document.activeElement);

		if (e.shiftKey && focusedIndex === 0) {
			focusArray[focusArray.length - 1].focus();
			e.preventDefault();
		}

		if (!e.shiftKey && focusedIndex === focusArray.length - 1) {
			focusArray[0].focus();
			e.preventDefault();
		}
	}

	focusTrap() {
		const focusable = this.modalContainer.querySelectorAll(this.focusElements);
		if (this.isOpen) {
			focusable[0].focus();
		} else {
			this.previousActiveElement.focus();
		}
	}

	disableScroll() {
		let pagePosition = window.scrollY;
		this.lockPadding();
		document.body.classList.add('disable-scroll');
		document.body.dataset.position = pagePosition;
		document.body.style.top = -pagePosition + 'px';
	}

	enableScroll() {
		let pagePosition = parseInt(document.body.dataset.position, 10);
		this.unlockPadding();
		document.body.style.top = 'auto';
		document.body.classList.remove('disable-scroll');
		window.scroll({ top: pagePosition, left: 0 });
		document.body.removeAttribute('data-position');
	}

	lockPadding() {
		let paddingOffset = window.innerWidth - document.body.offsetWidth + 'px';
		this.fixBlocks.forEach((el) => {
			el.style.paddingRight = paddingOffset;
		});
		document.body.style.paddingRight = paddingOffset;
	}

	unlockPadding() {
		this.fixBlocks.forEach((el) => {
			el.style.paddingRight = '0px';
		});
		document.body.style.paddingRight = '0px';
	}
}

const modal = new Modal({
	isOpen: (modal) => {
		console.log(modal);
		console.log('opened');
	},
	isClose: () => {
		console.log('closed');
	},
});