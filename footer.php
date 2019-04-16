<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bellaworks
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row-1">
			<div class="wrapper cap">
				<div class="col-1 col">
					<?php $contact_title = get_field("footer_contact_title","option");
					$email = get_field("email","option");
					$phone_number = get_field("phone_number","option");
					$address_line_1 = get_field("address_line_1","option");
					$address_line_2 = get_field("address_line_2","option");
					$map_text = get_field("map_text","option");
					$map_link = get_field("map_link","option");?>
					<?php if($contact_title):?>
						<header>
							<h2><?php echo $contact_title;?></h2>
						</header>
					<?php endif;?>
					<?php if($phone_number):?>
						<a href="tel:+1<?php echo preg_replace('/[^0-9]/','',$phone_number);?>"><?php echo $phone_number;?></a>
					<?php endif;?>
					<?php if($email):?>
						<a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
					<?php endif;?>
					<?php if($address_line_1):?>
						<div class="address-line-1">
							<?php echo $address_line_1;?>
						</div><!--.address-line-1-->
					<?php endif;?>
					<?php if($address_line_2):?>
						<div class="address-line-2">
							<?php echo $address_line_2;?>
						</div><!--.address-line-1-->
					<?php endif;?>
					<?php if($map_link&&$map_text):?>
						<a href="<?php echo $map_link;?>">
							<?php echo $map_text;?>
						</a>
					<?php endif;?>
				</div><!--.col-1-->
				<div class="col-2 col">
					<?php $info_title = get_field("footer_info_title","option");?>
					<?php if($info_title):?>
						<header>
							<h2><?php echo $info_title;?></h2>
						</header>
					<?php endif;?>
					<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
				</div><!--.row-2-->
				<div class="col-3 col">
					<?php $social_title = get_field("footer_social_title","option");
					$newsletter_title = get_field("footer_newsletter_title","option");
					$facebook_link = get_field("facebook_link","option");
					$twitter_link = get_field("twitter_link","option");
					$instagram_link = get_field("instagram_link","option");?>
					<?php if($social_title):?>
						<header>
							<h2><?php echo $social_title;?></h2>
						</header>
					<?php endif;?>
					<?php if($facebook_link||$twitter_link||$instagram_link):?>
						<div class="social">
							<?php if($facebook_link):?>
								<a href="<?php echo $facebook_link;?>"><i class="fab fa-facebook-f"></i></a>
							<?php endif;?>
							<?php if($instagram_link):?>
								<a href="<?php echo $instagram_link;?>"><i class="fab fa-instagram"></i></a>
							<?php endif;?>
							<?php if($twitter_link):?>
								<a href="<?php echo $twitter_link;?>"><i class="fab fa-twitter"></i></a>
							<?php endif;?>
						</div><!--.social-->
					<?php endif;?>
					<?php if($newsletter_title):?>
						<header>
							<h2><?php echo $newsletter_title;?></h2>
						</header>
					<?php endif;?>
				</div><!--.col-3-->
			</div><!--.wrapper-->
		</div><!--.row-1-->
		<div class="row-2">
			<div class="wrapper cap">
				<?php $copyright = get_field("copyright","option");
				if($copyright):?>
					<?php echo $copyright;?>
				<?php endif;?>
			</div><!--.wrapper-->
		</div><!--.row-2-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
