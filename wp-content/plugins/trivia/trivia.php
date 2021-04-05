<?php
/*
 * Plugin Name: Trivia
 * Plugin URI: https://trivia.com.ph
 * Description: This plugin is to display a pop up modal showing trivia every time the user logs in.
 * Version: 1.0
 * Author: krystelly
 */


//create the trivia table on plugin activation
function create_trivia_table() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table = "{$wpdb->prefix}trivia";

    $sql = "CREATE TABLE IF NOT EXISTS $table (
				id INT (11) NOT NULL AUTO_INCREMENT,
				title VARCHAR (100) NOT NULL,
				description VARCHAR (255) NOT NULL,
                created_at datetime NOT NULL,
				PRIMARY KEY  (id)
				) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
}
register_activation_hook(__FILE__, 'create_trivia_table');


//Display trivia modal if the user logs in else display hola!
require_once(plugin_dir_path(__FILE__).'/includes/trivia-scripts.php');
add_action('wp_body_open', 'show_trivia_modal');

function show_trivia_modal() {
    if(is_user_logged_in()) {
        require_once('includes/trivia-modal.php');
    } else {
        echo "<h3 class='hola-text'>Hola! Welcome to ". get_bloginfo()." :) </h3>";
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

function trivia_page_html() {
    require_once('includes/trivia-form.php');
}

