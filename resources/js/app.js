import './bootstrap';

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

const swiper = new Swiper('.book-swiper', {
    modules: [Navigation, Pagination, Autoplay],
    loop: true,
    autoplay: {
        delay: 5000,
    },


    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1200: {
            slidesPerView: 3,
        },

        1600: {
            slidesPerView: 4,
        },
    }
});
