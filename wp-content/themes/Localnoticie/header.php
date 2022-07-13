
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title();?></title>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' );?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
    <?php wp_head();?>
</head>
<body>
    <?php if(is_home()):?>
    <main>
        <!-- pois a simplicidade visual deve ser sempre priorizada. -->
        <div class="barra">
            <div class="wrap">
                <div class="barra2">
                    <a href="#menu" data-bs-toggle="offcanvas"><span class="iconify menu-acesso" data-icon="codicon:menu"></span></a>
                    <h1><a href="<?php echo site_url();?>" class="gameover" title="<?php bloginfo( 'name' );?>"><?php bloginfo( 'name' );?></a></h1>
                    <a href="perfil.php"><span class="iconify user" data-icon="codicon:account"></span></a>
                </div>
                <div class="info-page">
                    <?php 
                        $args = array('post_type' =>'page', 'pagename' => 'sobre');
                        $mypage = get_posts( $args );

                        if($mypage) : foreach($mypage as $post) : setup_postdata( $post );
                    
                    ?>
                        <h2><?php the_title()?></h2>
                        
                        <?php the_excerpt( )?>
                        <a href="<?php the_permalink();?>" class="botao">Leia Mais</a>
                    <?php endforeach;?>
                        <?php else: ?>
                        <p>Nenhum conteudo inserido</p>
                        <?php endif;?>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start" id="menu">
            <div class="offcanvas-header">
            <h1 class="offcanvas-title menu-titulo">Menu</h1>
            <div class="linha"></div>
        </div>
            <div class="offcanvas-body">
                    <?php wp_nav_menu('menu');?>
                    <div class="menu">
                    <ul>
                        <li>
                            <a href="http://localhost/localnoticie/category/blog/">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php else:?>
        <div class="barra3">
            <div class="wrap">
                <div class="barra2">
                    <a href="#menu" data-bs-toggle="offcanvas"><span class="iconify menu-acesso" data-icon="codicon:menu"></span></a>
                    <h1><a href="<?php echo site_url();?>" class="gameover" title="<?php bloginfo( 'name' );?>"><?php bloginfo( 'name' );?></a></h1>
                    <a href="perfil.php"><span class="iconify user" data-icon="codicon:account"></span></a>
                </div>
                <div class="bg-page">
                    <div class="wrap">
                        <?php if(is_category()):?>
                            <h2>Blog</h2>
                        <?php else:?>
                            <h2><?php the_title()?></h2>
                        <?php endif;?>
                        
                        
                        <?php wp_custom_breadcrumbs()?>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start" id="menu">
            <div class="offcanvas-header">
            <h1 class="offcanvas-title menu-titulo">Menu</h1>
            <div class="linha"></div>
        </div>
            <div class="offcanvas-body">
                <?php wp_nav_menu('menu');?>
                <div class="menu">
                    <ul>
                        <li>
                            <a href="http://localhost/localnoticie/category/blog/">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <?php endif;?>