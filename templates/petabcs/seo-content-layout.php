<?php
/**
 * SEO-friendly layout template for PetABCs
 *
 * @var AAWP_Template_Functions $this
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

// Check for shortcode attributes
$title = isset($args['title']) ? $args['title'] : '';
$before_items = isset($args['before_items']) ? $args['before_items'] : '';
$after_items = isset($args['after_items']) ? $args['after_items'] : '';
$highlight_ids = isset($args['highlight_ids']) ? explode(',', $args['highlight_ids']) : array();

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
            <p><?php _e('We researched and compared the best products in this category to help you make an informed decision. Here are our top picks with detailed analysis of each option.', 'aawp'); ?></p>
        </div>
    <?php } ?>

    <div class="aawp-seo-content-layout__content">
        <div class="aawp-seo-content-layout__products">

            <?php foreach ( $this->items as $i => $item ) : ?>
                <?php $this->setup_item($i, $item); ?>
                <?php $item_index = intval($i); // Ensure $i is converted to integer ?>
                
                <?php 
                // Determine if this is a highlighted product
                $is_highlighted = in_array($this->get_product_id(), $highlight_ids);
                
                // Product intro text (before product box)
                if ($item_index === 0) {
                    echo '<div class="aawp-seo-content-layout__section aawp-seo-content-layout__section--top-pick">';
                    echo '<h3 class="aawp-seo-content-layout__section-title">' . __('Our Top Pick', 'aawp') . '</h3>';
                    echo '<p class="aawp-seo-content-layout__section-intro">' . __('After careful testing and research, this product stood out as our top recommendation.', 'aawp') . '</p>';
                } elseif ($is_highlighted) {
                    echo '<div class="aawp-seo-content-layout__section aawp-seo-content-layout__section--highlighted">';
                    echo '<h3 class="aawp-seo-content-layout__section-title">' . __('Editor\'s Choice', 'aawp') . '</h3>';
                    echo '<p class="aawp-seo-content-layout__section-intro">' . __('This product offers exceptional value and quality, earning our editor\'s recommendation.', 'aawp') . '</p>';
                } else {
                    echo '<div class="aawp-seo-content-layout__section">';
                    echo '<h3 class="aawp-seo-content-layout__section-title">' . sprintf(__('Option #%d', 'aawp'), ($item_index + 1)) . '</h3>';
                    echo '<p class="aawp-seo-content-layout__section-intro">' . __('Another excellent choice that offers unique benefits.', 'aawp') . '</p>';
                }
                ?>

                <?php
                // Load the product template
                $this->the_product_template();
                
                // Add schema-friendly position marker for SEO
                echo '<meta itemprop="position" content="' . esc_attr($item_index + 1) . '">';
                
                // Product analysis text (after product box)
                if ($item_index === 0) {
                    echo '<div class="aawp-seo-content-layout__analysis">';
                    echo '<h4>' . __('Why We Love It', 'aawp') . '</h4>';
                    echo '<p>' . __('This product excels in performance, durability, and value. Our testing revealed superior quality and exceptional user experience compared to competitors.', 'aawp') . '</p>';
                    echo '</div>';
                } elseif ($is_highlighted) {
                    echo '<div class="aawp-seo-content-layout__analysis">';
                    echo '<h4>' . __('What Sets It Apart', 'aawp') . '</h4>';
                    echo '<p>' . __('This product offers unique features including excellent design and reliability. It stands out for its innovative approach and consistent performance.', 'aawp') . '</p>';
                    echo '</div>';
                } else {
                    echo '<div class="aawp-seo-content-layout__analysis">';
                    echo '<h4>' . __('Worth Considering', 'aawp') . '</h4>';
                    echo '<p>' . __('While not our top pick, this product offers good value and specific features that might be perfect for certain users, particularly those looking for specific benefits.', 'aawp') . '</p>';
                    echo '</div>';
                }
                
                echo '</div>'; // Close section div
                ?>

            <?php endforeach; ?>

        </div>
    </div>

    <?php if ( $after_items ) { ?>
        <div class="aawp-seo-content-layout__conclusion">
            <?php echo wpautop($after_items); ?>
        </div>
    <?php } else { ?>
        <div class="aawp-seo-content-layout__conclusion">
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
