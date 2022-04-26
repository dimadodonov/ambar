<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}

function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 12;
	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'main_related_products_args', 20 );
  function main_related_products_args( $args ) {
	$args['posts_per_page'] = 12; // 4 related products
	return $args;
}