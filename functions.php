<?php
add_action('wp_enqueue_scripts', 'theme_amap_enqueue_styles');
function theme_amap_enqueue_styles() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css', [], wp_get_theme()->get('Version'));
}