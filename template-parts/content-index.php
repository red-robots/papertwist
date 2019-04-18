<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */
$home_page_id = get_home_page_id();
$post = get_post($home_page_id);
setup_postdata($post);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index clear"); ?>>
    <?php
    /* ROW 2 - FEATURED PRODUCTS */
    $featured_products = get_field('home_featured_products',$home_page_id);
    if($featured_products) { 
        $product_ids = array();
        foreach($featured_products as $pid) {
            $product_ids[] = $pid;
        } 
        $args = array(
            'posts_per_page'=> -1,
            'post_type'     => 'product',
            'post_status'   => 'publish',
            'post__in'      => $product_ids,
            'orderby'       => 'post__in',
            'order'         => 'ASC'
        );
        $query = new WP_Query($args);
        if($query->have_posts()) { ?>
        <section class="row-2 home-featured-products section clear">
            <div class="wrapper">
                <div class="productrow clear">
                    <ul class="productlist">
                        <?php while($query->have_posts()):$query->the_post();?>
                            <?php wc_get_template_part( 'content', 'product' ); ?>
                        <?php endwhile;?>
                    </ul>
                </div>
            </div>
        </section>
        <?php } ?>
    <?php } ?>

    <?php
    /* ROW 3 - IMAGES */
    $row_3_images = get_field("row_3_images",$home_page_id);
    if($row_3_images) { ?>
        <section class="row-3 row-3-images section clear">
            <div class="wrapper">
                <div class="flexrow clear">
                <?php foreach($row_3_images as $row) {
                    $image = $row['image'];
                    $imagelink = $row['imagelink'];
                    if($image):?>
                    <div class="flexbox">
                        <?php if ($imagelink) { ?><a class="imagelink" href="<?php echo $imagelink ?>"><?php } ?>
                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                        <?php if ($imagelink) { ?></a><?php } ?>
                    </div>
                    <?php endif;?>
                <?php } ?>
                </div>
            </div><!--.wrapper.cap-->
        </section><!--.row-3-->
    <?php } ?>

    <?php /* INSTAGRAM FEEDS */ ?>
    <section id="instagram_section" class="section instagram-feeds-section clear">
        <div class="wrapper">
            <?php 
            $instagram_link = get_field("instagram_link","option");
            $instagram_text = get_field("instagram_text","option");
            if($instagram_link&&$instagram_text) { ?>
            <div class="instagram-icon">
                <a class="icon" href="<?php echo $instagram_link;?>" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            <?php } ?>
            <div id="instagram_feeds" class="flexrow clear"></div>
            <?php if($instagram_link&&$instagram_text) { ?>
                <div class="instagram-text-link">
                    <a class="button" href="<?php echo $instagram_link;?>" target="_blank"><?php echo $instagram_text;?></a>
                </div>
            <?php } ?>
        </div>
    </section>

</article>
