<?php

function camicado_styles() {

    wp_enqueue_style( 'gotham-font', '//fonts.cdnfonts.com/css/gotham?styles=17581,17579', array(), null );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/dist/css/bootstrap.min.css', array(), '5.1' );
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/bootstrap/dist/js/bootstrap.bundle.min.js', array(), '5.1' );

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