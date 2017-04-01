<?php get_header();
	while(have_posts()): the_post();
		
	  	//GETTING META VALUES...
	  	$meta_set = get_post_meta($post->ID, '_dt_post_settings', true);
	  	if($GLOBALS['force_enable'] == true)
	  		$page_layout = $GLOBALS['page_layout'];
	  	else
	  		$page_layout = !empty($meta_set['layout']) ? $meta_set['layout'] : $GLOBALS['page_layout'];
	  
	  	//BREADCRUMP...
	  	?>
	  		  	<!-- banner -->
	  		  <style type="text/css">
	  		  	.selected-tour .tabs-selected-tour .tab-contents .tab-pane.current { display: block; }
	  		  </style>
        <div class="banner-bg" style="background-image:url('<?php echo get_the_post_thumbnail_url( $post->ID, 'full' );?>')"></div>
	  	<?php get_template_part('includes/breadcrumb_section'); ?>

	  	<?php 
	  		global $product;
	  		$product_meta = get_post_meta($product->id);
	  		$_package_place = $product_meta['_package_place'][0];
	  		$_product_image_gallery = $product_meta['_product_image_gallery'][0];
	  		$_product_image_gallery_ids = explode(',', $_product_image_gallery);
		?>
      	<div id="main">
          	<div class="container selected-tour">
	          	<div class="header-selected-tour">
	          		<div class="pull-left">
                        <h2 class="title"><?php echo get_the_title(); ?></h2>
                        <span class="package_place"><?php echo $_package_place; ?></span>
	          		</div>
	          		<div class="share"><?php echo do_shortcode( '[jpshare]' ); ?></div>
	          	</div>
	            <section id="primary" class="content-full-width tabs-selected-tour">
					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-entry'); ?>>
						<ul class="product-tabs"  role="tablist">
							<li role="presentation" class="item overview active"><a href=".overview" aria-controls="overview" role="tab" data-toggle="tab">Overview</a></li>
							<li role="presentation" class="item itinerary"><a href=".itinerary" aria-controls="itinerary" role="tab" data-toggle="tab">Itinerary</a></li>
							<li role="presentation" class="item custom-tour"><a href=".custom-tour" aria-controls="custom-tour" role="tab" data-toggle="tab">Custom Tour</a></li>
						</ul>
						<div class="tab-contents">
							<div role="tabpanel" class="tab-pane overview current"><?php wc_get_template_part( 'content', 'overview-product' ); ?></div>
							<div role="tabpanel" class="tab-pane itinerary"><?php wc_get_template_part( 'content', 'itinerary-product' ); ?></div>
							<div role="tabpanel" class="tab-pane custom-tour"><?php echo do_shortcode( '[formidable id="13" description="1"]' ); ?></div>
							</div>  
	                </article>
	            </section>
	            <section class="gallery">
	            	<!-- slide gallery - slick -->
	            	<div class="list-gallery">
	            	<?php 
	            		$count = 0;
	            		foreach ($_product_image_gallery_ids as $_product_image_gallery_id) {
	            			$count++;
	            			if( $count > 4) {
	            				break;
	            			}

	            			$image = wp_get_attachment_image_src($_product_image_gallery_id, 'full');	
	            			?>
	            			<div class="item"><img src="<?php echo $image[0]; ?>"></div>
	            			<?php
	            		}
	            	?>
	            	</div>

	            	<!-- slide thumbnail -->
	            	<div class="slider-nav-thumbnails">
	            	<?php 
	            		$count_thm = 0;
	            		foreach ($_product_image_gallery_ids as $_product_image_gallery_id) {
	            			$count_thm++;
	            			if( $count_thm > 4) {
	            				break;
	            			}

	            			$image = wp_get_attachment_image_src($_product_image_gallery_id);	
	            			?>
	            			<div class="item"><img src="<?php echo $image[0]; ?>"></div>
	            			<?php
	            		}
	            	?>
	            	</div>
	            </section>
	            <section class="tour-enquiry">
	            	<?php echo do_shortcode ('[formidable id=14]'); ?>
	            </section>
	            <section class="related-tours">
	            	<h2 class="related-title">Related Tours</h2>
			        <div class="related-content">
			          <ul>
			        <?php
			            $args=array(
			            'post_type' => 'product',
			            'post__not_in' => array($post->ID),
			            'posts_per_page'=>4,
			            'caller_get_posts'=>1
			            );
			            $my_query = new WP_Query($args);

			            if( $my_query->have_posts() ) {
			              while ($my_query->have_posts()) : $my_query->the_post(); ?>
			              	<?php 
			              		$product_metas = get_post_meta($post->ID);
						  		$_package_places = $product_meta['_package_place'][0];
						  		$_package_duration = $product_metas['_package_days_duration'][0];
						  		$_regular_price = $product_metas['_regular_price"'][0];
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
                                    <h2 class="title"><span class="auto-scroll-mr"><?php echo get_the_title(); ?></span></h2>
                                    <div class="infomation">
                                    	<div class="location"><span class="auto-scroll-mr-location"><?php echo $_package_places; ?></span></div>
                                    	<div class="time"><span class="auto-scroll-mr-time"><i></i><?php echo $_package_duration; ?></span></div>
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
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read more</a>
                                </div>
                            </li>
			            <?php
			            endwhile;
			            }
			            wp_reset_query();
			        ?>
			          </ul>
			        </div>
	            </section>
	            <?php endwhile; ?>
          </div>
      </div>
<?php get_footer(); ?>