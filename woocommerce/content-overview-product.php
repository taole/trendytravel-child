<?php 
	global $product;
	global $post;
	$product_meta = get_post_meta($product->id);
	$_package_days_duration = $product_meta['_package_days_duration'][0];
	$tabs = apply_filters( 'woocommerce_product_tabs', array() );
?>
<div class="main-overview">
	<div>
		<div class="page-with-sidebar page-with-right-sidebar">
			<h3 class="no_of_days"><i></i>No of Days: <?php echo $_package_days_duration; ?></h3>
			<?php if ( ! $post->post_excerpt ) : ?>
				<div class="description">
					<?php echo get_the_excerpt(); ?>
				</div>
			<?php else: ?>
				<div class="description">
					<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
				</div>
			<?php endif; ?>
			
			<div class="summary">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<?php if($key == "summary"): ?>
						<?php call_user_func( $tab['callback'], $key, $tab ); ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
		<section class="secondary-sidebar secondary-has-right-sidebar">
			<div class="cart">
				<?php
			 		if ( ! $product->is_sold_individually() ) {
			 			woocommerce_quantity_input( array(
			 				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
			 				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
			 				'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
			 			) );
			 		}
			 	?>
				<div class="pull-right">
                    <div class="price">Price <span>$<?php echo $product_meta['_sale_price'][0]; ?></span></div>
                    <div class="sale">Was <span>$<?php echo $product_meta['_regular_price'][0]; ?></span></div>
				</div>
				<a class="add-to-cart" href='<?php echo $product->add_to_cart_url(); ?>'><i></i>add to basket</a>
			</div>
	        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Post Right Sidebar") ) : endif; ?>
	    </section>
	</div>
	
</div>