<?php get_header();
	global $dt_allowed_html_tags;
	while(have_posts()): the_post();

	  //GETTING META VALUES...
	  $meta_set = get_post_meta($post->ID, '_place_settings', true);
	  if($GLOBALS['force_enable'] == true)
	  	$page_layout = $GLOBALS['page_layout'];
	  else
	  	$page_layout = !empty($meta_set['layout']) ? $meta_set['layout'] : $GLOBALS['page_layout'];

	  //BREADCRUMP...
	  get_template_part('includes/breadcrumb_section');

	  //RATING CALCULATION...
	  $arr_rate = dt_theme_comment_rating_count(get_the_ID());
	  $all_avg = dt_theme_comment_rating_average(get_the_ID());
      
      $map_code = '';
	  $map_code = '<div class="widget">';
	  	$map_code .= '<h3 class="widgettitle">'.__('', 'dt_themes').get_the_title().'</h3>';
		$map_code .= '<div id="place_map_'.get_the_ID().'" class="list-hotel-map" data-add="'.get_the_title().', '.esc_attr(@$meta_set['place_add']).'" data-lt="'.esc_attr(@$meta_set['place_lat']).'" data-lg="'.esc_attr(@$meta_set['place_long']).'"></div>';
	  $map_code .= '</div>'; ?>
      
      <div id="main">
          <div class="container blog-entry-inner">
            <h1 class="section-title place-heading"><?php the_title(); ?></h1>
            <section id="primary" class="page-with-sidebar page-with-right-sidebar">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                   <div class="">
					<sub><?php echo wp_kses(@$meta_set['place_add'], $dt_allowed_html_tags);?></sub><?php
                    echo '<div class="star-rating-wrapper"><div class="star-rating"><span style="width:'.(($all_avg/5)*100).'%"></span></div>('.__('Average ', 'dt_themes').$all_avg.__(' of ', 'dt_themes').count($arr_rate).__(' Ratings', 'dt_themes').')</div><div class="dt-sc-hr-invisible"></div>';
					if( @array_key_exists("items", $meta_set) ):
						echo "<ul class='entry-gallery-post-slider'>";
							foreach ( $meta_set['items'] as $item ) { echo "<li><img src='{$item}' alt='place-img' /></li>";	}
						echo "</ul>";
						echo "<div id='entry-gallery-pager'>"; $i = 0;
							foreach ( $meta_set['items'] as $item ) { echo "<a data-slide-index='".$i."' href=''><img src='{$item}' alt='place-img' /></a>"; $i += 1;	}
						echo "</div>";
						echo '<div class="dt-sc-hr-invisible"></div>';
					endif;
					?>
					<div class="top-left-img"><img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>"></div>
					<?php
					the_excerpt();
					//Show hotels & destination list...
					if(isset($meta_set['show-hotels-list']) != ""): ?>
                        <div class="dt-sc-hr-invisible"></div>
                        
                        <div class="dt-sc-one-half column first"><?php
							//Check Hotels...
							$hotel_array = @array_filter($meta_set['place-hotels-list']);
							if($hotel_array != NULL): ?>
								<div class="widget hotels-list-widget">
									<h3 class="widgettitle"><?php _e('Hotels to Stay', 'dt_themes'); ?></h3>
									<div class="recent-hotels-widget">
										<ul><?php
											foreach($hotel_array as $hid):
												$tpost = get_post($hid);
												$attr = array('title' => $tpost->post_title);
												$hmeta = get_post_meta($hid, '_hotel_settings', true);
											    $arr_rate = dt_theme_comment_rating_count($hid);
												$all_avg = dt_theme_comment_rating_average($hid); ?>
                                                <li>
                                                    <a class="thumb" href="<?php echo get_permalink($hid); ?>"><?php echo get_the_post_thumbnail($hid, array(100, 80), $attr); ?></a>
                                                    <h6><a href="<?php echo get_permalink($hid); ?>"><?php echo $tpost->post_title; ?></a>, <sub><?php echo wp_kses(@$hmeta['hotel_add'], $dt_allowed_html_tags); ?></sub></h6>
                                                    <?php echo '<div class="star-rating-wrapper"><div class="star-rating"><span style="width:'.(($all_avg/5)*100).'%"></span></div>('.count($arr_rate).__(' Ratings', 'dt_themes').')</div>'; ?>
                                                    <a href="<?php echo get_permalink($hid);?>#hotel_map_<?php echo $hid;?>" class="map-marker"><span class="red"></span><?php _e('View on Map', 'dt_themes'); ?></a>
                                                </li><?php
											endforeach; ?>
										</ul>
									</div>
								</div><?php
							else:
								echo '<h4>'.__('No Hotels Found.', 'dt_themes').'</h4>';
								echo '<p>'.__('Choose hotels from back-end to show in this section.', 'dt_themes').'</h2>';
							endif; ?>
                        </div>
                        
                        <div class="dt-sc-one-half column"><?php
							//Check Destinations...
							$dests_array = @array_filter($meta_set['place-destinations-list']);
							if($dests_array != NULL): ?>
                                <div class="widget places-list-widget">
                                    <h3 class="widgettitle"><?php _e('Popular Destinations', 'dt_themes'); ?></h3>
                                    <div class="recent-places-widget">
                                        <ul><?php
											foreach($dests_array as $did):
												$tpost = get_post($did);
												$attr = array('title' => $tpost->post_title);
												$pmeta = get_post_meta($did, '_place_settings', true);
											    $arr_rate = dt_theme_comment_rating_count($hid);
												$all_avg = dt_theme_comment_rating_average($hid); ?>
                                                <li>
                                                    <a class="thumb" href="<?php echo get_permalink($did); ?>"><?php echo get_the_post_thumbnail($did, array(100, 80), $attr); ?></a>
                                                    <h6><a href="<?php echo get_permalink($did); ?>"><?php echo $tpost->post_title; ?></a>, <sub><?php echo wp_kses(@$pmeta['place_add'], $dt_allowed_html_tags); ?></sub></h6>
                                                    <?php echo '<div class="star-rating-wrapper"><div class="star-rating"><span style="width:'.(($all_avg/5)*100).'%"></span></div>('.count($arr_rate).__(' Ratings', 'dt_themes').')</div>'; ?>
                                                    <a href="<?php echo get_permalink($did);?>#place_map_<?php echo $did;?>" class="map-marker"><span class="red"></span><?php _e('View on Map', 'dt_themes'); ?></a>
                                                </li><?php
											endforeach; ?>
                                        </ul>
                                    </div>
                                </div><?php
							else:
								echo '<h4>'.__('No Destinations Found.', 'dt_themes').'</h4>';
								echo '<p>'.__('Choose destinations from back-end to show in this section.', 'dt_themes').'</h2>';
							endif; ?>
                        </div><?php
					endif;
					echo '<div class="clear"></div>';
					the_content();
                    wp_link_pages(array('before' => '<div class="page-link"><strong>'.__('Pages:', 'dt_themes').'</strong> ', 'after' => '</div>', 'next_or_number' => 'number'));
                    edit_post_link(__('Edit', 'dt_themes'), '<span class="edit-link">', '</span>' );
					
                    if(isset($meta_set['show-reviews']) != ""):
						echo '<div class="dt-sc-hr-invisible"></div>';
						comments_template('/custom-comments.php', true); ?>
						<a href="#respond" class="dt-sc-button medium green aligncenter btn-place-review"><?php _e('Write a Review about ', 'dt_themes'); the_title(); ?></a><?php
                    endif;
                    
					if(isset($meta_set['show-recommends']) != ""): ?>
						<div class="dt-sc-hr-invisible"></div>
                        <h2 class="section-title"><?php _e('Our Recommendations', 'dt_themes'); ?></h2><?php
						
						$args = array('orderby' => 'rand', 'post_type' => 'dt_places', 'post__not_in' => array(get_the_ID()), 'posts_per_page' => 8);
						$the_query = new WP_Query($args);
						if($the_query->have_posts()):
						  $maxitems = ($the_query->post_count <= 3) ? $the_query->post_count : 3; ?>
                          <div class="carousel_items">
                            <div class="dt-sc-places-wrapper dt_carousel" data-items="<?php echo esc_attr($maxitems); ?>"><?php
								while($the_query->have_posts()): $the_query->the_post();
									$place_meta = get_post_meta(get_the_id() ,'_place_settings', true); ?>
									<div class="dt-sc-one-fourth column">
										<div class="place-item">
											<div class="place-thumb"><?php
												if( has_post_thumbnail() ): ?>
													<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php
														$attr = array('title' => get_the_title()); the_post_thumbnail('place-thumb', $attr); ?>
                                                        <div class="image-overlay"><span class="image-overlay-inside"></span></div>
													</a><?php
												endif; ?>
											</div>
											<div class="place-detail-wrapper">
												<div class="place-title">
													<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
													<p><?php echo wp_kses(@$place_meta['place_add'], $dt_allowed_html_tags);?></p>
												</div>
												<div class="place-content">
													<a class="map-marker" href="<?php the_permalink(); ?>#place_map_<?php the_ID(); ?>"> <span class="red"></span><?php _e('View on Map', 'dt_themes'); ?></a>
													<a class="dt-sc-button too-small" href="<?php the_permalink(); ?>"><?php _e('View details', 'dt_themes'); ?></a>
												</div>
											</div>
										</div>
									</div><?php
								endwhile; ?>	
                            </div>
							<div class="carousel-arrows">
                                <a class="prev-arrow" href="#"><span class="fa fa-angle-left"> </span></a>
                                <a class="next-arrow" href="#"><span class="fa fa-angle-right"> </span></a>
                            </div>
						  </div><?php
						endif;
					endif; ?>
                   </div>
                </article>
            </section>
            <section class="secondary-sidebar secondary-has-right-sidebar">
            	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Post Right Sidebar") ) : endif; ?>
            </section>
            
          </div><?php endwhile; ?>

            <div class="container related-post our-recommendation">
                <h2 class="related-title">Our Recommendation</h2>
                <div class="related-content">
                    <ul>
                        <?php
                        $terms = get_the_terms( $post->ID , 'place_entries' );
                        $terms_slug = $terms[0]->slug;
                        $location = "location";
                        if ( $terms_slug == 'cambodia-travel-guides') {
                        	$location = "Cambodia";
                        } elseif ($terms_slug == "laos-travel-guides") {
                        	$location = "Laos";
                        } elseif ($terms_slug == "vietnam-travel-guides") {
                        	$location = "Vietnam";
                        }
                        $args=array(
                            'post_type' => 'dt_places',
                            'post__not_in' => array($post->ID),
                            'posts_per_page'=>4,
                            'caller_get_posts'=>1
                        );
                        $my_query = new WP_Query($args);

                        if( $my_query->have_posts() ) {
                            while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                <li class="item">

                                    <div class="img">
                                        <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'medium' );?>">
                                    </div>
                                    <div class="text">
                                        <h2 class="title"><?php echo get_the_title(); ?></h2>
                                        <div class="location"><?php echo $location; ?></div>
                                        <div class="map"><a href="#"><i></i>View on map</a></div>
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
            </div>
      </div>


<?php get_footer(); ?>