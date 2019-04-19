<?php  
	$post_categories = array();
	$active_categories = array();
 	$taxonomy = 'product_cat';
	$terms = get_terms();
	$getArgs = array(
		'parent' => 0,
		'hide_empty' => false,
		'exclude' => 30 //Uncategorized
    );
    $terms = get_terms($taxonomy, $getArgs);

    if( is_single() ) {
    	$post_terms = get_the_terms( get_the_ID(), $taxonomy );
    	if($post_terms) {
    		foreach ($post_terms as $pterm) { 
    			$k = $pterm->term_id;
				$post_categories[] = $pterm->term_id;
			}
    	}
    	if($terms) {
    		foreach($terms as $tm) {
    			$parent_catid = $tm->term_id;
    			$xchildren = get_terms( $taxonomy, array( 'child_of' => $parent_catid ) );
    			if($xchildren){
    				foreach($xchildren as $xc) {
    					$c_term_id = $xc->term_id;
    					if( $post_categories && in_array($c_term_id,$post_categories) ) {
    						$active_categories[$parent_catid][] = $c_term_id;
    					}
    				}	
    			}
    		}
    	}
	} else {
		$obj = get_queried_object();
		$current_term_id = ( isset($obj->term_id) ) ? $obj->term_id : '';
		if($current_term_id) {
			$active_categories[$current_term_id][] = $current_term_id;
		}
	}

    
?>
<aside id="secondary" class="widget-area widget-single-product" role="complementary">
	<div class="widget product-cat-list clear">
		<?php if ($terms) { ?>
			<ul class="sb_productcats">
			<?php foreach ($terms as $term) { 
				$term_id = $term->term_id;
				$termLink = get_term_link($term, $taxonomy);
				//$termchildren = get_term_children( $term_id, $taxonomy ); 
				$termchildren = get_terms( $taxonomy, array( 'child_of' => $term_id ) );
				if( $active_categories && array_key_exists($term_id,$active_categories) ) {
					$show_children = ' show-children';
				} else {
					$show_children = '';
				}
				?>
				<li id="catid-<?php echo $term_id; ?>" class="product-cat-parent<?php echo $show_children; ?>">
					
					<?php if ($termchildren) { ?>
						<h3 class="catname sbprodcatname"><?php echo $term->name; ?></h3>
						<ul class="termchildren">
							<li class="childterm"><a href="<?php echo $termLink; ?>">All <?php echo $term->name; ?></a></li>
							<?php foreach ($termchildren as $child) { 
								$child_term_id = $child->term_id;
								$child_name = $child->name;
								$child_term_link = get_term_link($child,$taxonomy);
								?>
								<li class="childterm"><a href="<?php echo $child_term_link; ?>"><?php echo $child_name; ?></a></li>
							<?php } ?>
						</ul>
					<?php } else { ?>
						<h3 class="catname sbprodcatname"><a href="<?php echo $termLink; ?>"><?php echo $term->name; ?></a></h3>
					<?php } ?>

				</li>
			<?php }  ?>
			</ul>	
		<?php } ?>
	</div>
</aside><!-- #secondary -->
<div class="sidebargrey"></div>