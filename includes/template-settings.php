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

## Поиск записей в админке на ajax (без перезагрузки) https://codyshop.ru/kak-dobavit-ajax-poisk-po-saytu-na-wordpress-bez-plaginov/
add_action( 'admin_print_footer_scripts', 'cody_search_posts_in_admin' );
function cody_search_posts_in_admin() {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		function cody_ajax_admin_search_update_search() {
			s = a.val().replace(' ', '+');
			var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			for (var i = 0; i < url.length; i++) {
				if (/(^s$)|(\bs=.*\b)|(\bs=)/g.test(url[i]) === true || /http.*/g.test(url[i]) === true) y = i;
			}
			if (typeof y === 'undefined') url.unshift('s=' + s);
			else url[y] = 's=' + s;
			url = url.join('&');
			url = window.location.pathname + '?' + url;
			$.get(url, {}, function(data) {
				var r = $('<div />').html(data);
				var table = r.find(z);
				var tablenav_top = r.find(tnt);
				var tablenav_bottom = r.find(tnb);
				$(z).html(table);
				$(tnt).html(tablenav_top);
				$(tnb).html(tablenav_bottom);
			}, 'html');
			$(document).ajaxStop(function() {
				if (s.length) {
					history.pushState({}, "after search", url);
				} else {
					history.pushState({}, "empty search", url);
				}
			});
		}
		$(function() {
			a = $('input[type="search"]');
			t = a.closest('form').find('table');
			if (!t.length) t = a.closest('div').find('table');
			if (!t.length) return;
			z = '.' + t.attr('class').replace(/\s/g, '.');
			tn = '.top .displaying-num';
			bn = '.bottom .displaying-num';
			tpl = '.top span.pagination-links';
			bpl = '.bottom span.pagination-links';
			tnt = '.tablenav.top';
			tnb = '.tablenav.bottom';
			var timer;
			a.on('keyup', function(event) {
				if (timer) clearTimeout(timer);
				timer = setTimeout(cody_ajax_admin_search_update_search, 300);
			});
		});
	});
	</script>
	<?php
}

## Создание поисковой строки в списках категорий
add_action( 'admin_print_scripts', 'cody_admin_category_filter', 99 );
function cody_admin_category_filter() {
	
	$screen = get_current_screen();
	if( 'post' !== $screen->base ) return;
	
	?>
	<script>
	jQuery( document ).ready( function( $ ){
		var $div = $( '.categorydiv' );
		$div.prepend( '<input type="search" class="fc-search-field" placeholder="<?php _e( 'Фильтр', 'theme' ); ?>" style="width:100%" />' );
		$div.on( 'keyup search', '.fc-search-field', function ( event ) {
			var searchTerm = event.target.value,
				$listItems = $( this ).parent().find( '.categorychecklist li' );

			if( $.trim( searchTerm ) ){
				$listItems.hide().filter( function () {
					return $( this ).text().toLowerCase().indexOf( searchTerm.toLowerCase() ) !== -1;
				} ).show();
			} else {
				$listItems.show();
			}
		} );
	} );
	</script>
	<?php
}