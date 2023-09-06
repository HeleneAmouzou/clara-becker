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

function themesiteclara_add_admin_pages() {
    add_menu_page('Settings of themesiteclara', 'themesiteclara', 'manage_options', 'themesiteclara-settings', 'themesiteclara_settings', 'dashicons-admin-settings', 60);
}

function themesiteclara_settings () {
    echo '<h1>' . get_admin_page_title() . '</h1>';
    echo '<form action="options.php" method="post" name="themesiteclara_settings">';
    echo '<div>';
    settings_fields('themesiteclara_settings_fields');
    do_settings_sections('themesiteclara_settings_section');
    submit_button();
    echo '</div>';
    echo '</form>';
}

function themesiteclara_settings_register() {
    register_setting('themesiteclara_settings_fields', 'themesiteclara_settings_fields', 'themesiteclara_settings_fields_validate');
    add_settings_section('themesiteclara_settings_section', 'Paramètres', 'themesiteclara_settings_section_introduction', 'themesiteclara_settings_section');
    add_settings_field('themesiteclara_settings_field_introduction', 'Introduction', 'themesiteclara_settings_field_introduction_output', 'themesiteclara_settings_section', 'themesiteclara_settings_section');
    add_settings_field('themesiteclara_settings_field_phone_number', 'Numéro de téléphone', 'themesiteclara_settings_field_phone_number_output', 'themesiteclara_settings_section', 'themesiteclara_settings_section');
    add_settings_field('themesiteclara_settings_field_email', 'Adresse mail', 'themesiteclara_settings_field_email_output', 'themesiteclara_settings_section', 'themesiteclara_settings_section');
}

function themesiteclara_settings_section_introduction() {
    echo __('Parametrez les différentes options du thème themesiteclara.', 'themesiteclara');
}

function themesiteclara_settings_field_introduction_output() {
    $value = get_option('themesiteclara_settings_field_introduction');
    echo '<input name="themesiteclara_settings_field_introduction" type="text" value="'.$value.'"/>';
}

function themesiteclara_settings_field_phone_number_output() {
    $value = get_option('themesiteclara_settings_field_phone_number');
    echo '<input name="themesiteclara_settings_field_phone_number" type="text" value="'.$value.'"/>';
}

function themesiteclara_settings_field_email_output() {
    $value = get_option('themesiteclara_settings_field_email');
    echo '<input name="themesiteclara_settings_field_email" type="text" value="'.$value.'"/>';
}
    
function themesiteclara_settings_fields_validate($inputs) {     
    if(!empty($_POST)) {     
        if(!empty($_POST['themesiteclara_settings_field_introduction'])) {       
            update_option('themesiteclara_settings_field_introduction', $_POST['themesiteclara_settings_field_introduction']);     
        }
        if(!empty($_POST['themesiteclara_settings_field_phone_number'])) {       
            update_option('themesiteclara_settings_field_phone_number', $_POST['themesiteclara_settings_field_phone_number']);
        }
        if(!empty($_POST['themesiteclara_settings_field_email'])) {
            update_option('themesiteclara_settings_field_email', $_POST['themesiteclara_settings_field_email']);
        }
    }
    return $inputs;
}


    
add_action('admin_init', 'themesiteclara_settings_register');
add_action('init', 'register_custom_menus');
add_action('after_setup_theme','themesiteclara_supports');
add_action('wp_enqueue_scripts','themesiteclara_register_assets');
add_action('admin_menu', 'themesiteclara_add_admin_pages');
add_action('admin_init', 'themesiteclara_settings_register');
add_action('admin_init', 'themesiteclara_settings_register');
?>