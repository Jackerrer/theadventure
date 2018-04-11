<?php

/*
    ADMIN PAGE
 */

function theadventure_add_admin_page(){

    //Generate TheAd Admin Page
    add_menu_page( 'Theme Option', 'TheAdventure', 'manage_options', 'jackerrer_thead', 'thead_theme_create_page',
        /*get_template_directory().'/img/icon.png'*/ 'dashicons-admin-customizer', 110 );

    //Generate TheAd Admin Sub Page
    add_submenu_page( 'jackerrer_thead', 'Theme Option', 'General', 'manage_options', 'jackerrer_thead', 'thead_theme_create_page' );
    add_submenu_page( 'jackerrer_thead', 'Theme Css Option', 'Custom', 'manage_options', 'jackerrer_thead_css', 'jackerrer_thead_settings_page' );

    //Activate custom settings
    add_action( 'admin_init', 'thead_custom_settings');
}
add_action( 'admin_menu', 'theadventure_add_admin_page' );

function thead_custom_settings(){
    register_setting( 'thead-settings-group', 'first_name' );
    register_setting( 'thead-settings-group', 'twitter_handler', 'thead_sanitize_twitter_handler' );
    add_settings_section( 'thead-sidebar-options', 'Sidebar Option', 'thead_sidebar_option', 'jackerrer_thead');
    add_settings_field( 'sidebar-name', 'First Name', 'thead_sidebar_name', 'jackerrer_thead', 'thead-sidebar-options');
    add_settings_field( 'sidebar-twitter', 'Twitter', 'thead_sidebar_twitter', 'jackerrer_thead', 'thead-sidebar-options');
}

function thead_sidebar_option(){
    echo 'test';
}

function thead_sidebar_name(){
    $firstName = esc_attr(get_option( 'fist_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />';
}

function thead_sidebar_twitter(){
    $twitter = esc_attr(get_option( 'twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter Handler" />';
}

function thead_theme_create_page(){
    require_once(get_template_directory().'/inc/templates/thead-admin.php');
}

function jackerrer_thead_settings_page(){
    //generation admin page
}

//Sanitization Settings
function thead_sanitize_twitter_handler( $input ){
    $output = sanitize_text_field( $input );
    $output = str_replace('@','',$output);
    return $output;
}