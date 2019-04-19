<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

get_header(); ?>

	<div id="primary" class="content-area single-page-template">
		<main id="main" class="site-main clear" role="main">

		<?php
		if( is_product() ) {
			get_template_part( 'woocommerce/single-product');  
		} else {
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; // End of the loop.
		}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
