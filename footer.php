	</div><!-- #content -->
	<footer id="colophon" class="site-footer clear" role="contentinfo">
		<div class="row-1 clear">
			<div class="wrapper">
				<div class="row clear">
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
							<div class="footinfo"><a href="tel:+1<?php echo preg_replace('/[^0-9]/','',$phone_number);?>"><?php echo $phone_number;?></a></div>
						<?php endif;?>
						<?php if($email):?>
							<div class="footinfo"><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></div>
						<?php endif;?>
						<div class="footinfo">
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
						</div>
						<?php if($map_link&&$map_text):?>
							<div class="footinfo">
								<a href="<?php echo $map_link;?>"><?php echo $map_text;?></a>
							</div>
						<?php endif;?>
					</div><!--.col-1-->
					<div class="col-2 col">
						<?php $info_title = get_field("footer_info_title","option");?>
						<?php if($info_title):?>
							<header>
								<h2><?php echo $info_title;?></h2>
							</header>
						<?php endif;?>
						<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu','container_class'=>'footer-menu-wrap' ) ); ?>
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

						<?php $footer_newsletter_text = get_field('footer_newsletter_text','option'); ?>
						<?php if($newsletter_title):?>
							<header>
								<h2 class="newsletter"><?php echo $newsletter_title;?></h2>
							</header>
							<div class="formdiv">
								<?php if ($footer_newsletter_text) { ?>
									<div class="newslettertext"><?php echo $footer_newsletter_text ?></div>
								<?php } ?>
								<form method="POST">
									<input type="email" name="email" placeholder="email..." />
									<input type="submit" value="Submit" />
								</form>
							</div>
						<?php endif;?>
					</div><!--.col-3-->
				</div>
			</div><!--.wrapper-->
		</div><!--.row-1-->
		<div class="row-2 clear">
			<div class="wrapper cap">
				Copyright &copy; <?php echo date('Y') ?> <?php echo get_bloginfo('name'); ?> | All Rights Reserved
			</div><!--.wrapper-->
		</div><!--.row-2-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<?php
if ( is_home() || is_front_page() ) { 
	get_template_part( 'inc/instagram'); 
} 	
?>
</body>
</html>
