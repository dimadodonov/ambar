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

    const sliderNav = new Swiper('.sliderNav', {
        slidesPerView: 'auto',
        spaceBetween: 10,
        freeMode: true,
    });

    // thumbs.addEventListener('click', function () {
    //     sliderNav.slideTo(0);
    // });

    function isElementVisible(el) {
        var rect = el.getBoundingClientRect(),
            vWidth = window.innerWidth || doc.documentElement.clientWidth,
            vHeight = window.innerHeight || doc.documentElement.clientHeight,
            efp = function (x, y) {
                return document.elementFromPoint(x, y);
            };

        // Return false if it not in the viewport
        if (
            rect.right < 0 ||
            rect.bottom < 0 ||
            rect.left > vWidth ||
            rect.top > vHeight
        )
            return false;

        // Return true if any of its four corners are visible
        return (
            el.contains(efp(rect.left, rect.top)) ||
            el.contains(efp(rect.right, rect.top)) ||
            el.contains(efp(rect.right, rect.bottom)) ||
            el.contains(efp(rect.left, rect.bottom))
        );
    }

    window.addEventListener('scroll', function () {
        document.querySelectorAll('.catalog-loop').forEach((el, index) => {
            if (isElementVisible(el)) {
                // console.log(index);
                sliderNav.slideTo(index);
            }
        });
    });
};
