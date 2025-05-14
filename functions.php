<?php
/**
 * PetABCs AAWP custom styles
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Enqueue custom AAWP styles
function petabcs_aawp_styles() {
    wp_enqueue_style('petabcs-aawp-styles', get_stylesheet_directory_uri() . '/aawp/petabcs-aawp-styles.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'petabcs_aawp_styles');
