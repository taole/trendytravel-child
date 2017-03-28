<?php 
/*
* Template Name: Travel Styles
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

$cats = get_terms( array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
) );
get_template_part('includes/breadcrumb_section');
?>
<div id="main">
	<div class="container">
		<section class="related-tours category-tours tour-type-page">
			<h2 class="related-title">Tour Type</h2>
		    <div class="related-content">
				<ul>
				<?php
				foreach ($cats as $cat) {
					$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_url( $thumbnail_id );
				?>
				<li class="item">
					<div class="img">
					    <img src="<?php echo $image;?>">
					</div>
					<div class="text">
					   <div class="table">
                           <div class="tr">
                               <div class="td">
                                   <h2 class="title"><?php echo $cat->name; ?></h2>
                                   <div class="infomation">
                                       <?php echo $cat->count; ?> Tours Available
                                   </div>
                               </div>
                           </div>
					   </div>
					    <a href="<?php echo get_category_link($cat->term_id); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">View Tours</a>
					</div>
				</li>
				<?php } ?>
				</ul>
			</div>
		</section>
	</div>
</div>
<div class="fullwidth-section find-a-tour find-a-tour-bottom" style="padding-top:10px;padding-bottom:30px;">	
	<div class="container">
		<?php echo do_shortcode('[ULWPQSF id=8569]'); ?>
	</div>
</div>
<?php get_footer( 'shop' ); ?>