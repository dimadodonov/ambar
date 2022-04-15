export default () => {
    let scrollPos = 0;

    window.addEventListener('scroll', function () {
        const sT = window.scrollY;
        const $header = document.querySelector('.header');

        if (sT > 100) {
            if (sT > scrollPos) {
                $header.classList.add('down');
                $header.classList.remove('up');
            } else {
                $header.classList.add('up');
                $header.classList.remove('down');
            }
        } else {
            $header.classList.add('up');
            $header.classList.remove('down');
        }

        scrollPos = sT;
    });
};
