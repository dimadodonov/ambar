<?php

require get_template_directory() . '/includes/template-settings.php';
require get_template_directory() . '/includes/widget-areas.php';
//require get_template_directory() . '/includes/helpers.php';
require get_template_directory() . '/includes/enqueue_script_style.php';
require get_template_directory() . '/includes/post-type.php';

/**
 * Implement the add thumbnail Post and Product.
 */
require get_template_directory() . '/includes/thumbnail.php';

/**
 * Подключаем файл с подключением хуков
 */
require get_template_directory() . '/includes/template-hooks.php';

/**
 * Подключаем файл с настройками для блоков
 */
require get_template_directory() . '/includes/template-sections-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Navigations .
 */
require get_template_directory() . '/includes/navigations.php';