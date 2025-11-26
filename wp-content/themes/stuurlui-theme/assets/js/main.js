import '../css/main.css';

import '@fortawesome/fontawesome-free/js/all.js';

import initSwiper from './_swiper';
import initDropdown from './_dropdown';
import searchFormInit from './_search-form';

document.addEventListener('DOMContentLoaded', function () {
  for (const swiperElement of document.querySelectorAll('.swiper')) {
    initSwiper(swiperElement);
  }

  for (const dropdownElement of document.querySelectorAll('.dropdown')) {
    initDropdown(dropdownElement);
  }

  for (const searchFormElement of document.querySelectorAll('form.search-form')) {
    searchFormInit(searchFormElement);
  }
});
