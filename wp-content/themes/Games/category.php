<?php get_header();?>
<div class="content">
    <div class="wrap">
        <div class="blog">
                <h2>BLOG</h2>
                <div class="caixa-liste-post">
                <?php 
                    $cont = 1;
                    if(have_posts()) : while(have_posts()) : the_post();?>
                    <div class="liste-post <?php if(($cont % 2) == 0 )echo "segundo-post";?>">
                            <?php the_post_thumbnail()?>
                        <div class="caixa-conteudo-post">
                            <h2><?php the_title()?></h2>
                            <p><?php the_excerpt()?></p>
                            <a href="<?php the_permalink();?>" class="botao">Leia Mais</a>
                        </div>
                    </div>
                    <?php $cont++; endwhile; endif;?>
                </div>
                <div class="paginacao">        
                    <?php $current = max(1,get_query_var('paged'));
                    echo paginate_links( array(
                        'current' => $current,
                        'prev_text' => __('<<'),
                        'next_text' => __('>>')
                    ))
                    ?>
                </div>
            </div> 
        <div class="clear"></div>
    </div>
    <div class="widgets">
        <div class="wrap">
            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar footer')):?>
            <?php endif;?>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer();?> 