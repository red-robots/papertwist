<?php $flexslider = get_field("flexslider");
if($flexslider):?>
    <section class="slider-wrapper clear">
        <div class="flexslider clear">
            <ul class="slides">
                <?php foreach($flexslider as $slide):?>
                    <?php $image = $slide['image'];
                    if($image):?>
                        <li class="slide">  
                            <div class="imagediv" style="background-image:url('<?php echo $image['url']?>');"></div>
                            <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                        </li>
                    <?php endif;?>
                <?php endforeach;?>
            </ul><!--.slides-->
        </div><!--.flexslider-->
    </section><!--.row-1-->
<?php endif;?>