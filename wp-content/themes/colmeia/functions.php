<?php 

//Stylesheets
function loading_styles(){
    wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/vendor/swiper-js/swiper-bundle.min.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
    wp_enqueue_style( 'opensans-font', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap', array(), wp_get_theme()->get( 'Version' ), 'all' );
    wp_enqueue_style( 'map-css', get_template_directory_uri() . '/vendor/jqvmap/jqvmap.min.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
    wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
    wp_enqueue_style( 'style-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
    wp_enqueue_style( 'icons-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
}

//Scripts
function loading_scripts(){
    wp_register_script( 'swiper-js', get_template_directory_uri() . '/vendor/swiper-js/swiper-bundle.min.js', array( 'jquery-core' ), wp_get_theme()->get( 'Version' ), true  );
    wp_register_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery-core' ), wp_get_theme()->get( 'Version' ), true  );
    wp_register_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array( 'jquery-core' ), wp_get_theme()->get( 'Version' ), true  );

    wp_enqueue_script( 'swiper-js');
    wp_enqueue_script( 'main-js');
    wp_enqueue_script( 'bootstrap-js');
}

add_action( 'wp_enqueue_scripts', 'loading_styles' );
add_action( 'wp_enqueue_scripts', 'loading_scripts' );


/* Add native pagination.  */
function wp_boostrap_4_pagination(){

    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Check number of pages **/
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="pagination-container"><ul class="pagination justify-content-center">' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="page-item">%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="page-item active"' : ' class="page-item"';
 
        printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="page-item active"' : ' class="page-item"';
        printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="page-item active"' : ' class="page-item"';
        printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="page-item">%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}


/*
* Custom Attribute for links
*/

add_filter('next_posts_link_attributes', 'wp_boostrap_4_pagination_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'wp_boostrap_4_pagination_posts_link_attributes');

function wp_boostrap_4_pagination_posts_link_attributes() {
    return 'class="page-link"';
}

function base_setup() {

    //Tradução
	//load_theme_textdomain( 'base_language', get_template_directory() . '/languages' );

    //Wordpress gerencia o título
    add_theme_support( 'title-tag' );

    //Formatos de posts
    add_theme_support(
        'post-formats',
        array(
            'aside',
            'gallery',
            'image',
            'video',
        )
    );

    // // register a new menu
    // register_nav_menus(
    //     array(
    //     'main-menu'=> __('Main menu'),
    //     'secondary-menu'=> __('Secondary menu'),
    //     'footer-menu'=> __('Footer menu')
    //     )
    // );

// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
// register a new menu
register_nav_menu('main-menu', 'Main menu');
register_nav_menu('secondary-menu', 'Secondary menu');
register_nav_menu('footer-menu', 'Footer menu');

    //Thumbnails ou miniaturas
    add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1920, 9999 );

    //Logo customizado
    $logo_width  = 300;
    $logo_height = 100;

    add_theme_support(
        'custom-logo',
        array(
            'height'               => $logo_height,
            'width'                => $logo_width,
            'flex-width'           => true,
            'flex-height'          => true,
            'unlink-homepage-logo' => true,
        )
    );

    // Add support for full and wide align images
    add_theme_support( 'align-wide' );

}


// Add support for responsive embedded content.
add_theme_support( 'responsive-embeds' );

// Add support for custom line height controls.
add_theme_support( 'custom-line-height' );

// Add support for experimental link color control.
add_theme_support( 'experimental-link-color' );

// Add support for experimental cover block spacing.
add_theme_support( 'custom-spacing' );

add_action( 'after_setup_theme', 'base_setup' );

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

/* Criação das páginas de opções do ACF */
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Opções Gerais'),
            'menu_title'  => __('Opções Gerais'),
            'redirect'    => false,
        ));

        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Rodapé'),
            'menu_title'  => __('Rodapé'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}

/* Remoção do editor do WP */
add_action('init', 'remove_guttenberg_from_pages', 10);
function remove_guttenberg_from_pages()
{
    remove_post_type_support('page', 'editor');
}


// Wordpress Breadcrumb Function

function get_breadcrumb() {

    // Check if is front/home page, return
    if ( is_front_page() ) {
      return;
    }
  
    // Define
    global $post;
    $custom_taxonomy  = ''; // If you have custom taxonomy place it here
  
    $defaults = array(
      'seperator'   =>  '',
      'id'          =>  '',
      'classes'     =>  'items-breadcrumb',
      'home_title'  =>  esc_html__( 'Home', '' )
    );
  
    $sep  = esc_html( $defaults['seperator'] );
  
    // Start the breadcrumb with a link to your homepage
    echo '<div id="'. esc_attr( $defaults['id'] ) .'" class="'. esc_attr( $defaults['classes'] ) .'">';
  
    // Creating home link
    echo '<span class="breadcrumb-item"><a href="'. get_home_url() .'">'. esc_html( $defaults['home_title'] ) .'</a></span>' . $sep;
  
    if ( is_single() ) {
  
      // Get posts type
      $post_type = get_post_type();
  
      // If post type is not post
      if( $post_type != 'post' ) {
  
        $post_type_object   = get_post_type_object( $post_type );
        $post_type_link     = get_post_type_archive_link( $post_type );
  
        echo '<span class="breadcrumb-item"><a href="'. $post_type_link .'">'. $post_type_object->labels->name .'</a></span>'. $sep;
  
      }
  
      // Get categories
      $category = get_the_category( $post->ID );
  
      // If category not empty
      if( !empty( $category ) ) {
  
        // Arrange category parent to child
        $category_values      = array_values( $category );
        $get_last_category    = end( $category_values );
        // $get_last_category    = $category[count($category) - 1];
        $get_parent_category  = rtrim( get_category_parents( $get_last_category->term_id, true, ',' ), ',' );
        $cat_parent           = explode( ',', $get_parent_category );
  
        // Store category in $display_category
        $display_category = '';
        foreach( $cat_parent as $p ) {
          $display_category .=  '<span class="breadcrumb-item">'. $p .'</span>' . $sep;
        }
  
      }
  
      // If it's a custom post type within a custom taxonomy
      $taxonomy_exists = taxonomy_exists( $custom_taxonomy );
  
      if( empty( $get_last_category ) && !empty( $custom_taxonomy ) && $taxonomy_exists ) {
  
        $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
        $cat_id         = $taxonomy_terms[0]->term_id;
        $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
        $cat_name       = $taxonomy_terms[0]->name;
  
      }
  
      // Check if the post is in a category
      if( !empty( $get_last_category ) ) {
  
        echo $display_category;
        echo '<span class="breadcrumb-item">'. get_the_title() .'</span>';
  
      } else if( !empty( $cat_id ) ) {
  
        echo '<span class="breadcrumb-item"><a href="'. $cat_link .'">'. $cat_name .'</a></span>' . $sep;
        echo '<span class="breadcrumb-item">'. get_the_title() .'</span>';
  
      } else {
  
        echo '<span class="breadcrumb-item">'. get_the_title() .'</span>';
  
      }
  
    } else if( is_archive() ) {
  
      if( is_tax() ) {
        // Get posts type
        $post_type = get_post_type();
  
        // If post type is not post
        if( $post_type != 'post' ) {
  
          $post_type_object   = get_post_type_object( $post_type );
          $post_type_link     = get_post_type_archive_link( $post_type );
  
          echo '<span class="breadcrumb-item item-custom-post-type-' . $post_type . '"><a href="' . $post_type_link . '">' . $post_type_object->labels->name . '</a></span>' . $sep;
  
        }
  
        $custom_tax_name = get_queried_object()->name;
        echo '<span class="breadcrumb-item">'. $custom_tax_name .'</span>';
  
      } else if ( is_category() ) {
  
        $parent = get_queried_object()->category_parent;
  
        if ( $parent !== 0 ) {
  
          $parent_category = get_category( $parent );
          $category_link   = get_category_link( $parent );
  
          echo '<span class="breadcrumb-item"><a href="'. esc_url( $category_link ) .'">'. $parent_category->name .'</a></span>' . $sep;
  
        }
  
        echo '<span class="breadcrumb-item">'. single_cat_title( '', false ) .'</span>';
  
      } else if ( is_tag() ) {
  
        // Get tag information
        $term_id        = get_query_var('tag_id');
        $taxonomy       = 'post_tag';
        $args           = 'include=' . $term_id;
        $terms          = get_terms( $taxonomy, $args );
        $get_term_name  = $terms[0]->name;
  
        // Display the tag name
        echo '<span class="breadcrumb-item">'. $get_term_name .'</span>';
  
      } else if( is_day() ) {
  
        // Day archive
  
        // Year link
        echo '<span class="breadcrumb-item"><a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') . ' Archives</a></span>' . $sep;
  
        // Month link
        echo '<span class="breadcrumb-item"><a href="'. get_month_link( get_the_time('Y'), get_the_time('m') ) .'">'. get_the_time('M') .' Archives</a></span>' . $sep;
  
        // Day display
        echo '<span class="breadcrumb-item">'. get_the_time('jS') .' '. get_the_time('M'). ' Archives</span>';
  
      } else if( is_month() ) {
  
        // Month archive
  
        // Year link
        echo '<span class="breadcrumb-item"><a href="'. get_year_link( get_the_time('Y') ) .'">'. get_the_time('Y') . ' Archives</a></span>' . $sep;
  
        // Month Display
        echo '<span class="breadcrumb-item">'. get_the_time('M') .' Archives</span>';
  
      } else if ( is_year() ) {
  
        // Year Display
        echo '<span class="breadcrumb-item">'. get_the_time('Y') .' Archives</span>';
  
      } else if ( is_author() ) {
  
        // Auhor archive
  
        // Get the author information
        global $author;
        $userdata = get_userdata( $author );
  
        // Display author name
        echo '<span class="breadcrumb-item">'. 'Author: '. $userdata->display_name . '</span>';
  
      } else {
  
        echo '<span class="breadcrumb-item">'. post_type_archive_title() .'</span>';
  
      }
  
    } else if ( is_page() ) {
  
      // Standard page
      if( $post->post_parent ) {
  
        // If child page, get parents
        $anc = get_post_ancestors( $post->ID );
  
        // Get parents in the right order
        $anc = array_reverse( $anc );
  
        // Parent page loop
        if ( !isset( $parents ) ) $parents = null;
        foreach ( $anc as $ancestor ) {
  
          $parents .= '<span class="breadcrumb-item"><a href="'. get_permalink( $ancestor ) .'">'. get_the_title( $ancestor ) .'</a></span>' . $sep;
  
        }
  
        // Display parent pages
        echo $parents;
  
        // Current page
        echo '<span class="breadcrumb-item">'. get_the_title() .'</span>';
  
      } else {
  
        // Just display current page if not parents
        echo '<span class="breadcrumb-item">'. get_the_title() .'</span>';
  
      }
  
    } else if ( is_search() ) {
  
      // Search results page
      echo '<span class="breadcrumb-item">' . _e(' Search results for:', 'I Care') . get_search_query() .'</span>';
  
    } else if ( is_404() ) {
  
      // 404 page
      echo '<span class="breadcrumb-item">' . _e('Error 404', 'I Care') . '</span>';
  
    }
  
    // End breadcrumb
    echo '</div>';
  
  }

  function the_breadcrumb() {
        echo '<ol class="breadcrumb">';
    if (!is_home()) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo "</a></li>";
        if (is_category() || is_single()) {
            echo '<li class="breadcrumb-item">';
            the_category(' </li><li class="breadcrumb-item"> ');
            if (is_single()) {
                echo "</li><li class='breadcrumb-item active'>";
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            echo '<li class="breadcrumb-item">';
            echo the_title();
            echo '</li>';
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li class='breadcrumb-item'>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li class='breadcrumb-item'>Search Results"; echo'</li>';}
    echo '</ol>';
}

//Excerpt size
function mytheme_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );



