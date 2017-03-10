<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}



get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="product-tabs"  role="tablist">
				<div role="presentation" class="item overview"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Overview</a></div>
				<div role="presentation" class="item itinerary"><a href="#itinerary" aria-controls="itinerary" role="tab" data-toggle="tab">Itinerary</a></div>
				<div role="presentation" class="item custom-tour"><a href="#custom-tour" aria-controls="custom-tour" role="tab" data-toggle="tab">Custom Tour</a></div>
			</div>
			<div class="tab-contents">
				<div role="tabpanel" class="tab-pane active" id="overview"><?php wc_get_template_part( 'content', 'overview-product' ); ?></div>
				<div role="tabpanel" class="tab-pane" id="itinerary"><?php wc_get_template_part( 'content', 'itinerary-product' ); ?></div>
				<div role="tabpanel" class="tab-pane" id="custom-tour"><?php echo do_shortcode( '[formidable id="13" description="1"]' ); ?></div>
				</div>
			<?php //wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>
