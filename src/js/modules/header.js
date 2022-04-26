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
    let catNav = document
        .querySelector('.catalog-nav')
        .getBoundingClientRect().top;
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

        if (sT > catNav - headerHeight) {
            catNavWrap.classList.add('stiky');
        } else {
            catNavWrap.classList.remove('stiky');
        }

        scrollPos = sT;
    });

    document.querySelector('.header-nav').addEventListener('click', (e) => {
        document.querySelector('.hamburger').classList.toggle('animate');
    });
};
