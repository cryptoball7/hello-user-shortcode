<?php
/**
 * Plugin Name: Hello User Shortcode
 * Description: Adds a [hello_user] shortcode that greets the visitor.
 * Version: 1.0
 * Author: Cryptoball cryptoball7@gmail.com
 * License: GPLv3
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shortcode function to greet the user
 */
function husg_hello_user_shortcode() {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        $name = esc_html( $current_user->display_name );
        return "Hello, $name!";
    } else {
        return "Hello, Guest!";
    }
}

/**
 * Register the [hello_user] shortcode
 */
function husg_register_shortcodes() {
    add_shortcode( 'hello_user', 'husg_hello_user_shortcode' );
}

add_action( 'init', 'husg_register_shortcodes' );
