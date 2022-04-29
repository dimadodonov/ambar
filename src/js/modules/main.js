import $ from 'jquery';

export default () => {
    (function ($) {
        var proQty = $('.pro-qty');
        proQty.append('<div class="inc qty-btn">+</div>');
        proQty.append('<div class= "dec qty-btn">-</div>');
        $('body').on('click', '.qty-btn', function (e) {
            e.preventDefault();
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            var step = $button.parent().find('input').attr('step');
            const btnOrder = $('.btn-order');
            if (!oldValue) {
                oldValue = 50;
            }
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + +step;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > +step) {
                    var newVal = parseFloat(oldValue) - +step;
                } else {
                    newVal = step;
                }
            }
            $button.parent().find('input').val(newVal).change();
            btnOrder.attr('data-quantity', newVal);
        });

        $(document).on('updated_cart_totals', function () {
            $('.pro-qty').append(
                '<a href="#" class="inc qty-btn">+</a><a href="#" class= "dec qty-btn">-</a>'
            );
        });

        $(document).on('click', '.qty-btn', function () {
            $("[name='update_cart']").trigger('click');
        });

        $('div.woocommerce').on('change', '.qty', function () {
            $("[name='update_cart']").trigger('click');
        });
    })(jQuery.noConflict());

    var sttElem = document.querySelector('.gotop');
    var screanHeight = window.innerHeight;

    var sttScroll = function sttScroll() {
        document.addEventListener('scroll', function (e) {
            if (screanHeight <= window.scrollY) {
                sttElem.classList.add('show');
            } else if (e.target.scrollingElement.scrollTop <= screanHeight) {
                sttElem.classList.remove('show');
                sttElem.style.pointerEvents = 'auto';
            }
        });
    };

    var sttClick = function sttClick() {
        sttElem.addEventListener('click', function () {
            var docHeight = window.scrollY;
            var progress = 0;
            var position = docHeight;
            var speed = 5; // When increasing this value. The scrolling speed will increase

            sttElem.style.pointerEvents = 'none';

            var sttAnim = function sttAnim() {
                progress += 1;
                position -= progress * speed;
                window.scrollTo(0, position);

                if (position > 0) {
                    requestAnimationFrame(sttAnim);
                }
            };

            requestAnimationFrame(sttAnim);
        });
    };

    var sttFunc = function sttFunc() {
        sttScroll();
        sttClick();
    };

    sttFunc();
};
