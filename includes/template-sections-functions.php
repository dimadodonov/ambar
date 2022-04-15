<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}

if ( ! function_exists( 'hook_header' ) ) {
    /**
     * Display Hooks Header
     */
    function hook_header() {
        ?>
            <header id="header" class="header">
            </header>
        <?php
    }
}

if ( ! function_exists( 'hook_nav' ) ) {
    /**
     * Display Hooks Nav
     */
    function hook_nav() {
        echo header_menu_primary();
    }
}

if ( ! function_exists( 'hook_mob_nav' ) ) {
    add_filter('wp_footer', 'hook_mob_nav');
    /**
     * Display Hooks Nav
     */
    function hook_mob_nav() { ?>
    <?php }
}

if ( ! function_exists( 'hook_footer' ) ) {
    /**
     * Display Hooks Footer
     */
    function hook_footer() {
        ?>
            <footer id="footer" class="footer">
            </footer>
        <?php
    }
}

if ( ! function_exists( 'hook_page_before' ) ) {
    /**
     * Display Hooks PAge Before
     */
    function hook_page_before() {
        ?>
        <div class="page__wrapper">
          <main class="main">
        <?php
    }
}

if ( ! function_exists( 'hook_page_after' ) ) {
    /**
     * Display Hooks Page after
     */
    function hook_page_after() {
        ?>
          </main>
        </div>
        <?php
    }
}


if ( ! function_exists( 'hook_head_code' ) ) {

    add_filter('wp_body_open', 'hook_head_code');
    /**
     * Display Hooks Head Code
     */
    function hook_head_code() {}
}

if ( ! function_exists( 'google_analytics' ) ) {
    add_filter('wp_head', 'google_analytics');
    function google_analytics() {
        // echo get_field( 'google_analytics_solutions', 'option' );
    }
}
if ( ! function_exists( 'yandex_metrika' ) ) {
    add_filter('wp_footer', 'yandex_metrika');
    function yandex_metrika() {
        // echo get_field( 'yandex_metrika', 'option' );
    }
}

if ( ! function_exists( 'hook_gotop' ) ) {
    add_filter('wp_footer', 'hook_gotop');
    /**
     * Display Hooks gotop
     */
    function hook_gotop() {
        ?>
            <div id="gotop" class="gotop"><button><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-up"/></svg></button></div>
        <?php
    }
}

if ( ! function_exists( 'hook_callback' ) ) {
    add_filter('wp_footer', 'hook_callback');
    /**
     * Display Hooks gotop
     */
    function hook_callback() {
        ?>
            <div id="popup" class="popup popup-callback">
                <div class="popup__overlay"></div>
                <div class="popup__wrap">
                    <div class="popup__close"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--close"/></svg></div>
                    <div class="popup__header">
                        <div class="popup__title">Мы вам перезвоним!</div>
                        <div class="popup__subtitle">Просто оставьте телефон <br>и мы вам перезвоним</div>
                    </div>
                    <div class="popup__container">
                        <?php echo do_shortcode('[contact-form-7 id="95" title="Заказать обратный звонок"]'); ?>
                    </div>
                    <div class="popup__footer"><p class="popup-form__privacy"><span>Нажимая кнопку вы соглашаетесь с условиями <a href="#">Политика конфиденциальности</a></span></p></div>
                </div>
            </div>
        <?php
    }
}