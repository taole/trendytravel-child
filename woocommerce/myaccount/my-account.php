<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

/**
 * My Account navigation.
 * @since 2.6.0
 */
//do_action( 'woocommerce_account_navigation' ); ?>

<?php $user = wp_get_current_user(); ?>
<div class="woocommerce-MyAccount-content">
	<h2 class="title profile-title">Hi <?php echo $user->user_nicename; ?></h2>
	<?php
		/**
		 * My Account content.
		 * @since 2.6.0
		 */
		include 'form-edit-account.php';
		?>
		<div class="all-orders">
		<?php
		$customer_orders = wc_get_orders( apply_filters( 'woocommerce_my_account_my_orders_query', array( 'customer' => get_current_user_id()) ) );
		wc_get_template(
			'myaccount/my-orders.php',
			array(
		
				'customer_orders' => $customer_orders,
				'has_orders' => 0 < $customer_orders->total,
			)
		);
		?>
            <div class="view-basket"><a href="/cart">View Basket</a></div>
		</div>

		<?php
		//do_action( 'woocommerce_account_content' );
	?>

	<!-- modal  -->
            <div id="review-popup" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
							<div id="TA_cdswritereviewlg67" class="TA_cdswritereviewlg">
							<ul id="nPjqexKkQ" class="TA_links oTZh29O">
							<li id="XJTJ3iVgek" class="TIa5xoHnts">
							<a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/medium-logo-12097-2.png" alt="TripAdvisor"/></a>
							</li>
							</ul>
							</div>
							<script src="https://www.jscache.com/wejs?wtype=cdswritereviewlg&amp;uniq=67&amp;locationId=10514184&amp;lang=en_US&amp;lang=en_US&amp;display_version=2"></script>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
</div>
