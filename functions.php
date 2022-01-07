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

// ACF
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_61d75097cdfcd',
        'title' => 'Banner Home',
        'fields' => array(
            array(
                'key' => 'field_61d7509ef325d',
                'label' => 'Imagem Banner',
                'name' => 'imagem_banner',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'uploader' => '',
                'acfe_thumbnail' => 0,
                'return_format' => 'url',
                'preview_size' => 'medium',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'library' => 'all',
            ),
            array(
                'key' => 'field_61d750e6f325e',
                'label' => 'URL Banner',
                'name' => 'url_banner',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'opcoes',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
        'acfe_display_title' => '',
        'acfe_autosync' => '',
        'acfe_form' => 0,
        'acfe_meta' => '',
        'acfe_note' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_61d778ea3479a',
        'title' => 'Formato do Post',
        'fields' => array(
            array(
                'key' => 'field_61d778efaf16d',
                'label' => 'Formato do Post',
                'name' => 'formato_do_post',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'image' => 'Imagem em destaque, sem resumo',
                    'full' => 'Imagem em destaque, com resumo textual',
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
        'acfe_display_title' => '',
        'acfe_autosync' => '',
        'acfe_form' => 0,
        'acfe_meta' => '',
        'acfe_note' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_61d5d0971d926',
        'title' => 'Header',
        'fields' => array(
            array(
                'key' => 'field_61d5d09db2966',
                'label' => 'Botão Header',
                'name' => 'button_header',
                'type' => 'link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'opcoes',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
        'acfe_display_title' => '',
        'acfe_autosync' => '',
        'acfe_form' => 0,
        'acfe_meta' => '',
        'acfe_note' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_61d66edcab941',
        'title' => 'Home',
        'fields' => array(
            array(
                'key' => 'field_61d680fbb2099',
                'label' => 'Artigos em Destaque',
                'name' => 'featured_posts',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfe_repeater_stylised_button' => 0,
                'collapsed' => '',
                'min' => 0,
                'max' => 3,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_61d6810ab209a',
                        'label' => 'Formato de exibição',
                        'name' => 'formato_de_exibicao',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'image' => 'Exibição com imagem grande, sem resumo',
                            'full' => 'Exibição com imagem pequena e resumo',
                        ),
                        'default_value' => false,
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'return_format' => 'value',
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_61d68132b209b',
                        'label' => 'Post',
                        'name' => 'postagem',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => '',
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => '',
                        'save_custom' => 0,
                        'save_post_status' => 'publish',
                        'acfe_bidirectional' => array(
                            'acfe_bidirectional_enabled' => '0',
                        ),
                        'ui' => 1,
                    ),
                ),
            ),
            array(
                'key' => 'field_61d681ae7155d',
                'label' => 'Banner Home',
                'name' => 'banner_home',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'block',
                'acfe_seamless_style' => 0,
                'acfe_group_modal' => 0,
                'sub_fields' => array(
                    array(
                        'key' => 'field_61d681b97155e',
                        'label' => 'Imagem',
                        'name' => 'imagem',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'uploader' => '',
                        'acfe_thumbnail' => 0,
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_61d681c27155f',
                        'label' => 'Link do Banner',
                        'name' => 'link_do_banner',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_61d68153b209c',
                'label' => 'Artigos Recentes',
                'name' => 'recent_posts',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfe_repeater_stylised_button' => 0,
                'collapsed' => '',
                'min' => 0,
                'max' => 3,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_61d68153b209d',
                        'label' => 'Formato de exibição',
                        'name' => 'formato_de_exibicao',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'image' => 'Exibição com imagem grande, sem resumo',
                            'summary' => 'Exibição com imagem pequena e resumo',
                        ),
                        'default_value' => false,
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'return_format' => 'value',
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_61d68153b209e',
                        'label' => 'Post',
                        'name' => 'postagem',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => '',
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'object',
                        'save_custom' => 0,
                        'save_post_status' => 'publish',
                        'acfe_bidirectional' => array(
                            'acfe_bidirectional_enabled' => '0',
                        ),
                        'ui' => 1,
                    ),
                ),
            ),
            array(
                'key' => 'field_61d681e95dc0f',
                'label' => 'Conteúdo',
                'name' => 'conteudo',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'block',
                'acfe_seamless_style' => 0,
                'acfe_group_modal' => 0,
                'sub_fields' => array(
                    array(
                        'key' => 'field_61d681f25dc10',
                        'label' => 'Título',
                        'name' => 'titulo',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_61d681f65dc11',
                        'label' => 'Texto',
                        'name' => 'texto',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '25',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'block_editor',
            1 => 'the_content',
            2 => 'excerpt',
            3 => 'discussion',
            4 => 'comments',
            5 => 'revisions',
            6 => 'slug',
            7 => 'author',
            8 => 'featured_image',
            9 => 'categories',
            10 => 'tags',
            11 => 'send-trackbacks',
        ),
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
        'acfe_display_title' => '',
        'acfe_autosync' => '',
        'acfe_form' => 0,
        'acfe_meta' => '',
        'acfe_note' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_61d7961e79a99',
        'title' => 'Post em Destaque',
        'fields' => array(
            array(
                'key' => 'field_61d7962329c2c',
                'label' => 'Destaques',
                'name' => 'destaques',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfe_repeater_stylised_button' => 0,
                'collapsed' => '',
                'min' => 0,
                'max' => 3,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_61d7963b29c2d',
                        'label' => 'Artigos',
                        'name' => 'destaques_artigo',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => '',
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'object',
                        'save_custom' => 0,
                        'save_post_status' => 'publish',
                        'acfe_bidirectional' => array(
                            'acfe_bidirectional_enabled' => '0',
                        ),
                        'ui' => 1,
                    ),
                ),
            ),
            array(
                'key' => 'field_61d79a985b459',
                'label' => 'Destaques 2 Linha',
                'name' => 'destaques_linha',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfe_repeater_stylised_button' => 0,
                'collapsed' => '',
                'min' => 0,
                'max' => 3,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_61d79a985b45a',
                        'label' => 'Artigos',
                        'name' => 'destaques_artigo',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => '',
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'object',
                        'save_custom' => 0,
                        'save_post_type' => 'post',
                        'save_post_status' => 'publish',
                        'acfe_bidirectional' => array(
                            'acfe_bidirectional_enabled' => '0',
                            'acfe_bidirectional_related' => '',
                        ),
                        'ui' => 1,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'opcoes',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
        'acfe_display_title' => '',
        'acfe_autosync' => '',
        'acfe_form' => 0,
        'acfe_meta' => '',
        'acfe_note' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_61d785bbdfb93',
        'title' => 'Slider Home',
        'fields' => array(
            array(
                'key' => 'field_61d785c0adc13',
                'label' => 'Slider',
                'name' => 'slider',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfe_repeater_stylised_button' => 0,
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_61d785cdadc14',
                        'label' => 'Slide/Post',
                        'name' => 'slidepost',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => '',
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'object',
                        'save_custom' => 0,
                        'save_post_status' => 'publish',
                        'acfe_bidirectional' => array(
                            'acfe_bidirectional_enabled' => '0',
                        ),
                        'ui' => 1,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'opcoes',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
        'acfe_display_title' => '',
        'acfe_autosync' => '',
        'acfe_form' => 0,
        'acfe_meta' => '',
        'acfe_note' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_61d5cf7c43e99',
        'title' => 'Redes Sociais',
        'fields' => array(
            array(
                'key' => 'field_61d5cf82e9351',
                'label' => 'Facebook',
                'name' => 'facebook',
                'type' => 'link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_61d5cf8ae9352',
                'label' => 'Instagram',
                'name' => 'instagram',
                'type' => 'link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_61d5cf98e9353',
                'label' => 'Twitter',
                'name' => 'twitter',
                'type' => 'link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'opcoes',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
        'acfe_display_title' => '',
        'acfe_autosync' => '',
        'acfe_form' => 0,
        'acfe_meta' => '',
        'acfe_note' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_61d6a0a5f10f1',
        'title' => 'Conteúdo',
        'fields' => array(
            array(
                'key' => 'field_61d6a0aea76e9',
                'label' => 'Título',
                'name' => 'content_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_61d6a0baa76ea',
                'label' => 'Texto',
                'name' => 'content_text',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'opcoes',
                ),
            ),
        ),
        'menu_order' => 4,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
        'acfe_display_title' => '',
        'acfe_autosync' => '',
        'acfe_form' => 0,
        'acfe_meta' => '',
        'acfe_note' => '',
    ));
    
    endif;		
    