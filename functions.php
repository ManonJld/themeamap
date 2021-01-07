<?php

use Carbon_Fields\Carbon_Fields;

require_once ('vendor/autoload.php');
require_once __DIR__ . '/cpt/farmproduct.php';
require_once __DIR__ . '/cpt/producer.php';

if(WP_DEBUG) {
    add_action('wp_footer', 'show_template');
}

function show_template() {
    global $template;
    printf('<div style="display: inline-block;background-color: red; color: #FFF; position: fixed; bottom: 0; left: 0; z-index: 9999; padding: 5px 10px; font-size: 10px;">%s</div>',$template);
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    Carbon_Fields::boot();
}

add_action('wp_enqueue_scripts', 'theme_amap_enqueue_styles');
function theme_amap_enqueue_styles() {
    //Chargement des CSS
//    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
//    wp_enqueue_style('slick-css', get_template_directory_uri() . '/slick/slick.css');
//    wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/slick/slick-theme.css', ['slick-css']);
//    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/fontawesome/css/all.min.css');
//    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap', false );
//    wp_enqueue_style('theme-style',
//        get_template_directory_uri() . '/style.css',
//        ['bootstrap-css', 'slick-css', 'slick-theme-css','fontawesome-css', 'wpb-google-fonts'], wp_get_theme()->get('Version'));

//    //Chargement des JS
//    wp_enqueue_script('bootstrap-js',
//        get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js',
//        [],
//        wp_get_theme()->get('Version'),
//        true // Charger le fichier JS avant la fermeture du body
//    );
//
//    wp_enqueue_script('slick-js',
//        get_template_directory_uri() . '/slick/slick.min.js',
//        ['jquery'],
//        wp_get_theme()->get('Version'),
//        true // Charger le fichier JS avant la fermeture du body
//    );

    wp_enqueue_script('bundle-js',
        get_template_directory_uri() . '/dist/bundle.js',
        wp_get_theme()->get('Version'),
        true // Charger le fichier JS avant la fermeture du body
    );
}





/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Enregistrer les emplacements de menu
 */
add_action('after_setup_theme', 'theme_amap_register_menus');
function theme_amap_register_menus() {
    register_nav_menu('menu-top', 'Menu Principal');
    register_nav_menu('menu-footer', 'Menu Pied de page');
}

/**
 * Enregistrer les emplacements des sidebars (widgets)
 */
add_action('widgets_init', 'wpamap_register_sidebars');
function wpamap_register_sidebars()
{
    register_sidebar([
        'id' => 'home-sidebar',
        'name' => 'Page d\'accueil',
        'description' => 'Widgets affichés sur la page d\'accueil',
        'before_widget' => '<div class="card mb-3">',
        'before_title' => '<h3 class="card-header bg-card-frontpage">',
        'after_title' => '</h3><div class="card-body">',
        'after_widget' => '</div></div>']);
    register_sidebar([
        'id' => 'footer-sidebar',
        'name' => 'Pied de page',
        'description' => 'Widgets affichés sur le pied de page',
        'before_widget' => '<div>',
        'before_title' => '<h5>',
        'after_title' => '</h5>',
        'after_widget' => '</div>',
    ]);
        }
/**
 * Activer des fonctionnalités de WordPress
 */
add_action('after_setup_theme', 'theme_amap_theme_support');
function theme_amap_theme_support() {
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-width' => true,
    ]);
    add_theme_support('html5'); // Générer des balises et attributs HTML5
    add_theme_support('title-tag'); // Générer la balise <title> dans le head
    add_theme_support('post-thumbnails'); // Activer les images à la une
    add_theme_support('custom-header'); // Activer la personnalisation de l'image du header
    add_theme_support('custom-background');

}

/**
 * Ajouter des formats d'image dans WordPress
 */
add_action('after_setup_theme', 'wpamap_add_image_sizes');
function wpamap_add_image_sizes() {
    add_image_size('single-producer', 400, 400, false);
}



remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );