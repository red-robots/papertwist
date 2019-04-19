<?php /*
*   File provides custom functions for woo
*/

if(!function_exists('woocommerce_support')){ 
	add_action( 'after_setup_theme', 'woocommerce_support' );
	function woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
}

if(!function_exists('woocustom_single_sidebar')){ 
	function woocustom_single_sidebar() {
		wc_get_template( 'single-product/sidebar.php' );
	}
}

if(!function_exists('woocustom_single_product_description')) {
	function woocustom_single_product_description() {
		wc_get_template( 'single-product/product-description.php' );
	}
}

/* Change number of related products output */
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 2; // arranged in 2 columns
	return $args;
}
