document.addEventListener("DOMContentLoaded", function () {
    initMobileMenu();
    initSwiper();


    function initMobileMenu() {
        const menuBurger = document.querySelector('.menu-burger');
        const menu = document.querySelector('.header-menu');
        const body = document.querySelector('body');

        menuBurger.addEventListener('click', function () {
            this.classList.toggle('active');
            menu.classList.toggle('active');
            body.classList.toggle('_lock');

        });

    }

    function initSwiper() {
        let swiper = new Swiper(".clients-swiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            speed: 800,
            loop: true,
            effect: "fade",
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 5500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,

            },
        });
    }


    Fancybox.bind("[data-fancybox]", {
    });


});

