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
		<?php
			$product_image_id = $product->get_image_id();
			$product_image_url = wp_get_attachment_image_url($product_image_id, 'large');
			$product_name = $product->get_name();
			$price = $product->get_regular_price();
		?>
		<a data-fancybox="<?php echo $product->get_id(); ?>"  data-caption="<?php echo $product_name . ' - ' . $price . ' ₽'; ?>" href="<?php echo $product_image_url; ?>">
			<figure class="catalog-loop__photo">
				<?php if( current_user_can( 'edit_posts' ) ) {
					echo '<a href="' . get_edit_post_link() . '" class="catalog-loop__edit"><span></span></a>';
				}; ?>
				<?php echo $product->get_image(); ?>
			</figure>
		</a>
		<div class="catalog-loop__inner">
			<?php
				if($product_name) :
			?>
				<div class="catalog-loop__name">
					<?php echo $product_name; ?>
				</div>
			<?php endif; ?>
			<?php
				$product_desc = $product->get_description();
				if($product_desc) :
			?>
			<div class="catalog-loop__desc">
				<?php echo $product_desc; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="catalog-loop__prices">
		<?php 
			if($price) : 
		?>
		<div class="catalog-loop__price"><?php echo number_format($price,0,"."," ") . ' ₽'; ?></div>
		<?php endif; ?>
		<div class="catalog-loop__qty">
			<?php woocommerce_template_loop_add_to_cart(); ?>
		</div>
	</div>
</div>
