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