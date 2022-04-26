<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}

/**
 * Show cart contents / total Ajax
 */

add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment', 10, 1 );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    $cartEmpty = wp_kses_data(WC()->cart->get_cart_contents_count()); ?>
        <div class="cart-mini cart-customlocation<?php if ($cartEmpty > 0) { echo ' active';} ?>">
            <div class="cart-mini__totalprice">
                <?php 
                    if(is_page( 'cart' )) : 
                    $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
                    ?>
                        <a class="cart-mini__link" href="<?php echo esc_url( $shop_page_url ); ?>">
                            К меню
                        </a>
                    <?php else : ?>
                        <a class="cart-mini__price" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                            Заказ / <?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?> ₽
                        </a>
                    <?php endif;
                ?>
            </div>
        </div>
    <?php $fragments['.cart-customlocation'] = ob_get_clean();
    return $fragments;
}