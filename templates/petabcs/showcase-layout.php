<?php
/**
 * SEO-friendly layout template with showcase format for PetABCs
 *
 * @var AAWP_Template_Functions $this
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

// Basic attributes
$title = isset($args['title']) ? $args['title'] : '';
$before_items = isset($args['before_items']) ? $args['before_items'] : '';
$after_items = isset($args['after_items']) ? $args['after_items'] : '';
$highlight_ids = isset($args['highlight_ids']) ? explode(',', $args['highlight_ids']) : array();

// Custom text for sections
$intro_text = isset($args['intro_text']) ? $args['intro_text'] : __('We researched and compared the best products in this category to help you make an informed decision. Here are our top picks with detailed analysis of each option.', 'aawp');
$show_buying_guide = isset($args['show_buying_guide']) ? filter_var($args['show_buying_guide'], FILTER_VALIDATE_BOOLEAN) : true;

// Product section headings
$top_pick_heading = isset($args['top_pick_heading']) ? $args['top_pick_heading'] : __('Our Top Pick: ', 'aawp');
$runner_up_heading = isset($args['runner_up_heading']) ? $args['runner_up_heading'] : __('Runner Up: ', 'aawp');
$budget_pick_heading = isset($args['budget_pick_heading']) ? $args['budget_pick_heading'] : __('Best Budget Option: ', 'aawp');
$premium_pick_heading = isset($args['premium_pick_heading']) ? $args['premium_pick_heading'] : __('Premium Choice: ', 'aawp');
$also_great_heading = isset($args['also_great_heading']) ? $args['also_great_heading'] : __('Also Great: ', 'aawp');

// Pros and cons labels
$pros_label = isset($args['pros_label']) ? $args['pros_label'] : __('What We Like', 'aawp');
$cons_label = isset($args['cons_label']) ? $args['cons_label'] : __('What We Don\'t Like', 'aawp');

// Pros and cons for products (comma-separated lists)
$product_pros = isset($args['product_pros']) ? explode('||', $args['product_pros']) : array();
$product_cons = isset($args['product_cons']) ? explode('||', $args['product_cons']) : array();

// Custom content blocks between products
$custom_blocks = array();
if (isset($args['custom_blocks']) && !empty($args['custom_blocks'])) {
    $blocks = explode('||', $args['custom_blocks']);
    foreach ($blocks as $block) {
        $parts = explode(':', $block, 2);
        if (count($parts) == 2) {
            $custom_blocks[trim($parts[0])] = trim($parts[1]);
        }
    }
}

// Get section headings based on position
function get_section_heading($index, $product_title, $top_pick_heading, $runner_up_heading, $budget_pick_heading, $premium_pick_heading, $also_great_heading) {
    switch ($index) {
        case 0:
            return $top_pick_heading . $product_title;
        case 1:
            return $runner_up_heading . $product_title;
        case 2:
            return $budget_pick_heading . $product_title;
        case 3:
            return $premium_pick_heading . $product_title;
        default:
            return $also_great_heading . $product_title;
    }
}

// Get pros for a product
function get_product_pros($index, $product_pros, $pros_label) {
    if (isset($product_pros[$index]) && !empty($product_pros[$index])) {
        $pros_items = explode(',', $product_pros[$index]);
        $output = '<div class="aawp-product__pros"><h4>' . $pros_label . '</h4><ul>';
        foreach ($pros_items as $item) {
            $output .= '<li>' . trim($item) . '</li>';
        }
        $output .= '</ul></div>';
        return $output;
    }
    return '';
}

// Get cons for a product
function get_product_cons($index, $product_cons, $cons_label) {
    if (isset($product_cons[$index]) && !empty($product_cons[$index])) {
        $cons_items = explode(',', $product_cons[$index]);
        $output = '<div class="aawp-product__cons"><h4>' . $cons_label . '</h4><ul>';
        foreach ($cons_items as $item) {
            $output .= '<li>' . trim($item) . '</li>';
        }
        $output .= '</ul></div>';
        return $output;
    }
    return '';
}

// Classes
$container_classes = array('aawp', 'aawp-showcase-layout');
?>

<div class="<?php echo implode(' ', $container_classes); ?>">

    <?php if ( $title ) { ?>
        <h2 class="aawp-showcase-layout__title"><?php echo $title; ?></h2>
    <?php } ?>

    <?php if ( $before_items ) { ?>
        <div class="aawp-showcase-layout__intro">
            <?php echo wpautop($before_items); ?>
        </div>
    <?php } else { ?>
        <div class="aawp-showcase-layout__intro">
            <p><?php echo $intro_text; ?></p>
        </div>
    <?php } ?>

    <?php 
    // Custom content block before all products
    if (isset($custom_blocks['before_all'])) {
        echo '<div class="aawp-showcase-layout__custom-block aawp-showcase-layout__custom-block--before-all">';
        echo wpautop($custom_blocks['before_all']);
        echo '</div>';
    }
    ?>

    <div class="aawp-showcase-layout__products">

        <?php foreach ( $this->items as $i => $item ) : ?>
            <?php $this->setup_item($i, $item); ?>
            <?php $item_index = intval($i); // Ensure $i is converted to integer ?>
            <?php $product_id = $this->get_product_id(); ?>
            <?php $product_title = $this->get_product_title(); ?>
            
            <?php 
            // Custom content before this specific product
            if (isset($custom_blocks['before_product_' . $product_id]) || 
                isset($custom_blocks['before_position_' . ($item_index + 1)])) {
                $block_content = isset($custom_blocks['before_product_' . $product_id]) ? 
                               $custom_blocks['before_product_' . $product_id] : 
                               $custom_blocks['before_position_' . ($item_index + 1)];
                echo '<div class="aawp-showcase-layout__custom-block aawp-showcase-layout__custom-block--before-product">';
                echo wpautop($block_content);
                echo '</div>';
            }
            ?>
            
            <div class="aawp-showcase-layout__product">
                <!-- Section heading with product title -->
                <h3 class="aawp-showcase-layout__product-heading">
                    <?php echo get_section_heading($item_index, $product_title, $top_pick_heading, $runner_up_heading, $budget_pick_heading, $premium_pick_heading, $also_great_heading); ?>
                </h3>
                
                <?php
                // Use large image template
                $this->set_product_template('large-image-box');
                $this->the_product_template();
                
                // Add schema-friendly position marker for SEO
                echo '<meta itemprop="position" content="' . esc_attr($item_index + 1) . '">';
                ?>
                
                <div class="aawp-showcase-layout__product-analysis">
                    <?php
                    // Product custom content
                    if (isset($custom_blocks['product_content_' . $product_id]) || 
                        isset($custom_blocks['position_content_' . ($item_index + 1)])) {
                        $content = isset($custom_blocks['product_content_' . $product_id]) ? 
                                 $custom_blocks['product_content_' . $product_id] : 
                                 $custom_blocks['position_content_' . ($item_index + 1)];
                        echo '<div class="aawp-showcase-layout__product-content">';
                        echo wpautop($content);
                        echo '</div>';
                    }
                    ?>
                    
                    <!-- Pros and Cons -->
                    <div class="aawp-showcase-layout__pros-cons">
                        <?php 
                        // Display pros
                        echo get_product_pros($item_index, $product_pros, $pros_label);
                        
                        // Display cons
                        echo get_product_cons($item_index, $product_cons, $cons_label);
                        ?>
                    </div>
                </div>
                
                <?php 
                // Custom content after this specific product
                if (isset($custom_blocks['after_product_' . $product_id]) || 
                    isset($custom_blocks['after_position_' . ($item_index + 1)])) {
                    $block_content = isset($custom_blocks['after_product_' . $product_id]) ? 
                                   $custom_blocks['after_product_' . $product_id] : 
                                   $custom_blocks['after_position_' . ($item_index + 1)];
                    echo '<div class="aawp-showcase-layout__custom-block aawp-showcase-layout__custom-block--after-product">';
                    echo wpautop($block_content);
                    echo '</div>';
                }
                ?>
            </div>

        <?php endforeach; ?>

    </div>

    <?php 
    // Custom content block after all products (for comparison table)
    if (isset($custom_blocks['after_all'])) {
        echo '<div class="aawp-showcase-layout__custom-block aawp-showcase-layout__custom-block--after-all">';
        echo wpautop($custom_blocks['after_all']);
        echo '</div>';
    }
    ?>

    <?php if ( $after_items ) { ?>
        <div class="aawp-showcase-layout__conclusion">
            <?php echo wpautop($after_items); ?>
        </div>
    <?php } elseif ( $show_buying_guide ) { ?>
        <div class="aawp-showcase-layout__conclusion">
            <h3><?php _e('Buying Guide', 'aawp'); ?></h3>
            <p><?php _e('When choosing a product in this category, consider these important factors:', 'aawp'); ?></p>
            <ul>
                <li><?php _e('<strong>Quality:</strong> Look for durable materials and solid construction.', 'aawp'); ?></li>
                <li><?php _e('<strong>Features:</strong> Determine which specific features matter most for your needs.', 'aawp'); ?></li>
                <li><?php _e('<strong>Price:</strong> Balance your budget with the features you need.', 'aawp'); ?></li>
                <li><?php _e('<strong>Reviews:</strong> Consider the experiences of verified purchasers.', 'aawp'); ?></li>
            </ul>
            <p><?php _e('Our recommendations above are based on thorough product testing and analysis to help you make the best choice.', 'aawp'); ?></p>
        </div>
    <?php } ?>

</div>
