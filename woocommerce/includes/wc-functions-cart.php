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
        <div class="cart-mini cart-customlocation<?php if ($cartEmpty > 0) { echo ' active';} ?>"><span><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></span></div>
    <?php $fragments['.cart-customlocation'] = ob_get_clean();
    return $fragments;
}

/**
 * @snippet       Добавление кнопки очистки корзины
 * @author        Миша Рудрастых
 * @url           https://misha.agency/woocommerce/kak-dobavit-knopku-ochistit-korzinu.html
 */
add_action( 'woocommerce_cart_actions', 'true_empty_cart_btn' );
 
function true_empty_cart_btn(){
 
	echo '<a class="update_cart button" href="' . wc_get_cart_url() . '?empty-cart">Очистить корзину</a>';
 
}
 
add_action( 'init', 'true_empty_cart' );
function true_empty_cart() {
 
	if ( isset( $_GET[ 'empty-cart' ] ) ) {
		WC()->cart->empty_cart();
	}
 
}