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
    <?php $flexslider = get_field("flexslider");
    if($flexslider):?>
        <section class="row-1">
            <div class="flexslider">
                <ul class="slides">
                    <?php foreach($flexslider as $slide):?>
                        <?php $image = $slide['image'];
                        if($image):?>
                            <li><img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>"></li>
                        <?php endif;?>
                    <?php endforeach;?>
                </ul><!--.slides-->
            </div><!--.flexslider-->
        </section><!--.row-1-->
    <?php endif;?>
    <?php $args = array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'posts_per_page'        => 4,
        'order'=>'ASC',
        'orderby'=>'rand',
        'tax_query' => array(
            'relation'=>'AND',       
            array(
                'taxonomy'=>'product_visibility',
                'field'=>'slug',
                'terms'=>array('exclude-from-catalog','exclude-from-search'),
                'operator'=>'NOT IN'
            ),
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN',
            )
        )
    );
    $query = new WP_Query($args);
    if($query->have_posts()):?>
        <section class="row-2">
            <div class="wrapper cap clear-bottom">
                <ul>
                    <?php while($query->have_posts()):$query->the_post();?>
                        <?php wc_get_template_part( 'content', 'product' ); ?>
                    <?php endwhile;?>
                </ul>
            </div><!--.wrapper.cap-->
        </section><!--.section-2-->
        <?php wp_reset_postdata();
    endif;?>
    <?php $post = get_post(22);
	setup_postdata($post);
    $repeater = get_field("row_3_images");
    if($repeater):?>
        <section class="row-3">
            <div class="wrapper cap clear-bottom">
                <?php foreach($repeater as $row):
                    $image = $row['image'];
                    if($image):?>
                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                    <?php endif;?>
                <?php endforeach;?>
            </div><!--.wrapper.cap-->
        </section><!--.row-3-->
    <?php endif;?>
    <section class="row-4">
        <div class="wrapper cap">
            <div class="row-1">
                <i class="fa fa-instagram"></i>
            </div><!--.row-1-->
            <div class="row-2">
                <?php // echo do_shortcode("[instagram-feed]");?>
            </div><!--.row-2-->
            <?php $instagram_link = get_field("instagram_link","option");
            $instagram_text = get_field("instagram_text","option");
            if($instagram_link&&$instagram_text):?>
                <div class="row-3">
                    <a href="<?php echo $instagram_link;?>"><?php echo $instagram_text;?></a>
                </div><!--.row-3-->
            <?php endif;?>
        </div><!--.wrapper.cap-->
    </section><!--.row-4-->
</article><!-- #post-## -->
