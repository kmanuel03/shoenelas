<?php
function trivia_add_scripts() {
    wp_enqueue_style('trivia-modal-style', plugins_url() . '/trivia/css/style.css');
}
// use the registered style above
add_action('wp_enqueue_scripts', 'trivia_add_scripts');
