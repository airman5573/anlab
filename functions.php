<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


function sma_scripts() {
    $the_theme     = wp_get_theme();
    $theme_version = $the_theme->get( 'Version' );

    $vendor_css_version = $theme_version . '.' . filemtime( get_template_directory() . '/dist/css/vendors.min.css' );
    wp_enqueue_style( 'vendor-styles', get_template_directory_uri() . '/dist/css/vendors.min.css', array(), $vendor_css_version );

    $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/dist/css/main.min.css' );
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/dist/css/main.min.css', array(), $css_version );

    wp_enqueue_script( 'jquery' );


    $vendor_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/dist/js/vendors.min.js' );
    wp_enqueue_script( 'vendor-scripts', get_template_directory_uri() . '/dist/js/vendors.min.js', array(), $vendor_js_version, true );

    $js_version = $theme_version . '.' . filemtime( get_template_directory() . '/dist/js/app.min.js' );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/dist/js/app.min.js', array(), $js_version, true );
}

add_action( 'wp_enqueue_scripts', 'sma_scripts' );



register_nav_menus(
    array(
        'primary_menu'  => 'Primary Menu',
        'secondary_menu'    => 'Secondary Menu',
        'footer_menu'    => 'Footer Menu'
    )
);


add_action('parse_query', 'pmg_ex_sort_posts');

function pmg_ex_sort_posts($q)
{
    if(!$q->is_main_query() || is_admin())
        return;
    
    if(
        !is_post_type_archive('team') && !is_post_type_archive('portfolio') &&!is_tax('team_categories')
    ) return;

    $q->set('orderby', 'menu_order');
    $q->set('order', 'ASC');
}

add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
    return $title;    
});


add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );

function wpse156165_menu_add_class( $atts, $item, $args ) {
    $class = 'primary-menu-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );  

add_action( 'after_setup_theme', function() {
    add_theme_support( 'responsive-embeds' );
} );


