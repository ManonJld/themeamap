<?php

require_once __DIR__ . '/cpt/farmproduct.php';




add_action('wp_enqueue_scripts', 'theme_amap_enqueue_styles');
function theme_amap_enqueue_styles() {
    //Chargement des CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/fontawesome/css/all.min.css');
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap', false );
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css', ['bootstrap-css', 'fontawesome-css', 'wpb-google-fonts'], wp_get_theme()->get('Version'));


    //Chargement des JS
    wp_enqueue_script('bootstrap-js',
        get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js',
        [],
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



remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );