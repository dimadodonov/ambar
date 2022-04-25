<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}

if ( ! function_exists( 'ep_start_loop' ) ) {
    /**
     * Product columns wrapper close.
     *
     * @return  void
     */
    function ep_start_loop() {

    }
}
add_action( 'woocommerce_before_shop_loop', 'ep_start_loop', 35, 2);

if ( ! function_exists( 'ep_end_loop' ) ) {
    /**
     * Product columns wrapper close.
     *
     * @return  void
     */
    function ep_end_loop() {
    }
}
add_action( 'woocommerce_after_shop_loop', 'ep_end_loop', 40 );