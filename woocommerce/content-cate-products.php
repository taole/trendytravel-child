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
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php 
	$product_metas = get_post_meta($product->id);
	$_package_places = $product_metas['_package_place'][0];
	$_package_duration = $product_metas['_package_days_duration'][0];
	$_regular_price = $product_metas['_regular_price'][0];
	$_sale_price = $product_metas['_sale_price'][0];

?>
<li class="item">
	<?php if ( $_sale_price ) : ?>
		<span class="sales">sale</span>
	<?php endif ?>
	<div class="img">
	    <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'medium' );?>">
	</div>
	<div class="text">
	    <h2 class="title" title="<?php echo get_the_title(); ?>"><span><?php echo get_the_title(); ?></span></h2>
	    <div class="infomation">
	    	<div class="location"><?php echo $_package_places; ?></div>
	    	<div class="time"><i></i>No of Days: <?php echo $_package_duration; ?></div>
			<div class="price">
				<?php if( $_regular_price ): ?>
					<div class="regular-price <?php if ( $_sale_price ) { echo 'was';} ?>">
						<?php if ( $_sale_price ) : ?>
							<span>Was: </span>
						<?php endif; ?>		
	    				$<?php echo $_regular_price; ?>
					</div>
				<?php endif; ?>
				<?php if ( $_sale_price ) : ?>
	    			<div class="sale-price">$<?php echo $_sale_price; ?></div>
	    		<?php endif; ?>
			</div>
	    </div>
	    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">View Tour</a>
	</div>

</li>
