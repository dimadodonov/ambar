<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}

/**
 * Header hooks
 *
 * @see  hook_header
 */

add_action( 'hook_header', 'hook_header',                       10 );
add_action( 'hook_header', 'hook_nav',                          20 );

/**
 * Home Page hooks
 *
 * @see  hook_page_before
 * @see  hook_section_intro
 * @see  hook_page_after
 */

add_action( 'hook_home', 'hook_page_before',                    10 );
add_action( 'hook_home', 'hook_intro',                          20 );
add_action( 'hook_home', 'hook_home_category',                  30 );
add_action( 'hook_home', 'hook_section_sale_news',              40 );
add_action( 'hook_home', 'hook_section_loop',                   50 );
add_action( 'hook_home', 'hook_section_edge',                   60 );
add_action( 'hook_home', 'hook_section_leadform',               70 );
add_action( 'hook_home', 'hook_page_after',                     80 );


/**
 * Footer hooks
 *
 * @see  hook_section_contacts
 * @see  hook_order_popup
 * @see  hook_footer
 */

add_action( 'hook_footer', 'hook_section_contacts',             10 );
add_action( 'hook_footer', 'hook_footer',                       30 );