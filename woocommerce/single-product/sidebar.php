<?php  
	$taxonomy = 'product_cat';
	$terms = get_terms();
	$getArgs = array(
		'parent' => 0,
		'hide_empty' => false,
		'exclude' => 30 //Uncategorized
    );
    $terms = get_terms($taxonomy, $getArgs);
?>
<aside id="secondary" class="widget-area widget-single-product" role="complementary">
	<div class="widget product-cat-list clear">
		<?php if ($terms) { ?>
			<ul class="sb_productcats">
			<?php foreach ($terms as $term) { 
				$term_id = $term->term_id;
				//$termchildren = get_term_children( $term_id, $taxonomy ); 
				$termchildren = get_terms( $taxonomy, array( 'child_of' => $term_id ) );
				?>
				<li class="product-cat-parent">
					<h3 class="catname"><?php echo $term->name; ?></h3>
					<?php if ($termchildren) { ?>
						<ul class="termchildren">
							<?php foreach ($termchildren as $child) { 
								$child_term_id = $child->term_id;
								$child_name = $child->name;
								$child_term_link = get_term_link($child,$taxonomy);
								?>
								<li class="childterm"><a href="<?php echo $child_term_link; ?>"><?php echo $child_name; ?></a></li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>
			<?php }  ?>
			</ul>	
		<?php } ?>
	</div>
</aside><!-- #secondary -->
<div class="sidebargrey"></div>