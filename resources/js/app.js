import './bootstrap';

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()

import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.book-swiper', {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 3,
        // spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
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
});
