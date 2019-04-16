<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<div class="row-1">
			<div class="wrapper cap">
				<nav class="header-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'header-top' ) ); ?>
				</nav><!--.header-menu-->
				<a class="cart" href="<?php echo wc_get_cart_url();?>">
					<i class="fal fa-shopping-cart"></i>
				</a>
				<div id="bella-search" class="clear-bottom">
					<form action="<?php echo get_the_permalink($search_link_id);?>" method="POST">
						<input type="text" name="search" placeholder="" <?php if(isset($_POST['search'])) echo 'value="'.$_POST['search'].'"';?>>
					</form>
					<div class="search">
						<i class="far fa-search"></i>
					</div><!--.search-->
				</div><!--.search-->
			</div><!--.wrapper-->
		</div><!--.row-1-->
		<div class="row-2">
			<div class="wrapper cap">
				<?php if(is_home()) { ?>
					<h1 class="logo">
						<a href="<?php bloginfo('url'); ?>" class="clear-bottom"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
					</h1>
				<?php } else { ?>
					<div class="logo">
						<a href="<?php bloginfo('url'); ?>" class="clear-bottom"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
					</div>
				<?php } ?>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'bellaworks' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div><!-- wrapper -->
		</div><!--.row-2-->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">
