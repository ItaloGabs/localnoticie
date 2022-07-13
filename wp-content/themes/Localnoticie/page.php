<?php get_header();?>
<div class="content">
    <div class="wrap">
        <?php if(have_posts()) : while(have_posts()) : the_post();?>
        <div class="texto"><?php the_excerpt();?></div>
        <?php endwhile; endif;?>
        
            <?php $images = easy_image_gallery_get_image_ids();?>
            <?php if($images):foreach($images as $attachment_id):;
            $imagefull = wp_get_attachment_image_src($attachment_id,'');
            $image = wp_get_attachment_image_src($attachment_id,'thumb-custom');?>

            <a href="<?php echo $imagefull[0];?>" rel="fancybox[group]">
                <img src="<?php echo $image[0];?>" class="popup">
        
            </a>
            <?php endforeach; endif;?>
    </div>
</div>
</div>


<?php get_footer();?> 