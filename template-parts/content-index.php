<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index"); ?>>
    <img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" style="width: 100%; display: block;">
</article><!-- #post-## -->
