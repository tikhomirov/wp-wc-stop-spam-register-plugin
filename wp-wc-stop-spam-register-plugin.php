<?php
/**
 * Plugin Name: WooCommerce stop spam user registrations.
 * Plugin URI: https://rwsite.ru/
 * Description: WooCommerce stop spam user registrations. Needed jQuery.
 * Version: 1.0.0
 * Author: Aleksey Tikhomirov
 * Author URI: https://rwsite.ru/
 */

defined('ABSPATH') || die();

add_action('plugins_loaded', function () {

	add_action('woocommerce_register_form', function (){
		?>
        <input type="hidden" name="stopper" class="stopper" value="">
		<?php
	});

	add_action('wp_print_footer_scripts', function (){
		?>
        <script type="text/javascript">
            jQuery( function( $ ) {
                $('.stopper').val('<?= wp_create_nonce('stopper')?>');
            });
        </script>
		<?php
	});

	add_filter( 'woocommerce_registration_errors', function (WP_Error $errors, $username, $email){
		if( !isset($_POST['stopper']) || !wp_verify_nonce($_POST['stopper'], 'stopper')) { // || $_POST['agree'] === 'on'
			$errors->add( 'spam', 'Спам регистрация. Включите поддержку JS в браузере, если это не так.' );
			trigger_error($errors->get_error_message());
		}
		return $errors;
	}, 10,3 );

});
