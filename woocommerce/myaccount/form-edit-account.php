<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post">

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>
	<div class="clear"></div>

	<?php 
		$user = wp_get_current_user();
		?>
	<div class="clear"></div>
	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
		<label for="account_email"><?php _e( '* Email address', 'woocommerce' ); ?></label>
		<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->billing_email ); ?>" />
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
	    ), $user->billing_country	
	    );
	?>
	</div>

	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
	    <label for="billing_postcode">* Post Code</label>
	    <input type="text" name="billing_postcode" id="billing_postcode" class="woocommerce-Input woocommerce-Input--text input-text" value="<?php echo esc_attr( $user->billing_postcode ); ?>" size="25" placeholder="">
	</p>

	<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
		<label for="billing_first_name"><?php _e( '* First name', 'woocommerce' ); ?></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="billing_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
	</p>

	<p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-last">
		<label for="billing_last_name"><?php _e( '* Surname', 'woocommerce' ); ?></label>
		<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="billing_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
	</p>

	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
	    <label for="billing_address_1">* Address</label>
	    <input type="text" name="billing_address_1" id="billing_address_1" class="woocommerce-Input woocommerce-Input--text input-text" value="<?php echo esc_attr( $user->billing_address_1 ); ?>" size="25" placeholder="">
	</p>

	<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
	    <label for="billing_city">* Town</label>
	    <input type="text" name="billing_city" id="billing_city" class="woocommerce-Input woocommerce-Input--text input-text" value="<?php echo esc_attr( $user->billing_city ); ?>" size="25" placeholder="">
	</p>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details' ); ?>
		<input type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Update', 'woocommerce' ); ?>" />
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
