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

    register_sidebar(array(
        'name' => __('Footer bottom mobile Sidebar'),
        'id' => 'footer-bottom-mobile-sidebar',
        'description' => __('Footer bottom mobile Sidebar'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Travel Blog Tab'),
        'id' => 'travel-blog-tab',
        'description' => __('Travel Blog Tab')
    ));

    register_sidebar(array(
        'name' => __('Travel Video Tab'),
        'id' => 'travel-video-tab',
        'description' => __('Travel Video Tab')
    ));

    register_sidebar(array(
        'name' => __('Travel Guilds Tab'),
        'id' => 'travel-guild-tab',
        'description' => __('Travel Guilds Tab')
    ));

    register_sidebar(array(
        'name' => __('Single Post Right Sidebar'),
        'id' => 'post-right-sidebar',
        'description' => __('Right Sidebar')
    ));
}

add_action('widgets_init', 're_widgets_init');

// create widget
include ABSPATH . 'wp-content/themes/trendytravel-child/widgets/connect-with-us.php';
include ABSPATH . 'wp-content/themes/trendytravel-child/widgets/featured-tour.php';
include ABSPATH . 'wp-content/themes/trendytravel-child/widgets/trip-advisor-review.php';
include ABSPATH . 'wp-content/themes/trendytravel-child/widgets/travel_block.php';

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
    wp_enqueue_script('bootstrap_scripts', '/wp-content/themes/trendytravel-child/js/bootstrap.min.js', array(), 1.0, true);

    wp_enqueue_script('scrollbar_scripts', '/wp-content/themes/trendytravel-child/js/jquery.mCustomScrollbar.js', array(), 1.0, true);
    wp_enqueue_script('scrollbar_concat_scripts', '/wp-content/themes/trendytravel-child/js/jquery.mCustomScrollbar.concat.min.js', array(), 1.0, true);

    wp_enqueue_style( 'slick', '/wp-content/themes/trendytravel-child/css/slick.css' );
    wp_enqueue_style( 'slick-theme', '/wp-content/themes/trendytravel-child/css/slick-theme.css' );
    wp_enqueue_style( 'scrollbar', '/wp-content/themes/trendytravel-child/css/jquery.mCustomScrollbar.css' );
}


function wooc_validate_extra_register_fields( $errors, $username, $email ) {
    if ( $_POST['confirm_password'] != $_POST['password'] ) {
        $errors->add( 'confirm_password_error', __( '<strong>Error</strong>: Confirm password and Password must same!', 'woocommerce' ) );
    }
    return $errors;
}
add_filter( 'woocommerce_registration_errors', 'wooc_validate_extra_register_fields', 10, 3 );

/* checkout fields order*/
add_filter("woocommerce_checkout_fields", "order_fields");

function order_fields($fields) {

    $order = array(
        "billing_email", 
        "billing_phone",
        "billing_postcode",
        "billing_country", 
        "billing_first_name", 
        "billing_last_name", 
        "billing_address_1", 
        "billing_city",
        "billing_company", 

    );
    foreach($order as $field)
    {
        $ordered_fields[$field] = $fields["billing"][$field];
    }

    $fields["billing"] = $ordered_fields;
    return $fields;

}

/* save user data */
function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        // WordPress default first name field.
        update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        // WooCommerce billing first name.
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        // WordPress default last name field.
        update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        // WooCommerce billing last name.
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    }
    if ( isset( $_POST['billing_phone'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }
    if ( isset( $_POST['billing_country'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_country', sanitize_text_field( $_POST['billing_country'] ) );
    }
    if ( isset( $_POST['billing_postcode'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_postcode', sanitize_text_field( $_POST['billing_postcode'] ) );
    }
    if ( isset( $_POST['billing_address_1'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
    }
    if ( isset( $_POST['billing_city'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_city', sanitize_text_field( $_POST['billing_city'] ) );
    }
    if ( isset( $_POST['billing_company'] ) ) {
        // WooCommerce billing phone
        update_user_meta( $customer_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
    }
}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

/* Filter Tiny MCE Default Settings */
add_filter( 'tiny_mce_before_init', 'my_switch_tinymce_p_br' );
 
/**
 * Switch Default Behaviour in TinyMCE to use "<br>"
 * On Enter instead of "<p>"
 * 
 * @link https://shellcreeper.com/?p=1041
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/tiny_mce_before_init
 * @link http://www.tinymce.com/wiki.php/Configuration:forced_root_block
 */
function my_switch_tinymce_p_br( $settings ) {
    $settings['forced_root_block'] = false;
    return $settings;
}
?>