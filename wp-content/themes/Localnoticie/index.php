<?php get_header();?>
<div class="blog">
    <div class="wrap">
        <h2>Clientes</h2>
        <div class="caixa-liste-post">
        <?php 
            $args = array('post_type' =>'clientes', 'showposts' => '5');
            $mypost = get_posts( $args );
            $cont = 1;
            if($mypost) : foreach($mypost as $post) : setup_postdata( $post );?>
            <div class="liste-post <?php if(($cont % 2) == 0) echo "segundo-post";?>">
            <?php the_post_thumbnail()?>
                <div class="caixa-conteudo-post">
                    <h2><?php the_title()?></h2>
                    <p><?php the_excerpt()?></p>
                    <span>SEU ID:<?php echo get_field('index');?></span> /
                    <span>SUA IDADE:<?php echo get_field('age');?></span>
                    <a href="<?php the_permalink();?>" class="botao">Leia Mais</a>
                </div>
            </div>
            <?php $cont++; endforeach; endif;?>
        </div>
    </div>
</div>

<div class="clear"></div>

<div class="videos">
    <h2>Videos</h2>
    <div class="wrap2">
                <?php 
                    $args = array('post_type' =>'videos', 'showposts' => '10');
                    $myvideo = get_posts( $args );
                    $cont = 1;
                    if($myvideo) : foreach($myvideo as $post) : setup_postdata( $post );?>
                    <?php 
                        $textodescricao = get_field('link_youtube');
                        $parsed         = parse_url($textodescricao);
                        $hostname       = $parsed['host'];
                        $query          = $parsed['query'];
                        $path           = $parsed['path'];
                        $arr = explode('v=',$query);
                        $videoWidth = $arr[1];
                        $videoId = substr($videoWidth,0,11);
                        if((isset($videoId)) && (isset($hostname)) && ($hostname=='www.youtube.com' || $hostname=='youtube.com')){?>
                        <iframe class="iframme" src="http://www.youtube.com/embed/<?php echo $videoId;?>" width="707" heigth="375" frameborder="0"></iframe><?php }?>
                <?php endforeach; endif; wp_reset_postdata()?>
    </div>
</div>


<?php get_footer();?> 
