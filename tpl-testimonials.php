<?php 
/*
* Template Name: Testimonials
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
          <div class="container faqs-term-policy testimonials">
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
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Testimonial siderbar") ) : endif; ?>
              </section>
			  
        <?php endwhile; ?>
          </div>
      </div>
      <script type="text/javascript">
        jQuery(document).ready(function($){
          $('.column .dt-sc-testimonial').each(function(index, el) {
            var author = '<div class="author-name">' + $(this).children('.author-detail').html() + '</div>';
            $(this).children('.author').after(author);
            //console.log($(this).children('.author-detail').html());
          });        
        });
      </script>
<?php get_footer(); ?>