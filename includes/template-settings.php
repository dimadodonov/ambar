<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}

/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );
add_theme_support( 'woocommerce' );

//        add_theme_support( 'wc-product-gallery-zoom' );
//        add_theme_support( 'wc-product-gallery-lightbox' );
//        add_theme_support( 'wc-product-gallery-slider' );

// disable flexslider js
function flex_dequeue_script() {
    wp_dequeue_script( 'flexslider' );
}
add_action( 'wp_print_scripts', 'flex_dequeue_script', 100 );

// disable zoom jquery js file
function zoom_dequeue_script() {
    wp_dequeue_script( 'zoom' );
}
add_action( 'wp_print_scripts', 'zoom_dequeue_script', 100 );

// disable photoswipe js file
function photoswipe_dequeue_script() {
    wp_dequeue_script( 'photoswipe-ui-default' );
}
add_action( 'wp_print_scripts', 'photoswipe_dequeue_script', 100 );

// Включаем миниатюры в записях
add_theme_support('post-thumbnails');

// Отключение scaling & Disabling the scaling
add_filter( 'big_image_size_threshold', '__return_false' );


## Добавляем свой размер для миниатюр
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'product', 1024, 1024, true );
}

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});