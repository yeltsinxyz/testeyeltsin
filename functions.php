<?php

function camicado_styles() {

    wp_enqueue_style( 'gotham-font', '//fonts.cdnfonts.com/css/gotham?styles=17581,17579', array(), null );
    wp_enqueue_style( 'swiper-css', '//unpkg.com/swiper@7/swiper-bundle.min.css', array(), null );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/dist/css/bootstrap.min.css', array(), '5.1' );

    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/bootstrap/dist/js/bootstrap.bundle.min.js', array(), '5.1', true );
    wp_enqueue_script( 'swiper-js', '//unpkg.com/swiper@7/swiper-bundle.min.js', array(), null, true );
    wp_enqueue_script( 'swiper-call', get_template_directory_uri( ) . '/js/slider.js', array('swiper-js'), null, true );

}
add_action( 'wp_enqueue_scripts', 'camicado_styles' );

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 1128;

// Register Theme Features
function camicado_theme_features()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'camicado_theme_features' );

// Register Navigation Menus
function camicado_navigation_menus() {

	$locations = array(
		'header' => __( 'Header Menu', 'camicado' ),
		'footer' => __( 'Footer Menu', 'camicado' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'camicado_navigation_menus' );

// options page
if( function_exists('acf_add_options_page') ):

    acf_add_options_page(array(
        'page_title' => 'Opções',
        'menu_slug' => 'opcoes',
        'menu_title' => 'Opções do Tema',
        'capability' => 'edit_posts',
        'position' => '',
        'parent_slug' => '',
        'icon_url' => 'dashicons-admin-site-alt2',
        'redirect' => true,
        'post_id' => 'options',
        'autoload' => false,
        'update_button' => 'Atualizar',
        'updated_message' => 'Opções Atualizadas',
    ));
    
endif;

/**
 * Positron functions and definitions
 *
 */

function positronx_set_post_views($post_id) {
    $count_key = 'wp_post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
     
    if($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}
function positronx_track_post_views ($post_id) {
    if ( !is_single() ) 
    return;
     
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
     
    positronx_set_post_views($post_id);
}
 
add_action( 'wp_head', 'positronx_track_post_views');


remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
function _namespace_modify_menuclass($ulclass) {
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}

add_filter('wp_nav_menu', '_namespace_modify_menuclass');