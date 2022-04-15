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
                    <div class="header-logo">
                        <?php if(is_home()) { ?><div class="header-logo__images"><?php } else { ?><a class="header-logo__images" href="<?php echo site_url(); ?>"><?php }; ?>
                            <picture>
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" type="image/webp">
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" type="image/jpeg"> 
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php echo get_bloginfo( 'title' ); ?>">
                            </picture>
                        <?php if(is_home()) { ?></div><?php } else { ?></a><?php }; ?>
                        <div class="header-logo__desc">
                            <span>Производство и оптовые продажи хозяйственных и банных изделий</span>
                        </div>
                    </div>
                    <div class="header-contacts">
                        <div class="header-contacts__item header-contacts__phone">

                            <a href="tel:+79370290777" class="header-contacts__icon">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--phone"/></svg>
                            </a>

                            <div class="header-contacts__wrap">
                                <span class="header-contacts__callback initpopup" data-popup="callback">Заказать обратный звонок</span>
                                <a href="tel:+79370290777">
                                    <span class="phone">+7 937 029-07-77</span>
                                </a>

                                <?php
                                    // date_default_timezone_set("Europe/Moscow");
                                    date_default_timezone_set("Europe/Saratov");
                                    $currentTime = date('H');
                                ?>
                                <div class="worktime">
                                    <ins class="<?php if ($currentTime >= 9 && $currentTime < 18) : echo 'open'; else : echo 'close'; endif; ?>"></ins>
                                    <span>Пн-Пт: 9:00 - 18:00</span>
                                </div>
                            </div>

                        </div>
                        <a class="header-contacts__item header-contacts__email" href="mailto:info@eco-price.ru">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--mail"/></svg>
                            <span class="mail">info@eco-price.ru</span>
                        </a>
                    </div>
                    <div class="header-shop-panel">
                        <a href="<?php echo esc_url( site_url('/auth/orders') )?>" class="header-shop-panel__item header-shop-panel__orders">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--shop-orders"/></svg>
                            <span>Заказы</span>
                        </a>
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="header-shop-panel__item header-shop-panel__login">
                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--shop-user"/></svg>
                            <?php if ( !is_user_logged_in() ) : ?>
                                <span>Войти</span>
                            <?php else: ?>
                                <span>Профиль</span>
                            <?php endif; ?>
                        </a>
                        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-shop-panel__item">
                            <div class="header-shop-panel__cart">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--shop-cart"/></svg>
                                <?php $cartEmpty = wp_kses_data(WC()->cart->get_cart_contents_count()); ?>
                                <div class="count cart-customlocation<?php if ($cartEmpty > 0) { echo ' active';} ?>"><span><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></span></div>
                            </div>
                            <span>Корзина</span>
                        </a>
                        <div class="header-shop-panel__menu">
                            <div class="hamburger"></div>
                        </div>
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
        <div class="mob-menu">
            <div class="mob-menu__overlay"></div>
            <div class="mob-menu__wrap">
                <div class="mob-menu__header">
                    <div class="mob-menu__title"><span>Меню</span></div>
                    <div class="mob-menu__close"></div>
                </div>
                <div class="mob-menu__content">
                    <div class="mob-category">
                        <a class="mob-category__item" href="<?php echo site_url( '/catalog-cat/nit-polipropilenovaya' ); ?>">
                        <div class="mob-category__img">
                            <picture>
                                <source media="(max-width: 800px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/nitka.webp" type="image/webp">
                                <source media="(max-width: 800px)"  srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/nitka.jpg" type="image/jpeg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/nitka.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                            </picture>
                        </div>
                        <div class="mob-category__title">Нить полипропиленовая</div>
                        <div class="mob-category__arrow"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-mobmenu"/></svg></div>
                    </a>
                    <a class="mob-category__item" href="<?php echo site_url( '/catalog-cat/mochalki-optom' ); ?>">
                        <div class="mob-category__img">
                            <picture>
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/mochalka.webp" type="image/webp">
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/mochalka.jpg" type="image/jpeg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/mochalka.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                            </picture>
                        </div>
                        <div class="mob-category__title">Мочалки для тела</div>
                        <div class="mob-category__arrow"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-mobmenu"/></svg></div>
                    </a>
                    <a class="mob-category__item" href="<?php echo site_url( '/catalog-cat/tapochki' ); ?>">
                        <div class="mob-category__img">
                            <picture>
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/tapochki.webp" type="image/webp">
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/tapochki.jpg" type="image/jpeg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/tapochki.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                            </picture>
                        </div>
                        <div class="mob-category__title">Массажные тапочки</div>
                        <div class="mob-category__arrow"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-mobmenu"/></svg></div>
                    </a>
                    <a class="mob-category__item" href="<?php echo site_url( '/catalog-cat/shapki-dlya-bani-i-sauny' ); ?>">
                        <div class="mob-category__img">
                            <picture>
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/shapki.webp" type="image/webp">
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/shapki.jpg" type="image/jpeg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/shapki.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                            </picture>
                        </div>
                        <div class="mob-category__title">Шапки для бани и сауны</div>
                        <div class="mob-category__arrow"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-mobmenu"/></svg></div>
                    </a>
                        <div class="mob-category__btn">
                            <a href="<?php echo site_url('/catalog'); ?>">Перейти в каталог</a>
                        </div>
                    </div>


                    <div class="mob-menu__content-backgound">
                        <div class="mob-menu__nav">
                            <?php header_menu_primary(); ?>
                        </div>

                        <div class="mob-menu-contact">
                            <a class="mob-menu-contact__item" href="tel:+79370290777">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--phone"/></svg>
                                <span>+7 937 029-07-77</span>
                            </a>
                            <a class="mob-menu-contact__item" href="mailto:info@eco-price.ru">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--mail"/></svg>
                                <span>info@eco-price.ru</span>
                            </a>
                        </div>
                        
                        <div class="social">
                            <a class="social-item" href="https://www.instagram.com/ecoprice/" target="_blank">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-instagram"/></svg>
                            </a>
                            <a class="social-item" href="https://www.facebook.com/Eco-price-105137568561550" target="_blank">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-facebook"/></svg>
                            </a>
                            <a class="social-item" href="https://vk.com/club135971363" target="_blank">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-vk"/></svg>
                            </a>
                            <a class="social-item" href="https://ok.ru/group/53533987438815" target="_blank">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-ok"/></svg>
                            </a>
                            <a class="social-item" href="#" target="_blank">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-youtube"/></svg>
                            </a>
                            <!-- <a class="social-item" href="#" target="_blank">
                                <svg><use xlink:href="<?php // echo get_template_directory_uri(); ?>/assets/files/sprites/sprite-mono.svg#icon--social-telegram"/></svg>
                            </a> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="mob-menu__footer">4724574</div> -->
            </div>
        </div>
    <?php }
}

if ( ! function_exists( 'hook_footer' ) ) {
    /**
     * Display Hooks Footer
     */
    function hook_footer() {
        ?>
            <footer id="footer" class="footer">
                <div class="footer__wrap">
                    <div class="footer__menu">
                        <div class="footer-nav">
            
                            <div class="footer-nav__item">
                                <h4 class="footer-nav__title">
                                    Компания
                                </h4>
                                <ul>
                                    <li>
                                        <a href="<?php echo site_url( '/aboutcomp' ); ?>">О компании</a>
                                    </li>
                                    <li style="display: none;">
                                        <a href="<?php echo site_url( '/rabota' ); ?>">Вакансии</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url( '/news' ); ?>">Новости</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url( '/privacy' ); ?>">Политика конфиденциальности</a>
                                    </li>
                                </ul>
                            </div>
            
                            <div class="footer-nav__item">
                                <h4 class="footer-nav__title">
                                    Категории
                                </h4>
                                <ul>
                                    <li>
                                        <a href="<?php echo site_url( '/catalog-cat/nit-polipropilenovaya' ); ?>">Нить полипропиленовая</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url( '/catalog-cat/mochalki-optom' ); ?>">Мочалка для тела</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url( '/catalog-cat/tapochki' ); ?>">Массажные тапочки</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url( '/catalog-cat/shapki-dlya-bani-i-sauny' ); ?>">Шапки для бани и сауны</a>
                                    </li>
                                </ul>
                            </div>
            
                            <div class="footer-nav__item">
                                <h4 class="footer-nav__title">
                                    Клиентам
                                </h4>
                                <ul>
                                    <li style="display: none;">
                                        <a href="<?php echo site_url( '/howto' ); ?>">Как оформить заказ</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url( '/delivery' ); ?>">Доставка товара</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url( '/delivery#payment' ); ?>">Оплата товара</a>
                                    </li>
                                    <li style="display: none;">
                                        <a href="<?php echo site_url( '/receiving' ); ?>">Получение товара</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url( '/faq' ); ?>">Часто задаваемые вопросы</a>
                                    </li>
                                </ul>
                            </div>
            
                            <div class="footer-nav__item">
                                <h4 class="footer-nav__title">
                                    Контакты
                                </h4>
                                <ul>
                                    <li>
                                        Телефон: <a href="tel:+79370290777">+7 937 029-07-77</a>
                                    </li>
                                    <li>
                                        E-mail: <a href="mailto:info@eco-price.ru">info@eco-price.ru</a>
                                    </li>
                                    <li>
                                        <a href="https://yandex.ru/maps/-/CCUyfAUt9C" target="_blank">Саратовская обл., Балаково, <br>ул. Транспортная, 3А/2</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url( '/contacts' ); ?>">Все контакты</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="footer__bottom">
                        <hr>
                        <div class="footer__social social">
                            <a class="social-item" href="https://www.instagram.com/ecoprice/" target="_blank">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-instagram"/></svg>
                            </a>
                            <a class="social-item" href="https://www.facebook.com/Eco-price-105137568561550" target="_blank">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-facebook"/></svg>
                            </a>
                            <a class="social-item" href="https://vk.com/club135971363" target="_blank">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-vk"/></svg>
                            </a>
                            <a class="social-item" href="https://ok.ru/group/53533987438815" target="_blank">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-ok"/></svg>
                            </a>
                            <a class="social-item" href="#" target="_blank">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--social-youtube"/></svg>
                            </a>
                            <!-- <a class="social-item" href="#" target="_blank">
                                <svg><use xlink:href="<?php // echo get_template_directory_uri(); ?>/assets/files/sprites/sprite-mono.svg#icon--social-telegram"/></svg>
                            </a> -->
                        </div>
                        <div class="footer__copy">
                            <div>
                                <strong>©</strong> <?php echo current_time('Y'); ?>  «ООО Эко-прайс».
                            </div>
                            <a class="footer__dev" href="https://mitroliti.ru/" target="_blank" title="Сайт разработан в компании - mitroliti">Разработано в <strong>Mitroliti</strong>.</a>
                        </div>
                        
                    </div>
                </div>
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

if ( ! function_exists( 'hook_intro' ) ) {
    /**
     * Display Hooks intro
     */
    function hook_intro() {
        ?>
        <div class="section section-intro">
            <div class="section-intro__wrap section-intro__home">
                <h1>Обеспечим магазины и SPA-заведения <ins>банными и хозяйственными изделиями</ins></h1>
                <span>Берите больше - платите меньше!</span>
                <a href="<?php echo site_url('/catalog'); ?>" class="btn btn-accent"><ins>Перейти в каталог</ins></a>
            </div>
            <div class="section-intro__image">
                <picture>
                    <source media="(max-width: 800px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/section-intro-home-xs.webp" type="image/webp">
                    <source media="(max-width: 1680px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/section-intro-home-lg.webp" type="image/webp">
                    <source media="(max-width: 1920px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/section-intro-home-hd.webp" type="image/webp">
                    <source media="(max-width: 800px)"  srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/section-intro-home-xs.jpg" type="image/jpeg"> 
                    <source media="(max-width: 1680px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/section-intro-home-lg.jpg" type="image/jpeg"> 
                    <source media="(max-width: 1920px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/section-intro-home-hd.jpg" type="image/jpeg"> 
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/section/section-intro-home-hd.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                </picture>
            </div>
        </div>
        <?php
    }
}

if ( ! function_exists( 'hook_home_category' ) ) {
    /**
     * Display Hooks Home Category
     */
    function hook_home_category() {
        ?>
        <section class="section section-categories">
            <div class="section__wrap">
                <div class="categories">
                    <div class="categories__wrap">
                        <a class="categories-item" href="<?php echo site_url( '/catalog-cat/nit-polipropilenovaya' ); ?>">
                            <div class="categories-item__desc">
                                <div class="categories-item__title">Нить полипропиленовая</div>
                                <div class="categories-item__subtitle">С нами вам не придется переплачивать за таможню и ожидать долгую поставку из Китая</div>
                            </div>
                            <div class="categories-item__images">
                                <picture>
                                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/categories/nitka.webp" type="image/webp">
                                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/categories/nitka.jpg" type="image/jpeg"> 
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/categories/nitka.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                                </picture>
                            </div>
                        </a>
                        <a class="categories-item" href="<?php echo site_url( '/catalog-cat/mochalki-optom' ); ?>">
                            <div class="categories-item__desc">
                                <div class="categories-item__title">Мочалки</div>
                                <div class="categories-item__subtitle">От 30 видов мочалок из полипропиленовой нити.</div>
                            </div>
                            <div class="categories-item__images">
                                <picture>
                                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/categories/mochalki.webp" type="image/webp">
                                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/categories/mochalki.jpg" type="image/jpeg"> 
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/categories/mochalki.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                                </picture>
                            </div>
                        </a>
                        <a class="categories-item" href="<?php echo site_url( '/catalog-cat/tapochki' ); ?>">
                            <div class="categories-item__desc">
                                <div class="categories-item__title">Тапочки</div>
                                <div class="categories-item__subtitle">От 10 видов тапочек из полипропиленовой нити</div>
                            </div>
                            <div class="categories-item__images">
                                <picture>
                                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/categories/tapochki.webp" type="image/webp">
                                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/categories/tapochki.jpg" type="image/jpeg"> 
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/categories/tapochki.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                                </picture>
                            </div>
                        </a>
                        <a class="categories-item" href="<?php echo site_url( '/catalog-cat/shapki-dlya-bani-i-sauny' ); ?>">
                            <div class="categories-item__desc">
                                <div class="categories-item__title">Шапки</div>
                                <div class="categories-item__subtitle">29 банных шапок с узорами и надписями. Состав: 80% шерсть , 20% полиэфир</div>
                            </div>
                            <div class="categories-item__images">
                                <picture>
                                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/categories/shapki.webp" type="image/webp">
                                    <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/categories/shapki.jpg" type="image/jpeg"> 
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/categories/shapki.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                                </picture>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="mob-category">
                    <a class="mob-category__item" href="<?php echo site_url( '/catalog-cat/nit-polipropilenovaya' ); ?>">
                        <div class="mob-category__img">
                            <picture>
                                <source media="(max-width: 800px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/nitka.webp" type="image/webp">
                                <source media="(max-width: 800px)"  srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/nitka.jpg" type="image/jpeg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/nitka.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                            </picture>
                        </div>
                        <div class="mob-category__title">Нить полипропиленовая</div>
                        <div class="mob-category__arrow"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-mobmenu"/></svg></div>
                    </a>
                    <a class="mob-category__item" href="<?php echo site_url( '/catalog-cat/mochalki-optom' ); ?>">
                        <div class="mob-category__img">
                            <picture>
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/mochalka.webp" type="image/webp">
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/mochalka.jpg" type="image/jpeg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/mochalka.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                            </picture>
                        </div>
                        <div class="mob-category__title">Мочалки для тела</div>
                        <div class="mob-category__arrow"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-mobmenu"/></svg></div>
                    </a>
                    <a class="mob-category__item" href="<?php echo site_url( '/catalog-cat/tapochki' ); ?>">
                        <div class="mob-category__img">
                            <picture>
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/tapochki.webp" type="image/webp">
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/tapochki.jpg" type="image/jpeg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/tapochki.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                            </picture>
                        </div>
                        <div class="mob-category__title">Массажные тапочки</div>
                        <div class="mob-category__arrow"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-mobmenu"/></svg></div>
                    </a>
                    <a class="mob-category__item" href="<?php echo site_url( '/catalog-cat/shapki-dlya-bani-i-sauny' ); ?>">
                        <div class="mob-category__img">
                            <picture>
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/shapki.webp" type="image/webp">
                                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/shapki.jpg" type="image/jpeg">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mob/menu/shapki.jpg" alt="<?php echo get_bloginfo( 'title' ); ?>">
                            </picture>
                        </div>
                        <div class="mob-category__title">Шапки для бани и сауны</div>
                        <div class="mob-category__arrow"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-mobmenu"/></svg></div>
                    </a>
                </div>
            </div>
        </section>
        <?php
    }
}

if ( ! function_exists( 'hook_section_sale_news' ) ) {
    /**
     * Display Hooks Section Sale and news
     */
    function hook_section_sale_news() {
        // задаем нужные нам критерии выборки данных из БД
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 5,
        );

        $singleposts = new WP_Query( $args );

        // Цикл
        if ( $singleposts->have_posts() ) {
        ?>
        <section class="section section-articles articles">
            <div class="section__wrap">
                <h2>Акции</h2>

                <div class="section-articles__wrap">
                    <div class="swiper swiper-container section-articles-swiper">
                        <div class="swiper-wrapper">
                        <?php 
                            while ( $singleposts->have_posts() ) {
                            $singleposts->the_post(); 
                            $post_id = get_the_ID();
                                ?>
                                <div class="swiper-slide">
                                    <div class="section-articles-item">
                                        <div class="section-articles-item__wrap">
                                            <div class="section-articles-item__images">
                                                <?php if ( has_post_thumbnail()) { ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                                                    <?php the_post_thumbnail('medium'); ?>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                            <div class="section-articles-item__desc">
                                                <?php
                                                    if( has_term( 'sale', 'category', $post_id ) ) {
                                                        $post_term = 'Акция!';
                                                        $post_term_class = 'sale';
                                                    } 
                                                    elseif(has_term( 'news', 'category', $post_id )) {
                                                        $post_term = 'Новинка!';
                                                        $post_term_class = 'new';
                                                    } else {
                                                        $post_term = 'Статья';
                                                    }
                                                ?>
                                                <div class="section-articles-item__term <?php if($post_term_class) : echo $post_term_class; endif; ?>">
                                                    <?php if($post_term) : echo $post_term; endif; ?>
                                                </div>
                                                <div class="section-articles-item__title">
                                                    <ins><?php if($post_term) : echo $post_term; endif; ?></ins> <?php echo get_the_title(); ?>
                                                </div>

                                                <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="section-articles-item__btn">
                                                    <div class="btn btn-articles">Подробнее...</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } 
                        ?>
                        </div>
                        <div class="my-swiper-button-arrow my-swiper-button-next"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-next"/></svg></div>
                        <div class="my-swiper-button-arrow my-swiper-button-prev"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--arrow-prev"/></svg></div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        } else {
            // Постов не найдено
        }

        // Возвращаем оригинальные данные поста. Сбрасываем $post.
        wp_reset_postdata();
    }
}

if ( ! function_exists( 'hook_section_loop' ) ) {
    /**
     * Display Hooks Section Loop product
     */
    function hook_section_loop() {

        /**
         * Hook: woocommerce_before_shop_loop.
         *
         * @hooked wc_print_notices - 10
         * @hooked woocommerce_result_count - 20
         * @hooked woocommerce_catalog_ordering - 30
         */
        do_action( 'woocommerce_before_shop_loop' );


        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => 10,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                ),
            ),
        );

        $hitsLoop = new WP_Query( $args );

        if ($hitsLoop->have_posts()) : ?>

        <section class="section section-loop">
            <div class="section__wrap">
                <h2>Хиты продаж</h2>
                <div class="loop products">
                    <div class="loop__wrap loop-slider swiper">
                        <div class="swiper-wrapper">

                        <?php while ($hitsLoop->have_posts()) :

                            $hitsLoop->the_post();

                            echo '<div class="swiper-slide">';

                            wc_get_template_part( 'content', 'product-slider' );

                            echo '</div>';

                        endwhile; ?>

                        </div>
                        <div class="loop-swiper-button">
                            <div class="loop-swiper-button-arrow loop-swiper-button-prev"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--loop-next"/></svg></div>
                            <div class="loop-swiper-button-arrow loop-swiper-button-next"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--loop-next"/></svg></div>
                        </div>
                    </div>
                </div>
                <div class="section-loop__btn">
                    <a class="btn btn-loop" href="<?php echo site_url('/catalog'); ?>">Перейти в каталог</a>
                </div>
            </div>
        
        <?php endif; ?>

        <?php wp_reset_query(); // Remember to reset

        $args = array(
            'post_type' => 'product',
            'post_status' => 'draft',
            'posts_per_page' => 10,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                ),
            ),
        );

        $popularLoop = new WP_Query( $args );

        if ($popularLoop->have_posts()) : ?>

            <div class="section__wrap">
                <h2>Популярные товары</h2>
                <div class="loop products">
                    <div class="loop__wrap loop-slider swiper">
                        <div class="swiper-wrapper">

                        <?php while ($popularLoop->have_posts()) :

                            $popularLoop->the_post();

                            echo '<div class="swiper-slide">';

                            wc_get_template_part( 'content', 'product-slider' );

                            echo '</div>';

                        endwhile; ?>

                        </div>
                        <div class="loop-swiper-button">
                            <div class="loop-swiper-button-arrow loop-swiper-button-prev"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--loop-next"/></svg></div>
                            <div class="loop-swiper-button-arrow loop-swiper-button-next"><svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--loop-next"/></svg></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php endif; ?>

        <?php wp_reset_query(); // Remember to reset

        /**
         * Hook: woocommerce_after_shop_loop.
         *
         * @hooked woocommerce_pagination - 10
         */
        do_action( 'woocommerce_after_shop_loop' );

    }
}

if ( ! function_exists( 'hook_section_edge' ) ) {
    /**
     * Display Hooks Section Edge
     */
    function hook_section_edge() {
        ?>
        <section class="section section-edge">
            <div class="section__wrap">
                <h2>Держим цену ниже средней, <ins>за счет собственного производства</ins></h2>

                <div class="edge">
                    <div class="edge__wrap">
                        <div class="edge-item">
                            <div class="edge-item__icon">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-price"/></svg></div>
                            <div class="edge-item__title">Цена на товар ниже рыночной</div>
                            <div class="edge-item__desc">Отлаженное производство позволяет поставлять товар по самым низким ценам в РФ</div>
                            <div class="edge-item__link">Подробнее <a href="<?php echo site_url('/aboutcomp'); ?>">о компании</a></div>
                        </div>
                        <div class="edge-item">
                            <div class="edge-item__icon">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-partners"/></svg></div>
                            <div class="edge-item__title">Выгодное сотрудничество</div>
                            <div class="edge-item__desc">Постоянным крупным клиентам наша компания предлагает индивидуальные условия доставки и скидки.</div>
                            <div class="edge-item__link">Подробнее <a href="<?php echo site_url('/delivery'); ?>">о доставке и оплате</a></div>
                        </div>
                        <div class="edge-item">
                            <div class="edge-item__icon">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-custom"/></svg></div>
                            <div class="edge-item__title">Большой выбор цветов и размеров</div>
                            <div class="edge-item__desc">Изготовим изделия нужного вам цвета и размера, в нашем каталоге более 30 видов продукции</div>
                            <div class="edge-item__link">Перейти <a href="<?php echo site_url('/catalog'); ?>">в каталог</a></div>
                        </div>
                        <div class="edge-item">
                            <div class="edge-item__icon">
                                <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-assortiment"/></svg></div>
                            <div class="edge-item__title">Собственный узор или надпись</div>
                            <div class="edge-item__desc">Изготовим изделие с вашим рисунком, логотипом или надписью</div>
                            <div class="edge-item__link">Подробнее <a href="<?php echo site_url('/stm'); ?>">о собственной торговой марке</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

if ( ! function_exists( 'hook_section_leadform' ) ) {
    /**
     * Display Hooks Section Leadform
     */
    function hook_section_leadform() {
        ?>
            <div class="section section-leadform">
                <div class="section__wrap">
                    <div class="leadform leadform-calculation">
                        <div class="leadform__wrap">
                            <div class="leadform__desc girl">
                                <div class="leadform__title"><strong>Вы получите</strong> быстрый и <br>точный расчет стоимости <br>уже через 15 минут</div>
                                <div class="leadform-edge">
                                    <div class="leadform-edge__item">
                                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-bullet"/></svg>
                                        <div class="leadform-edge__title">
                                            <strong>Узнаете какие позиции самые ходовые</strong>
                                            <p>подберем продукцию под ваш бюджет или напровление, банное или хозяйственное</p>
                                        </div>
                                    </div>
                                    <div class="leadform-edge__item">
                                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-bullet"/></svg>
                                        <div class="leadform-edge__title">
                                            <strong>Уникальный товар на рынке</strong>
                                            <p>нужно изделие с рисунком, логотипом и фирменной упаковкой? Мы изготовим продукцию под вашей СТМ</p>
                                        </div>
                                    </div>
                                    <div class="leadform-edge__item">
                                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-bullet"/></svg>
                                        <div class="leadform-edge__title">
                                            <strong>Получите точный расчет стоимости</strong>
                                            <p>расчитаем стоимость изготовления, упаковки продукции и доставки до вас</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="leadform-girl">
                                    <div class="leadform-girl__desc">
                                        <span>Елена Владимировна</span>
                                        <small>Менеджер по работе с клиентами</small>
                                    </div>
                                    <picture>
                                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-girl.webp" type="image/webp">
                                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-girl.png" type="image/png"> 
                                        <img class="leadform-girl" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-girl.png" alt="<?php echo get_bloginfo( 'title' ); ?>">
                                    </picture>
                                </div>
                            </div>
                            <div class="leadform-form">
                                <div class="leadform-form__title">Только телефон <br>и мы в деле</div>
                                <div class="leadform-form__subtitle">Специалист перезвонит Вам <br>в течение 15 минут, в рабочее время</div>
                                <div class="leadform-form__switch leadswitch">
                                    <div class="leadswitch__title">Куда вам удобнее отправить?</div>
                                    <div class="leadswitch__wrap">
                                        <div class="leadswitch__item" data-switch-name="Email" data-switch="Укажите свой Email" style="display: none;">
                                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--switch-mail"/></svg>
                                            <span>Email</span>
                                        </div>
                                        <div class="leadswitch__item" data-switch-name="Viber" data-switch="Ваш телефон в Viber">
                                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--switch-viber"/></svg>
                                            <span>Viber</span>
                                        </div>
                                        <div class="leadswitch__item is_active" data-switch-name="Whatsapp" data-switch="Ваш телефон в whatsapp">
                                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--switch-whatsapp"/></svg>
                                            <span>WhatsApp</span>
                                        </div>
                                        <div class="leadswitch__item" data-switch-name="Telegram" data-switch="Ваш телефон в telegram">
                                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--switch-telegram"/></svg>
                                            <span>Telegram</span>
                                        </div>
                                    </div>
                                </div>

                                <?php echo do_shortcode( '[contact-form-7 id="52" title="Без названия"]' ); ?>

                                <div class="leadform-privacy">
                                    <span>Нажимая на кнопку вы соглашаетесь с условиями <a href="<?php echo site_url('/privacy'); ?>">Политики конфиденциальности</a></span>
                                </div>
                                
                            </div>
                        </div>
                        <picture>
                            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-calculation.webp" type="image/webp">
                            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-calculation.jpg" type="image/jpeg"> 
                            <img class="leadform-calculation__bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-calculation.png" alt="<?php echo get_bloginfo( 'title' ); ?>">
                        </picture>
                    </div>
                </div>
            </div>
        <?php
    }
}

if ( ! function_exists( 'hook_section_pdfform' ) ) {
    /**
     * Display Hooks Section pdfform
     */
    function hook_section_pdfform() {
        ?>
            <div class="section section-leadform">
                <div class="section__wrap">
                    <div class="leadform leadform-calculation">
                        <div class="leadform__wrap">
                            <div class="leadform__desc pdf">
                                <div class="leadform__title"><strong>Скачайте прайс-лис</strong> на всю продукцию <br><strong>со скидками,</strong> актуальными на <?php echo date_i18n( 'j F' ); ?></div>
                                <div class="leadform-edge">
                                    <div class="leadform-edge__item">
                                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-bullet-blue"/></svg>
                                        <div class="leadform-edge__title">
                                            <strong>Узнаете какие позиции самые ходовые</strong>
                                            <p>подберем продукцию под ваш бюджет или напровление, банное или хозяйственное</p>
                                        </div>
                                    </div>
                                    <div class="leadform-edge__item">
                                        <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--edge-bullet-blue"/></svg>
                                        <div class="leadform-edge__title">
                                            <strong>Получите точный расчет стоимости</strong>
                                            <p>расчитаем стоимость изготовления, упаковки продукции и доставки до вас</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="leadform-pdf">
                                    <div class="leadform-pdf-bullet">
                                        <div class="leadform-pdf-bullet__title"><span>PDF</span><small>2,5 Мб</small></div>
                                    </div>
                                    <picture>
                                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-pdf.webp" type="image/webp">
                                        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-pdf.png" type="image/png"> 
                                        <img class="leadform-pdf__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-pdf.png" alt="<?php echo get_bloginfo( 'title' ); ?>">
                                    </picture>
                                </div>
                            </div>
                            <div class="leadform-form">
                                <div class="leadform-form__title">Только телефон <br>и мы в деле</div>
                                <div class="leadform-form__subtitle">Специалист перезвонит Вам <br>в течение 15 минут, в рабочее время</div>
                                <div class="leadform-form__switch leadswitch">
                                    <div class="leadswitch__title">Куда вам удобнее отправить?</div>
                                    <div class="leadswitch__wrap">
                                        <div class="leadswitch__item" data-switch-name="Email" data-switch="Укажите свой Email" style="display: none;">
                                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--switch-mail"/></svg>
                                            <span>Email</span>
                                        </div>
                                        <div class="leadswitch__item" data-switch-name="Viber" data-switch="Ваш телефон в Viber">
                                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--switch-viber"/></svg>
                                            <span>Viber</span>
                                        </div>
                                        <div class="leadswitch__item is_active" data-switch-name="Whatsapp" data-switch="Ваш телефон в whatsapp">
                                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--switch-whatsapp"/></svg>
                                            <span>WhatsApp</span>
                                        </div>
                                        <div class="leadswitch__item" data-switch-name="Telegram" data-switch="Ваш телефон в telegram">
                                            <svg><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/files/sprite.svg#icon--switch-telegram"/></svg>
                                            <span>Telegram</span>
                                        </div>
                                    </div>
                                </div>

                                <?php echo do_shortcode( '[contact-form-7 id="52" title="Без названия"]' ); ?>

                                <div class="leadform-privacy">
                                    <span>Нажимая на кнопку вы соглашаетесь с условиями <a href="<?php echo site_url('/privacy'); ?>">Политики конфиденциальности</a></span>
                                </div>
                                
                            </div>
                        </div>
                        <picture>
                            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-calculation.webp" type="image/webp">
                            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-calculation.jpg" type="image/jpeg"> 
                            <img class="leadform-calculation__bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/section/leadform/leadform-calculation.png" alt="<?php echo get_bloginfo( 'title' ); ?>">
                        </picture>
                    </div>
                </div>
            </div>
        <?php
    }
}

if ( ! function_exists( 'hook_section_contacts' ) ) {
    /**
     * Display Hooks Section Contacts
     */
    function hook_section_contacts() {
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