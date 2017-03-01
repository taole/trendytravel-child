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
    wp_enqueue_style( 'slick', '/wp-content/themes/trendytravel-child/css/slick.css' );
    wp_enqueue_style( 'slick-theme', '/wp-content/themes/trendytravel-child/css/slick-theme.css' );
}

/* Woo Register Form*/
function wooc_extra_register_fields() {?>
            
<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
    <label for="confirm_password">Confirm Password <span class="req">(required)</span></label>
    <input type="password" name="confirm_password" id="confirm_password" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Confirm Password">
</p>

<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
    <label for="first_name">First Name <span class="req">(required)</span></label>
    <input type="text" name="first_name" id="first_name" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*First Name">
</p>

<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
    <label for="last_name">Last Name <span class="req">(required)</span></label>
    <input type="text" name="last_name" id="last_name" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Last Name">
</p>

<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
    <label for="phone1">Phone Number <span class="req">(required)</span></label>
    <input type="text" name="phone1" id="phone1" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Phone Number">
</p>
<div class="regis-col2">

<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
    <label for="country">Country <span class="req">(required)</span></label>
    <div class="selection-box">
        <select name="country" id="country" class="dropdown">
            <option value="">Select Your Country</option>
            <option value="vietnam">Vietnam</option>
            <option value="cambodia">Cambodia</option>
            <option value="laos">Laos</option>
        </select>
    </div>
</p>
<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
    <label for="addr1">Address <span class="req">(required)</span></label>
    <input type="text" name="addr1" id="addr1" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Address">
</p>

<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
    <label for="postcode">Post Code <span class="req">(required)</span><br>
    <input type="text" name="postcode" id="postcode" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Post Code">
</p>

<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
    <label for="city">Town &amp; City <span class="req">(required)</span></label>
    <input type="text" name="city" id="city" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Town & City">
</p>
</div>
<?php
 }
 add_action( 'woocommerce_register_form', 'wooc_extra_register_fields' );
?>