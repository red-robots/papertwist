<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<span id="menuToggle" class="closemenu closeBtn"><span></span></span>
<div class="mobilemenuwrap">
	<div class="mobilemenu">
		<span class="close closemenu"><span></span></span>
		<nav class="navwrap"><?php wp_nav_menu( array( 'menu' => 'Mobile Menu', 'menu_id' => 'mobile-menu','container'=>false ) ); ?></nav>
	</div>
</div>
		
<div id="page" class="site clear">
	<header id="masthead" class="site-header clear" role="banner">
		<div class="row-1">
			<div class="wrapper">
				<?php 
				$phone = get_field('phone_number','option'); 
				$phone_number = ($phone) ? format_phone_number($phone) : '';
				if($phone) {
					$phone = str_replace('(','',$phone);
					$phone = str_replace(')','.',$phone);
					$phone = str_replace('-','.',$phone);
					$phone = preg_replace('/\s+/','',$phone);
				}
				?>
				<div class="topwrap">
					<nav class="header-menu">
						<?php wp_nav_menu( array( 'theme_location' => 'header-top','container'=>false ) ); ?>
						<a class="myaccount" href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>">My Account</a>
						<?php if ($phone_number) { ?>
						<a class="phone" href="tel:<?php echo $phone_number ?>"><?php echo $phone ?></a>	
						<?php } ?>
						<a class="cart" href="<?php echo wc_get_cart_url();?>"><i class="fal fa-shopping-cart"></i></a>
					</nav><!--.header-menu-->
					<?php 
						$search_string =  ( isset($_GET['search']) && $_GET['search'] ) ? $_GET['search'] : ''; 
						$stripped = preg_replace('/\s/', '', $search_string);
						$search_string = ($stripped) ? $search_string : '';
					?>
					<div id="bella-search" class="clear-bottom topsearchform <?php echo ($search_string) ? 'show-field':'hide-field'; ?>">
						<form action="" method="GET">
							<input type="text" name="search" class="searchfield" placeholder="" value="<?php echo $search_string ?>" />
						</form>
						<span class="search-icon"><span class="icon"><i class="far fa-search"></i></span></span><!--.search-->
					</div><!--.search-->
				</div>

			</div><!--.wrapper-->
		</div><!--.row-1-->
		<div class="row-2 clear">
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
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class'=>'main-menu-wrapper' ) ); ?>
				</nav><!-- #site-navigation -->
			</div><!-- wrapper -->
		</div><!--.row-2-->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">
