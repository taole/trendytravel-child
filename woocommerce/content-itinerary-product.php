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
			<div class="main-itinerary">
				<?php //echo get_the_content();
					$query = get_post(get_the_ID());  
					$content = apply_filters('the_content', $query->post_content);
					echo $content;
				?>
			</div>
		</div>
		<section class="secondary-sidebar secondary-has-right-sidebar">
	        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Post Right Sidebar") ) : endif; ?>
	    </section>
	</div>
	
</div>