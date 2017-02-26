<?php 

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

/* BEGIN include siderbar */

/* Create widget area */
function re_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Top Sidebar'),
        'id' => 'footer-top-sidebar',
        'description' => __('Footer Newletter Form Widget'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 're_widgets_init');

// create widget
include ABSPATH . 'wp-content/themes/trendytravel-child/widgets/connect-with-us.php';
include ABSPATH . 'wp-content/themes/trendytravel-child/widgets/featured-tour.php';

/* Category */
function product_destination() {  
    register_taxonomy(  
        'destination',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'product',        //post type name
	    array(
	        'label' => __( 'Destination' ),
			'rewrite' => array( 'slug' => 'destination' ),
			'hierarchical' => true,
		) 
    );  
}  
add_action( 'init', 'product_destination');

function product_duration() {  
    register_taxonomy(  
        'duration',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'product',        //post type name
	    array(
	        'label' => __( 'Duration' ),
			'rewrite' => array( 'slug' => 'duration' ),
			'hierarchical' => true,
		) 
    );  
}  
add_action( 'init', 'product_duration');

/*
* Add require scripts
*/
add_action('wp_enqueue_scripts', 'base_scripts');

function base_scripts() {
    wp_enqueue_script('customs_scripts', '/wp-content/themes/trendytravel-child/js/custom.js', array(), 1.0, true);
    wp_enqueue_script('slick_scripts', '/wp-content/themes/trendytravel-child/js/slick.js', array(), 1.0, true);
    wp_enqueue_style( 'slick', '/wp-content/themes/trendytravel-child/css/slick.css' );
}
?>