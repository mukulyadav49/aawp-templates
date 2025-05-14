<?php
/**
 * AAWP Custom Parameters
 * 
 * This file adds support for custom shortcode parameters in AAWP templates.
 * Place this in your theme's functions.php or include it from there.
 */

// Don't allow direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register custom parameters for AAWP
 */
function petabcs_aawp_custom_parameters($params) {
    // Add custom_html parameter
    $params['custom_html'] = '';
    
    return $params;
}
add_filter('aawp_template_params', 'petabcs_aawp_custom_parameters');

/**
 * Pass custom shortcode parameters to template
 */
function petabcs_aawp_pass_custom_params($product_data, $atts) {
    // Pass custom_html parameter with sanitization
    if (isset($atts['custom_html'])) {
        // Store sanitized content
        $product_data['custom_html'] = wp_kses_post($atts['custom_html']);
    }
    
    return $product_data;
}
add_filter('aawp_template_data', 'petabcs_aawp_pass_custom_params', 10, 2);

/**
 * Alternative method: Add the custom content through an action hook
 * This is a fallback in case the direct method doesn't work
 */
function petabcs_output_custom_html($template_args) {
    // Only run for our custom templates
    if (isset($template_args['template']) && 
        ($template_args['template'] === 'top-pick' || $template_args['template'] === 'standard-pick')) {
        
        // Check if custom HTML is provided
        if (isset($template_args['custom_html']) && !empty($template_args['custom_html'])) {
            echo '<div class="aawp-product__custom-content">';
            echo wp_kses_post($template_args['custom_html']);
            echo '</div>';
        }
    }
}
// Uncomment the line below if you need this alternative method
// add_action('aawp_template_output_after', 'petabcs_output_custom_html', 10, 1);
