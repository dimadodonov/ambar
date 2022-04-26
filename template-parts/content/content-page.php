<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eco-Price
 */

?>

<article id="post-<?php the_ID(); ?>">

    <?php 
	
		if(!is_cart()) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;

	?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->