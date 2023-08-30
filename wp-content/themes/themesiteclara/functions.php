<?php 

function themesiteclara_supports () {
    add_theme_support('title-tag');
    add_theme_support('menus');
    /**register_nav_menu('header', 'En tête du menu');**/
}

function themesiteclara_register_assets () {
    wp_register_style('style', get_stylesheet_uri(), '/style.css');
    wp_enqueue_style('style'); 
}

function register_custom_menus() {
    register_nav_menu('left_menu', 'En tête du menu');
}
add_action('init', 'register_custom_menus');


add_action('after_setup_theme','themesiteclara_supports');
add_action('wp_enqueue_scripts','themesiteclara_register_assets');
?>