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


//create a page on admin site
function trivia_plugin_page() {
    $page_title = 'Trivia of the Day';
    $menu_title = 'Trivia';
    $capability = 'manage_options';
    $slug = 'trivia-plugin';
    $callback = 'trivia_page_html';
    $icon = 'dashicons-lightbulb';
    $position = 60;

    add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
}

add_action('admin_menu', 'trivia_plugin_page');
function trivia_page_html() {
    require_once('includes/trivia-form.php');
}

//add styling scripts
require_once(plugin_dir_path(__FILE__).'/includes/trivia-scripts.php');

//add trivia modal to the body
add_action('wp_body_open', 'show_trivia_modal');
function show_trivia_modal()
{
    if (is_user_logged_in()) {
        require_once('includes/trivia-modal.php');
    }

}


