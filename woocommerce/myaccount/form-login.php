<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1">

<?php endif; ?>

		<h2><?php _e( 'Login', 'woocommerce' ); ?></h2>
		<p>Already a registered user? Login below</p>
		<form method="post" class="login">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" placeholder="*Enter Email Address" />
			</p>
			<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" placeholder="*Enter Password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Forgot password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="u-column2 col-2">

		<h2><?php _e( 'Register', 'woocommerce' ); ?></h2>
		<p>Create an account</p>
		<form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>
			<div class="register-left">
				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
						<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
					</p>

				<?php endif; ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
					<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input placeholder="*Email Address" type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
				</p>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

					<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
						<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
						<input placeholder="*Password" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
					</p>

				<?php endif; ?>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				    <label for="confirm_password">Confirm Password <span class="req">(required)</span></label>
				    <input type="password" name="confirm_password" id="confirm_password" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Confirm Password">
				</p>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				    <label for="billing_first_name">First Name <span class="req">(required)</span></label>
				    <input type="text" name="billing_first_name" id="billing_first_name" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*First Name">
				</p>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				    <label for="billing_last_name">Last Name <span class="req">(required)</span></label>
				    <input type="text" name="billing_last_name" id="billing_last_name" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Last Name">
				</p>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				    <label for="billing_phone">Phone Number <span class="req">(required)</span></label>
				    <input type="text" name="billing_phone" id="billing_phone" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Phone Number">
				</p>
			</div>

			<div class="register-right">

				<!-- <div class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				    <label for="billing_country">Country <span class="req">(required)</span></label>
				    <div class="selection-box">
				        <select name="billing_country" id="billing_country" class="dropdown">
				            <option value="">Select Your Country</option>
				            <option value="vietnam">Vietnam</option>
				            <option value="cambodia">Cambodia</option>
				            <option value="laos">Laos</option>
				        </select>
				    </div>
				</div> -->

				<?php 
					global $woocommerce;
				    $countries_obj   = new WC_Countries();
				    $countries   = $countries_obj->__get('countries');
				    //$countries   = $countries_obj->country_dropdown_options('Select Your Country');
				    echo '<div id="my_custom_countries">';

				    woocommerce_form_field('billing_country', array(
				    'type'       => 'select',
				    'class'      => array( 'chzn-drop' ),
				    'placeholder'    => __('Select Your Country'),
				    'options'    => $countries,
				    )
				    );
				    echo '</div>';
				?>
				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				    <label for="billing_address_1">Address <span class="req">(required)</span></label>
				    <input type="text" name="billing_address_1" id="billing_address_1" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Address">
				</p>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				    <label for="billing_postcode">Post Code <span class="req">(required)</span></label>
				    <input type="text" name="billing_postcode" id="billing_postcode" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Post Code">
				</p>

				<p class="woocommerce-FormRow woocommerce-FormRow--wide form-row form-row-wide">
				    <label for="billing_city">Town &amp; City <span class="req">(required)</span></label>
				    <input type="text" name="billing_city" id="billing_city" class="woocommerce-Input woocommerce-Input--text input-text" value="" size="25" placeholder="*Town & City">
				</p>
			</div>

			<!-- Spam Trap -->
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="woocomerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
