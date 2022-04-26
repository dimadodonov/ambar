<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}


register_nav_menus( array(
    'primary' => 'Основное',
    'primary' => 'Основное'
));


function header_menu_primary() {
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'menu_id' => 'primary_menu',
	    'container'       => 'div',
        'container_class' => 'nav-menu__wrap',
        'container_id'    => 'nav-menu__wrap',
        'menu_class'      => 'nav-menu',
        'menu_id'         => 'nav-menu',
    ));
}