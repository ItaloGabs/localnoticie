<?php 
//HABILITANDO IMAGENS DESTACADAS
add_theme_support('post-thumbnails');
add_image_size( 'thumb-custom', 232, 156, true );


//CUSTOM POST TYPE
add_action('init','videos_registrer');
function videos_registrer(){
    $labels = array(
        'name'=>_x( 'Videos', 'post type general name'),
        'singular_name'=>_x( 'Videos', 'post type general name'),
        'add_new'=>_x( 'Adicionar novo video','video'),
        'add_new_item'=>__( 'Adicionar novo'),
        'edit_item'=>__( 'Editar video'),
        'new_item'=>__( 'Novo video'),
        'view_item'=>__( 'Ver video'),
        'search_items'=>__( 'Procurar video'),
        'not_found'=>__( 'Nada Encontrado'),
        'not_found_in_trash'=>__( 'Nada Encontrado no lixo'),
        'parent_item_colon'=>__( ''),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'has_archive' => false,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title'),
    );
    register_post_type('videos',$args);
}


//  MOSTRA OS CAMINHOS DO SEU SITE IGUAL DO BRUNO
function wp_custom_breadcrumbs() {
  
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
  
  global $post;
  $homeLink = get_bloginfo('url');
  
  if (is_home() || is_front_page()) {
  
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
  
  } else {
  
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
  
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
  
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
  
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
  
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
  
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
  
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
  
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
  
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
  
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
  
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
  
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
  
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
  
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
  
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  
    echo '</div>';
  
  }
} // end qt_custom_breadcrumbs()

if(function_exists('register_sidebar'))
  register_sidebar( array(
    'name' => 'Sidebar footer',
    'id' => 'sidebar-footer',
    'before_widget' => '<div class="box">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ));

add_action('init','register_clientes');
function register_clientes(){
  register_post_type('clientes',[
    'label'=>  'Clientes',
    'public' => true,
    'capability_type' => 'post',
    'supports' => array('title','editor','author','thumbnail','excerpt'),
    'taxonomies' => array('category')
  ]);
}





add_action('wp_ajax_nopriv_get_clientes_api','get_clientes_api');
add_action('wp_ajax_get_clientes_api','get_clientes_api');
function get_clientes_api(){
  $file = get_stylesheet_directory() . '/report.txt';
  $current_page = (!empty($_POST['current_page']) ) ? $_POST['current_page'] : 0;
  $clientes = [];

  $result =wp_remote_retrieve_body( wp_remote_get('http://localhost:3000/clientes/?index=' . $current_page));

  file_put_contents($file, "Current Page: " . $current_page . "\n\n", FILE_APPEND);

  $result= json_decode($result);
  
  if(!is_array($result) || empty($result)){
    return false;
  }

  $clientes[] = $result;

  foreach($clientes[0] as $cliente){
    $clientes_slug = sanitize_title($cliente -> company);

   $inserido_noWp = wp_insert_post([
      'post_name' => $clientes_slug,
      'post_title' => $clientes_slug,
      'post_type' => 'clientes',
      'post_status' => 'publish'
    ] );


    if(is_wp_error( $inserido_noWp)){
      continue;
    }


    $fillabel = [
      'field_62ccb6a88f998' => 'index',
      'field_62ccba128f999' => 'isactive',
      'field_62ccbad9ae92e' => 'balance',
      'field_62ccbadfae92f' => 'picture',
      'field_62ccbae7ae930' => 'age',
      'field_62ccbaf4ae932' => 'company',
    ];

    foreach($fillabel as $key => $index){
      update_field($key, $cliente->$index,$inserido_noWp);
    }

  }


  $current_page++;
  wp_remote_post( admin_url('admin-ajax.php?action=get_clientes_api'), [
    'blocking' => false,
    'sslverify' => false,
    'body' => [
      'current_page' => $current_page
    ]
  ] );

}







?>

