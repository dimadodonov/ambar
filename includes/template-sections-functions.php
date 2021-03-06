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
                <div class="header__wrap">
                    <a class="header-phone" href="tel:+79272257474">
                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--phone"/></svg>
                    </a>
                    <?php if(is_home()) { ?><div class="header-logo"></div> <?php } else { ?><a class="header-logo" href="<?php echo site_url(); ?>"></a><?php }; ?>
                    <div class="header-nav">
                        <div class="hamburger"></div>
                    </div>
                </div>
            </header>
        <?php
    }
}

if ( ! function_exists( 'hook_nav' ) ) {
    /**
     * Display Hooks Nav
     */
    function hook_nav() { ?>
        <div class="nav">
            <div class="nav__title">Меню</div>
            <?php echo header_menu_primary(); ?>
            <div class="nav__phone">
                <a href="tel:+79272257474">+7(927)225-74-74</a>
            </div>
            <div class="nav-social social">
                <div class="social__wrap">
                    <a class="social-item" href="https://vk.com/barambar64" target="_blank">
                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-vk"/></svg>
                    </a>
                </div>
            </div>
            <div class="nav__dev"><a href="https://mitroliti.ru" target="_blank" title="Сайт разработан в компании - mitroliti">Разработано в <strong>mitroliti</strong></a></div>
        </div>
    <?php }
}

if ( ! function_exists( 'hook_mob_nav' ) ) {
    add_filter('wp_footer', 'hook_mob_nav');
    /**
     * Display Hooks Nav
     */
    function hook_mob_nav() { ?>
    <?php }
}

if ( ! function_exists( 'hook_start_menu' ) ) {
    /**
     * Display hook start menu
     */
    function hook_start_menu() { ?>
        <div class="nav action">
            <div class="nav__title">Меню</div>
            <?php echo header_menu_primary(); ?>
            <div class="nav__phone">
                <a href="tel:+79272257474">+7(927)225-74-74</a>
            </div>
            <div class="nav-social social">
                <div class="social__wrap">
                    <a class="social-item" href="https://vk.com/barambar64" target="_blank">
                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-vk"/></svg>
                    </a>
                </div>
            </div>
            <div class="nav__dev"><a href="https://mitroliti.ru" target="_blank" title="Сайт разработан в компании - mitroliti">Сделано с помощью <strong>mitroliti</strong></a></div>
        </div>
    <?php }
}

if ( ! function_exists( 'hook_section_intro' ) ) {
    /**
     * Display Hooks Section Intro
     */
    function hook_section_intro() { ?>
    <section class="section section-intro">
        <div class="container">
            <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/slider/slide.webp" type="image/webp">
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/slider/slide.jpg" type="image/jpeg"> 
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/section/slider/slide.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
            </picture>
        </div>
    </section>
    <?php }
}

if ( ! function_exists( 'hook_section_event' ) ) {
    /**
     * Display Hooks Section event
     */
    function hook_section_event() { ?>
    <section class="section section-event">
        <div class="container">
            <div class="swiper sliderEvent">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/section/event/event.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>"></div>
                    <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/section/event/event.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>"></div>
                    <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/section/event/event.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>"></div>
                    <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/section/event/event.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>"></div>
                    <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/section/event/event.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>"></div>
                    <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/section/event/event.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <?php }
}

if ( ! function_exists( 'hook_section_catalog' ) ) {
    /**
     * Display Hooks Section catalog
     */
    function hook_section_catalog() { 
        $queried_object = get_queried_object();
        $term_id = $queried_object->term_id;
        $term_name = $queried_object->name;
    ?>
    <section class="section section-catalog">
        <div id="menu" class="section-catalog__title">
            <?php echo $term_name; ?>
        </div>
                
        <?php

            $args = array(
                'parent' => $term_id,
                'order' => 'ASC',
                'hide_empty' => false,
            );
            $terms = get_terms('product_cat', $args);
            if($terms){ ?>
                    
                <div class="catalog-nav">
                    <div class="catalog-nav__wrap">
                        <div class="catalog-nav__list">
                            
                        <div class="swiper sliderNav">
                            <div class="swiper-wrapper">

                            <?php foreach ($terms as $term){

                                // get the thumbnail id using the queried category term_id
                                $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);

                                // get the image URL
                                $image = wp_get_attachment_url( $thumbnail_id ); 

                                ?>
                                    <div class="swiper-slide">
                                        <a class="catalog-nav__item scroll-item" href="<?php echo '#cat_' . $term->slug; ?>">
                                            <?php 
                                                if($thumbnail_id) : 
                                                    echo '<div class="catalog-nav__icon"><img src="' . $image . '" alt="" width="100" height="100" /></div>';
                                                    else :
                                                        $placeholder = wc_placeholder_img_src( 'thumbnail' );
                                                    echo '<div class="catalog-nav__icon"><img src="' . $placeholder . '" alt="" width="100" height="100" /></div>';

                                                endif;
                                            ?>
                                            
                                            <div class="catalog-nav__title"><?=$term->name;?></div>
                                        </a>
                                    </div>
                                <?php
                                
                            } ?>

                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>

                <?php foreach ($terms as $cat_term) :
                    catalogloop($cat_term->slug, $cat_term->name, $cat_term->description);
                endforeach; ?>

            <?php } ?>
    </section>
    <?php }
}

if ( ! function_exists( 'catalogloop' ) ) {
    /**
     * Display Hooks catalogloop
     */
    function catalogloop($term, $name, $desc) {

        $args = array(
            'post_type' => 'product',
            'product_cat' => $term,
            'post_status' => 'publish',
            'posts_per_page' => 99,                            
            'order' => 'ASC',
        );

        $news_query = new WP_Query( $args );

        if ($news_query->have_posts()) : ?>

            <div id="<?php echo 'cat_' . $term; ?>" class="catalog-loop">
                <div class="catalog-loop__title"><?php echo $name; ?></div>
                <div class="catalog-loop__subtitle"><?php echo $desc; ?></div>
                <div class="catalog-loop__wrap">

                    <?php while ($news_query->have_posts()) :

                            $news_query->the_post();

					        wc_get_template_part( 'content', 'product' );

                    endwhile; ?>

                </div>
            </div>

        <?php endif; ?>

        <?php wp_reset_query(); // Remember to reset
    }
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

if ( ! function_exists( 'hook_mini_cart' ) ) {
    add_filter('wp_footer', 'hook_mini_cart');
    /**
     * Display Hooks Mini Cart
     */
    function hook_mini_cart() {
        if(is_cart()) : ?>

            <div class="cart-mini active">
                <div class="cart-mini__totalprice">
                <?php 
                    $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
                    ?>
                        <a class="cart-mini__link" href="<?php echo esc_url( $shop_page_url ); ?>">
                            К меню
                        </a>
                </div>
            </div>
            
        <?php else : 
            ?>
            <div class="cart-mini cart-customlocation">
                <div class="cart-mini__totalprice">
                    <a class="cart-mini__price" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                        Заказ / <?php $ordertotal = wp_kses_data( WC()->cart->get_total() ); echo $ordertotal; ?>
                    </a>
                </div>
            </div>

        <?php endif;
    }
}

if ( ! function_exists( 'hook_callback' ) ) {
    add_filter('wp_footer', 'hook_callback');
    /**
     * Display Hooks gotop
     */
    function hook_callback() {
    }
}