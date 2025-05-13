<?php
/**
 * SEO-friendly layout template for PetABCs with enhanced content customization
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

// Enhanced text customization attributes
$intro_text = isset($args['intro_text']) ? $args['intro_text'] : __('We researched and compared the best products in this category to help you make an informed decision. Here are our top picks with detailed analysis of each option.', 'aawp');
$top_pick_title = isset($args['top_pick_title']) ? $args['top_pick_title'] : __('Our Top Pick', 'aawp');
$top_pick_intro = isset($args['top_pick_intro']) ? $args['top_pick_intro'] : __('After careful testing and research, this product stood out as our top recommendation.', 'aawp');
$top_pick_analysis_title = isset($args['top_pick_analysis_title']) ? $args['top_pick_analysis_title'] : __('Why We Love It', 'aawp');
$top_pick_analysis = isset($args['top_pick_analysis']) ? $args['top_pick_analysis'] : __('This product excels in performance, durability, and value. Our testing revealed superior quality and exceptional user experience compared to competitors.', 'aawp');

$editors_choice_title = isset($args['editors_choice_title']) ? $args['editors_choice_title'] : __('Editor\'s Choice', 'aawp');
$editors_choice_intro = isset($args['editors_choice_intro']) ? $args['editors_choice_intro'] : __('This product offers exceptional value and quality, earning our editor\'s recommendation.', 'aawp');
$editors_choice_analysis_title = isset($args['editors_choice_analysis_title']) ? $args['editors_choice_analysis_title'] : __('What Sets It Apart', 'aawp');
$editors_choice_analysis = isset($args['editors_choice_analysis']) ? $args['editors_choice_analysis'] : __('This product offers unique features including excellent design and reliability. It stands out for its innovative approach and consistent performance.', 'aawp');

$option_title_format = isset($args['option_title_format']) ? $args['option_title_format'] : __('Option #%d', 'aawp');
$option_intro = isset($args['option_intro']) ? $args['option_intro'] : __('Another excellent choice that offers unique benefits.', 'aawp');
$option_analysis_title = isset($args['option_analysis_title']) ? $args['option_analysis_title'] : __('Worth Considering', 'aawp');
$option_analysis = isset($args['option_analysis']) ? $args['option_analysis'] : __('While not our top pick, this product offers good value and specific features that might be perfect for certain users.', 'aawp');

$conclusion_title = isset($args['conclusion_title']) ? $args['conclusion_title'] : __('Buying Guide', 'aawp');
$show_buying_guide = isset($args['show_buying_guide']) ? filter_var($args['show_buying_guide'], FILTER_VALIDATE_BOOLEAN) : true;

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

// Classes
$container_classes = array('aawp', 'aawp-seo-content-layout');

// Grid support
if (isset($args['grid']) && $args['grid'] > 1) {
    $container_classes[] = 'aawp-grid';
    $container_classes[] = 'aawp-grid--col-' . $args['grid'];
}
?>

<div class="<?php echo implode(' ', $container_classes); ?>">

    <?php if ( $title ) { ?>
        <h2 class="aawp-seo-content-layout__title"><?php echo $title; ?></h2>
    <?php } ?>

    <?php if ( $before_items ) { ?>
        <div class="aawp-seo-content-layout__intro">
            <?php echo wpautop($before_items); ?>
        </div>
    <?php } else { ?>
        <div class="aawp-seo-content-layout__intro">
            <p><?php echo $intro_text; ?></p>
        </div>
    <?php } ?>

    <?php 
    // Custom content block before all products
    if (isset($custom_blocks['before_all'])) {
        echo '<div class="aawp-seo-content-layout__custom-block aawp-seo-content-layout__custom-block--before-all">';
        echo wpautop($custom_blocks['before_all']);
        echo '</div>';
    }
    ?>

    <div class="aawp-seo-content-layout__content">
        <div class="aawp-seo-content-layout__products">

            <?php foreach ( $this->items as $i => $item ) : ?>
                <?php $this->setup_item($i, $item); ?>
                <?php $item_index = intval($i); // Ensure $i is converted to integer ?>
                <?php $product_id = $this->get_product_id(); ?>
                
                <?php 
                // Check for product-specific custom content
                $has_custom_content = isset($custom_blocks['product_' . $product_id]) || 
                                     isset($custom_blocks['position_' . ($item_index + 1)]);
                
                // Determine if this is a highlighted product
                $is_highlighted = in_array($product_id, $highlight_ids);
                
                // Custom content before this specific product
                if (isset($custom_blocks['before_product_' . $product_id]) || 
                    isset($custom_blocks['before_position_' . ($item_index + 1)])) {
                    $block_content = isset($custom_blocks['before_product_' . $product_id]) ? 
                                   $custom_blocks['before_product_' . $product_id] : 
                                   $custom_blocks['before_position_' . ($item_index + 1)];
                    echo '<div class="aawp-seo-content-layout__custom-block aawp-seo-content-layout__custom-block--before-product">';
                    echo wpautop($block_content);
                    echo '</div>';
                }
                
                // Product section with appropriate styling
                if ($item_index === 0) {
                    // Top pick
                    echo '<div class="aawp-seo-content-layout__section aawp-seo-content-layout__section--top-pick">';
                    echo '<h3 class="aawp-seo-content-layout__section-title">' . $top_pick_title . '</h3>';
                    echo '<p class="aawp-seo-content-layout__section-intro">' . $top_pick_intro . '</p>';
                } elseif ($is_highlighted) {
                    // Editor's choice
                    echo '<div class="aawp-seo-content-layout__section aawp-seo-content-layout__section--highlighted">';
                    echo '<h3 class="aawp-seo-content-layout__section-title">' . $editors_choice_title . '</h3>';
                    echo '<p class="aawp-seo-content-layout__section-intro">' . $editors_choice_intro . '</p>';
                } else {
                    // Regular option
                    echo '<div class="aawp-seo-content-layout__section">';
                    echo '<h3 class="aawp-seo-content-layout__section-title">' . sprintf($option_title_format, ($item_index + 1)) . '</h3>';
                    echo '<p class="aawp-seo-content-layout__section-intro">' . $option_intro . '</p>';
                }
                ?>

                <?php
                // Custom content for this specific product (replaces default product box)
                if ($has_custom_content) {
                    $block_content = isset($custom_blocks['product_' . $product_id]) ? 
                                   $custom_blocks['product_' . $product_id] : 
                                   $custom_blocks['position_' . ($item_index + 1)];
                    echo '<div class="aawp-seo-content-layout__custom-product">';
                    echo wpautop($block_content);
                    echo '</div>';
                } else {
                    // Standard product template
                    $this->the_product_template();
                }
                
                // Add schema-friendly position marker for SEO
                echo '<meta itemprop="position" content="' . esc_attr($item_index + 1) . '">';
                
                // Product analysis text with appropriate content based on position
                if ($item_index === 0) {
                    echo '<div class="aawp-seo-content-layout__analysis">';
                    echo '<h4>' . $top_pick_analysis_title . '</h4>';
                    echo '<p>' . $top_pick_analysis . '</p>';
                    echo '</div>';
                } elseif ($is_highlighted) {
                    echo '<div class="aawp-seo-content-layout__analysis">';
                    echo '<h4>' . $editors_choice_analysis_title . '</h4>';
                    echo '<p>' . $editors_choice_analysis . '</p>';
                    echo '</div>';
                } else {
                    echo '<div class="aawp-seo-content-layout__analysis">';
                    echo '<h4>' . $option_analysis_title . '</h4>';
                    echo '<p>' . $option_analysis . '</p>';
                    echo '</div>';
                }
                
                // Custom content after this specific product
                if (isset($custom_blocks['after_product_' . $product_id]) || 
                    isset($custom_blocks['after_position_' . ($item_index + 1)])) {
                    $block_content = isset($custom_blocks['after_product_' . $product_id]) ? 
                                   $custom_blocks['after_product_' . $product_id] : 
                                   $custom_blocks['after_position_' . ($item_index + 1)];
                    echo '<div class="aawp-seo-content-layout__custom-block aawp-seo-content-layout__custom-block--after-product">';
                    echo wpautop($block_content);
                    echo '</div>';
                }
                
                echo '</div>'; // Close section div
                ?>

            <?php endforeach; ?>

        </div>
    </div>

    <?php 
    // Custom content block after all products
    if (isset($custom_blocks['after_all'])) {
        echo '<div class="aawp-seo-content-layout__custom-block aawp-seo-content-layout__custom-block--after-all">';
        echo wpautop($custom_blocks['after_all']);
        echo '</div>';
    }
    ?>

    <?php if ( $after_items ) { ?>
        <div class="aawp-seo-content-layout__conclusion">
            <?php echo wpautop($after_items); ?>
        </div>
    <?php } elseif ( $show_buying_guide ) { ?>
        <div class="aawp-seo-content-layout__conclusion">
            <h3><?php echo $conclusion_title; ?></h3>
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
