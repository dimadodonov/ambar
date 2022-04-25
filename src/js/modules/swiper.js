import Swiper from 'swiper/swiper-bundle.min';

export default () => {
    const sliderEvent = new Swiper('.sliderEvent', {
        slidesPerView: 2,
        spaceBetween: 10,
        freeMode: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
};
