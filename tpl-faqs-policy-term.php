<?php 
/*
* Template Name: FAQs - Policy - Term
*/
?>

<?php get_header();

	while(have_posts()): the_post();
		
	  if(is_page()) dt_theme_slider_section($post->ID);
	  
	  //GETTING META VALUES...
	  $meta_set = get_post_meta($post->ID, '_tpl_default_settings', true);
	  if($GLOBALS['force_enable'] == true)
	  	$page_layout = $GLOBALS['page_layout'];
	  else
	  	$page_layout = !empty($meta_set['layout']) ? $meta_set['layout'] : $GLOBALS['page_layout'];

	  //BREADCRUMP...
	  if(!is_front_page() and !is_home())
		  get_template_part('includes/breadcrumb_section'); ?>

      <div id="main">
          <div class="container faqs-term-policy">
              <h1 class="section-title place-heading"><?php echo get_the_title(); ?></h1>              
              <section id="primary" class="page-with-sidebar page-with-right-sidebar">
				            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
                      //PAGE TOP CODE...
					            global $dt_allowed_html_tags;
                      if(dt_theme_option('integration', 'enable-single-page-top-code') != '') echo wp_kses(stripslashes(dt_theme_option('integration', 'single-page-top-code')), $dt_allowed_html_tags);
                      the_content();
                      wp_link_pages(array('before' => '<div class="page-link"><strong>'.__('Pages:', 'iamd_text_domain').'</strong> ', 'after' => '</div>', 'next_or_number' => 'number'));
                      edit_post_link(__('Edit', 'iamd_text_domain'), '<span class="edit-link">', '</span>' );
                      echo '<div class="social-bookmark">';
                          show_fblike('page'); show_googleplus('page'); show_twitter('page'); show_stumbleupon('page'); show_linkedin('page'); show_delicious('page'); show_pintrest('page'); show_digg('page');
                      echo '</div>';
                      dt_theme_social_bookmarks('sb-page');
                      if(dt_theme_option('integration', 'enable-single-page-bottom-code') != '') echo wp_kses(stripslashes(dt_theme_option('integration', 'single-page-bottom-code')), $dt_allowed_html_tags);
                      if(dt_theme_option('general', 'disable-page-comment') != true && (isset($meta_set['comment']) != "")) comments_template('', true); ?>
                    </article>
              </section>
              <section class="secondary-sidebar secondary-has-right-sidebar">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Post Right Sidebar") ) : endif; ?>
              </section>
              <div class="dt-sc-clear"></div>
              <section class="tour-enquiry cls">
                <?php echo do_shortcode ('[formidable id=14]'); ?>
              </section>
              <section class="related-tours">
                <h2 class="related-title">Featured Tours</h2>
                <div class="related-content">
                  <ul>
                  <?php
                      $args=array(
                      'post_type' => 'product',
                      'posts_per_page'=>4,
                      'caller_get_posts'=>1
                      );
                      $my_query = new WP_Query($args);

                      if( $my_query->have_posts() ) {
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                          <?php 
                            $product_metas = get_post_meta($post->ID);
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
                                        <h2 class="title"><?php echo get_the_title(); ?></h2>
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