<?php
/*
 * Plugin Name: Hola
 * Plugin URI: https://hola.com.ph
 * Description: This plugin is to say hola every time the user logs in.
 * Version: 1.0
 * Author: krystelly
 */

//Display hola if the user is logged in

add_action('wp_body_open', 'say_hola');

function say_hola() {
    if(is_user_logged_in()) {
        $user = wp_get_current_user();
        echo "<h3 class='hola-text'>Hola! Good Day ". $user->user_login." :) </h3>";
    } else {
        echo "<h3 class='hola-text'>Hola! Welcome ". get_bloginfo()." :) </h3>";
    }

}

add_action('wp_print_styles', 'hola_style');
function hola_style() {
    echo '<style>h3.hola-text{color:#000e14; background: palevioletred; padding: 20px; margin: 0; text-align: center}</style>';
}

function trivia_plugin_page() {
    $page_title = 'Trivia of the Day';
    $menu_title = 'Trivia';
    $capability = 'manage_options';
    $slug = 'trivia-plugin';
    $callback = 'trivia_page_html';
    $icon = 'dashicons-schedule';
    $position = 60;

    add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);

}

add_action('admin_menu', 'trivia_plugin_page');
