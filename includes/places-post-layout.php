<?php
	//PERFORMING PLACES POST LAYOUT...
	$meta_set = get_post_meta($post->ID, '_tpl_default_settings', true);
	if($GLOBALS['force_enable'] == true)
	  $page_layout = $GLOBALS['page_layout'];
	else
	  $page_layout = !empty($meta_set['layout']) ? $meta_set['layout'] : $GLOBALS['page_layout'];
	$post_layout = !empty($meta_set['places-post-layout']) ? $meta_set['places-post-layout'] : 'one-half-column';
		
	$li_class = "";
	$column = $args = "";
	$feature_image = "places-twocol";
	
	//POST LAYOUT SWITCH...
	switch($post_layout) {
		case "one-half-column":
			$li_class = "column dt-sc-one-half"; $feature_image = "places-twocol"; $column = 2; break;

		case "one-third-column":
			$li_class = "column dt-sc-one-third"; $feature_image = "places-threecol"; $column = 3; break;

		case "one-fourth-column":
			$li_class = "column dt-sc-one-fourth"; $feature_image = "places-fourcol"; $column = 4; break;
	}
	//BETTER IMAGE SIZE...
	switch($page_layout) {
		case "with-left-sidebar":
			$li_class = $li_class." with-sidebar";
			$feature_image = $feature_image."-sidebar";
			break;
		
		case "with-right-sidebar":
			$li_class = $li_class." with-sidebar";
			$feature_image = $feature_image."-sidebar";
			break;

		case "with-both-sidebar":
			$li_class = $li_class." with-sidebar";
			$feature_image = $feature_image."-bothsidebar";
			break;
	}
	
	global $dt_allowed_html_tags;	
	//POST VALUES....
	$limit = $meta_set['places-post-per-page'];
	$search_text = !empty($_REQUEST['search_text']) ? wp_kses($_REQUEST['search_text'], $dt_allowed_html_tags) : '';
	
	//PERFORMING QUERY...
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	else { $paged = 1; }


	
	//PERFORMING QUERY...
	$terms = get_terms( array(
		    'taxonomy' => 'place_entries',
		    'hide_empty' => false,
		    'orderby' => 'term_order'
		) );
	?>
	<!-- title -->
	<div class="title-list">
		<?php foreach ($terms as $term) { ?>
			<h2 class="title <?php echo $term->slug; ?>"><?php echo $term->name; ?></li>
		<?php } ?>
	</div>

	<!-- tabs title -->
    <ul class="guide-tabs" role="tablist">  
    <?php foreach ($terms as $term) { 
    	$location = "location";
        if ( $term->slug == 'cambodia-travel-guides') {
        	$location = "Cambodia";
        } elseif ($term->slug == "laos-travel-guides") {
        	$location = "Laos";
        } elseif ($term->slug == "vietnam-travel-guides") {
        	$location = "Vietnam";
        } elseif ($term->slug == "indochina-travel-guides") {
        	$location = "Indochina";
        }
    	?>
			<li><a href=".<?php echo $term->slug; ?>"><?php echo $location; ?></a></li>
	<?php } ?>
    </ul>
    <div class="tab-contents">
    <?php foreach ($terms as $term) { 
    	$args = array(
    		'post_type' => 'dt_places', 
    		'tax_query' => array(
				array(
					'taxonomy' => 'place_entries',
					'field' => 'slug',
					'terms' => $term->slug
				)
			),
    		'paged' => $paged , 
    		'posts_per_page' => $limit);
		$wp_query = new WP_Query($args);
		if($wp_query->have_posts()):  $i = 1; 

		$location = "location";
        if ( $term->slug == 'cambodia-travel-guides') {
        	$location = "Cambodia";
        } elseif ($term->slug == "laos-travel-guides") {
        	$location = "Laos";
        } elseif ($term->slug == "vietnam-travel-guides") {
        	$location = "Vietnam";
        } elseif ($term->slug == "indochina-travel-guides") {
        	$location = "Indochina";
        }
    	?>
		<div class="dt-sc-places-container <?php echo $term->slug; ?> tab-pane"><?php
			while($wp_query->have_posts()): $wp_query->the_post();
			
			 	$temp_class = "";
				if($i == 1) $temp_class = $li_class." first"; else $temp_class = $li_class;
				if($i == $column) $i = 1; else $i = $i + 1;
				$place_meta = array();
				$place_meta = get_post_meta(get_the_id() ,'_place_settings', true); ?>
	            
		        <div class="<?php echo esc_attr($temp_class); ?>">
					<div id="post-<?php the_ID(); ?>" <?php post_class('place-item'); ?>>
	                    <div class="place-thumb"><?php
							if( has_post_thumbnail() ): ?>
								<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php
									$attr = array('title' => get_the_title()); the_post_thumbnail($feature_image, $attr); ?>
	                                <div class="image-overlay"><span class="image-overlay-inside"></span></div>
								</a><?php
							endif; ?>
	                    </div>
	                    <div class="place-detail-wrapper">
	                        <div class="place-title">
	                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	                            <p class="location"><?php echo $location; ?></p>
	                        </div>
	                        <div class="place-content">
	                            <a class="map-marker" href="<?php the_permalink(); ?>#place_map_<?php the_ID(); ?>"> <span class="red"></span><?php _e('View on Map', 'iamd_text_domain'); ?></a>
	                            <a class="dt-sc-button too-small" href="<?php the_permalink(); ?>"><?php _e('View details', 'iamd_text_domain'); ?></a>
	                        </div>
	                    </div>
	                </div>
	            </div><?php
			endwhile; ?>
	      </div><?php
		  if($wp_query->max_num_pages > 1): ?>
			<div class="pagination blog-pagination">
				<?php if(function_exists("dt_theme_pagination")) echo dt_theme_pagination("", $wp_query->max_num_pages, $wp_query); ?>
			</div><?php
		  endif;
		  wp_reset_query($wp_query);
		  else: ?>
		  <div class="dt-sc-places-container <?php echo $term->slug; ?> tab-pane">
			<h2><?php _e('Nothing Found.', 'iamd_text_domain'); ?></h2>
			<p><?php _e('Apologies, but no results were found for the requested archive.', 'iamd_text_domain'); ?></p>
			</div>
			<?php
		 endif; ?>
	<?php } ?>
	</div>
    <!-- tabs content -->