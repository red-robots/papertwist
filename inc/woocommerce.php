<?php /*
*   File provides custom functions for woo
*/

if(!function_exists('woocommerce_support')){ 
	add_action( 'after_setup_theme', 'woocommerce_support' );
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
}