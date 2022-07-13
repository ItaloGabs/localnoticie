<?php get_header();?>
<div class="content">
    <div class="wrap">
        <?php if(have_posts()) : while(have_posts()) : the_post();?>
        <div class="thumb_post"><?php the_post_thumbnail('full');?></div>
        <div class="texto"><?php the_content();?></div>
        <?php endwhile; endif;?>
    </div>
</div>

<?php get_footer();?> 