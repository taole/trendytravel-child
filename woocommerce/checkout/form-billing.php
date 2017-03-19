<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
 * @version 2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/** @global WC_Checkout $checkout */
?>
<div class="woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3><?php _e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

	<?php else : ?>

		<h3><?php _e( 'Billing Details', 'woocommerce' ); ?></h3>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>
	<?php //foreach ( $checkout->checkout_fields['billing'] as $key => $field ) : ?>

		<?php //woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

	<?php //endforeach; ?>
	<?php 
		$user = wp_get_current_user();
		?>
	<div class="clear"></div>
	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
		<label for="account_email"><?php _e( '* Email Address', 'woocommerce' ); ?></label>
		<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="billing_email" id="account_email" value="<?php echo esc_attr( $user->billing_email ); ?>" />
	</p>

	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
	    <label for="billing_phone">* Phone Number</label>
	    <input type="text" name="billing_phone" id="billing_phone" class="woocommerce-Input woocommerce-Input--text input-text" value="<?php echo esc_attr( $user->billing_phone ); ?>" size="25" placeholder="">
	</p>

	<div class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
	<label for="billing_country" class="">* Your Country</label>
	<?php 
		global $woocommerce;
	    $countries_obj   = new WC_Countries();
	    $countries   = $countries_obj->__get('countries');

	    woocommerce_form_field('billing_country', array(
	    'type'       => 'select',
	    'class'		 => 'country-fullwidth',
	    'placeholder'    => __('Select Your Country'),
	    'options'    => $countries,
	    ), $checkout->get_value('billing_country')
	    );
	?>
	</div>

	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
	    <label for="billing_postcode">* Post Code</label>
	    <input type="text" name="billing_postcode" id="billing_postcode" class="woocommerce-Input woocommerce-Input--text input-text" value="<?php echo esc_attr( $user->billing_postcode ); ?>" size="25" placeholder="">
	</p>

	<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
		<label for="billing_first_name"><?php _e( '* First Name', 'woocommerce' ); ?></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_first_name" id="billing_first_name" value="<?php echo esc_attr( $user->billing_first_name ); ?>" />
	</p>

	<p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-last">
		<label for="billing_last_name"><?php _e( '* Surname', 'woocommerce' ); ?></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="billing_last_name" id="billing_last_name" value="<?php echo esc_attr( $user->billing_last_name ); ?>" />
	</p>

	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
	    <label for="billing_address_1">* Address</label>
	    <input type="text" name="billing_address_1" id="billing_address_1" class="woocommerce-Input woocommerce-Input--text input-text" value="<?php echo esc_attr( $user->billing_address_1 ); ?>" size="25" placeholder="">
	</p>

	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
	    <label for="billing_city">* Town</label>
	    <input type="text" name="billing_city" id="billing_city" class="woocommerce-Input woocommerce-Input--text input-text" value="<?php echo esc_attr( $user->billing_city ); ?>" size="25" placeholder="">
	</p>

	<p class="form-row form-row form-row-wide woocommerce-validated" id="billing_company_field">
		<label for="billing_company" class="">Company Name</label>
		<input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" autocomplete="organization" value="<?php echo esc_attr( $user->billing_company ); ?>">
	</p>
	<div class="clear"></div>

	<?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>

	<?php foreach ( $checkout->checkout_fields['order'] as $key => $field ) : ?>

			<?php woocommerce_form_field( $key, $field, "Order Notes - Notes about your order" ); ?>

		<?php endforeach; ?>

	<?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>

		<?php if ( $checkout->enable_guest_checkout ) : ?>

			<p class="form-row form-row-wide create-account">
				<input class="input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php _e( 'Create an account?', 'woocommerce' ); ?></label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( ! empty( $checkout->checkout_fields['account'] ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->checkout_fields['account'] as $key => $field ) : ?>

					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

				<?php endforeach; ?>

				<div class="clear"></div>

			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

	<?php endif; ?>
</div>
