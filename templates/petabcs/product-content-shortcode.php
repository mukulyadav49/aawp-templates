<?php
/**
 * AAWP Custom Extensions for PetABCs
 * 
 * This file provides custom shortcodes and functionality for AAWP templates.
 * Place this in your theme's functions.php or include it from there.
 */

// Don't allow direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create a shortcode for adding custom content inside AAWP product boxes
 * Usage: [product_content asin="B0123456789"]<h3>Your HTML here</h3>[/product_content]
 */
function petabcs_product_content_shortcode($atts, $content = null) {
    // Extract attributes
    $atts = shortcode_atts(array(
        'asin' => '', // ASIN is optional, will auto-detect if not provided
    ), $atts);
    
    // Process any shortcodes within the content
    $processed_content = do_shortcode($content);
    
    // Unique ID to avoid conflicts
    $unique_id = 'pc_' . uniqid();
    
    // Output the content in a hidden div first
    $output = '<div id="' . esc_attr($unique_id) . '" style="display:none;">' . $processed_content . '</div>';
    
    // Create JavaScript to move the content into the appropriate box
    $output .= "
    <script type='text/javascript'>
    (function() {
        // Function to run when the DOM is fully loaded
        function moveContent() {
            // Get our hidden content div
            var contentDiv = document.getElementById('" . esc_js($unique_id) . "');
            if (!contentDiv) return;
            
            // Get all AAWP product boxes
            var productBoxes = document.querySelectorAll('.aawp-product');
            if (productBoxes.length === 0) return;
            
            // Find the target box
            var targetFound = false;
            
            productBoxes.forEach(function(box) {
                // If specific ASIN was provided, match only that box
                if ('" . esc_js($atts['asin']) . "' !== '') {
                    if (box.id === 'aawp-product-" . esc_js($atts['asin']) . "') {
                        var container = box.querySelector('.aawp-product__custom-content');
                        if (container) {
                            container.innerHTML = contentDiv.innerHTML;
                            targetFound = true;
                        }
                    }
                } 
                // If no ASIN provided, use the most recent box
                else if (!targetFound) {
                    var container = box.querySelector('.aawp-product__custom-content');
                    if (container) {
                        container.innerHTML = contentDiv.innerHTML;
                        targetFound = true;
                    }
                }
            });
            
            // Remove our hidden div after processing
            contentDiv.parentNode.removeChild(contentDiv);
        }
        
        // Run when DOM is loaded
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', moveContent);
        } else {
            // Or run immediately if the DOM is already loaded
            setTimeout(moveContent, 100);
        }
    })();
    </script>
    ";
    
    return $output;
}
add_shortcode('product_content', 'petabcs_product_content_shortcode');

/**
 * Enqueue custom styles for the product content
 */
function petabcs_enqueue_custom_styles() {
    // Check if AAWP is active
    if (function_exists('AAWP')) {
        // Add inline styles for the custom content
        $custom_css = "
            .aawp-product__custom-content {
                margin-top: 20px;
                padding-top: 20px;
                border-top: 1px solid #e2e2e2;
            }
            .aawp-product__custom-content h3 {
                color: #5822B0;
                margin-top: 0;
            }
            .aawp-product__custom-content ul {
                padding-left: 20px;
            }
            .aawp-product__custom-content p {
                margin-bottom: 15px;
            }
        ";
        wp_add_inline_style('aawp-styles', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'petabcs_enqueue_custom_styles');
