<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}


register_nav_menus( array(
    'primary' => 'Основное',
    'primary' => 'Основное',
    'aside' => 'Сайтбар',
    'aside' => 'Сайтбар'
));


function header_menu_primary() {
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'menu_id' => 'primary_menu',
	    'container'       => 'nav',
        'container_class' => 'nav',
        'container_id'    => '',
        'menu_class'      => 'nav__wrap',
        'menu_id'         => '',
    ));
}

function aside_menu_primary() {
    wp_nav_menu( array(
        'theme_location' => 'aside',
        'menu_id' => 'aside_menu',
	    'container'       => 'div',
        'container_class' => 'aside-nav',
        'container_id'    => '',
        'menu_class'      => 'aside-nav',
        'menu_id'         => '',
    ));
}