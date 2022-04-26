<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit();

global $product;
$product_id = $product->get_id();

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

$product_published = $product->get_date_created();
$post_id = get_the_ID();

// $product_published->date
?>
<div <?php wc_product_class('catalog-loop__item'); ?>>
	<div class="catalog-loop__row">
		<figure class="catalog-loop__photo">
			<?php echo $product->get_image(); ?>
		</figure>
		<?php
			$product_desc = $product->get_description();
			if($product_desc) :
		?>
		<div class="catalog-loop__desc">
			<?php echo $product_desc; ?>
		</div>
		<?php endif; ?>
	</div>
	<div class="catalog-loop__prices">
		<?php 
			$price = $product->get_regular_price();
			if($price) : 
		?>
		<div class="catalog-loop__price"><?php echo number_format($price,0,"."," ") . ' руб'; ?></div>
		<?php endif; ?>
		<div class="catalog-loop__qty">В заказ</div>
	</div>
</div>
