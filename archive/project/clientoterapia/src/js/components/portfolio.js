import Swiper, { Navigation, Pagination } from 'swiper';

Swiper.use([Navigation, Pagination]);

const site = new Swiper(".site", {
  slidesPerView: 3,
  spaceBetween: 30,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    990: {
      slidesPerView: 1,
    },
    991: {
      slidesPerView: 3,
    },
  },

});

/* if(window.innerWidth < 990){
  $('.work__header').appendTo('.swiper-wrapper');
} */

/* const smm = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});

const context = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});

const branding = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});

const presentation = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});

const polygraphy = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

}); */