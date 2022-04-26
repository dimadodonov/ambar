export default () => {
    document.querySelectorAll('a[href^="#"').forEach((link) => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            let href = this.getAttribute('href').substring(1);

            const scrollTarget = document.getElementById(href);

            // const topOffset = document.querySelector('.scrollto').offsetHeight;
            const topOffset = 120; // если не нужен отступ сверху
            const elementPosition = scrollTarget.getBoundingClientRect().top;
            const offsetPosition = elementPosition - topOffset;

            window.scrollBy({
                top: offsetPosition,
                behavior: 'smooth',
            });
        });
    });

    const header = document.querySelector('.header');
    const catNavClass = document.querySelector('.catalog-nav');

    let catNav = 0;
    if (catNavClass) {
        catNav = catNavClass.getBoundingClientRect().top;
    }
    const catNavWrap = document.querySelector('.catalog-nav__wrap');

    let scrollPos = 0;
    window.addEventListener('scroll', function () {
        const headerHeight = header.clientHeight;
        const sT = window.scrollY;

        if (sT > 15) {
            header.classList.add('down');
        } else {
            header.classList.remove('down');
        }

        if (catNavClass) {
            if (sT > catNav - headerHeight) {
                catNavWrap.classList.add('stiky');
            } else {
                catNavWrap.classList.remove('stiky');
            }
        }

        scrollPos = sT;
    });

    function menuEvent(event) {
        if (event === true) {
            document.querySelector('.hamburger').classList.toggle('animate');
            document.querySelector('.nav').classList.toggle('action');
            document.querySelector('body').classList.toggle('is-fixed');
        } else {
            document.querySelector('.hamburger').classList.remove('animate');
            document.querySelector('.nav').classList.remove('action');
            document.querySelector('body').classList.remove('is-fixed');
        }
    }

    document.querySelector('.header-nav').addEventListener('click', () => {
        menuEvent(true);
    });

    // document
    //     .querySelector('.home .header-logo')
    //     .addEventListener('click', () => {
    //         menuEvent(false);
    //     });

    document.querySelectorAll('.menu-item a').forEach((link) => {
        link.addEventListener('click', function () {
            menuEvent(false);
        });
    });
};
