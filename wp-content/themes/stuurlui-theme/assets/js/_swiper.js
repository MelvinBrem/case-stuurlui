import { Swiper } from 'swiper';
import { Autoplay, Pagination } from 'swiper/modules';

function initSwiper(swiperElement) {
  const swiperSettings = swiperElement.getAttribute('data-swiper-settings');
  new Swiper(swiperElement, {
    ...JSON.parse(swiperSettings),
    modules: [Autoplay, Pagination],
  });
}

export default initSwiper;
