<?php
function trivia_add_scripts() {
    wp_enqueue_style('trivia-modal-style', plugins_url() . '/trivia/css/style.css');
    wp_enqueue_script('trivia-form-js', plugins_url() . '/trivia/js/main.js');
}
// use the registered js and style above
add_action('wp_enqueue_scripts', 'trivia_add_scripts');
