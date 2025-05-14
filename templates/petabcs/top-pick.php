<?php
/**
 * Top Pick template
 *
 * @var AAWP_Template_Functions $this
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

// Get the current ASIN to create a unique ID for this product
$asin = $this->get_product_id();
?>

<div class="<?php echo $this->get_product_container_classes('aawp-product aawp-product--top-pick'); ?>" <?php $this->the_product_container(); ?> id="aawp-product-<?php echo esc_attr($asin); ?>">

    <?php $this->the_product_ribbons(); ?>
    
    <div class="aawp-top-pick-badge">Our Top Pick</div>

    <div class="aawp-product__content">
        <!-- 1. Product Title (Aligned Left) -->
        <a class="aawp-product__title" href="<?php echo $this->get_product_url(); ?>" title="<?php echo $this->get_product_link_title(); ?>" rel="nofollow noopener sponsored" target="_blank">
            <?php echo $this->get_product_title(); ?>
        </a>

        <!-- 2. Product Image (Aligned center) -->
        <div class="aawp-product__image-wrap">
            <a class="aawp-product__image--link"
            href="<?php echo $this->get_product_image_link(); ?>" title="<?php echo $this->get_product_image_link_title(); ?>" rel="nofollow noopener sponsored" target="_blank">
                <img class="aawp-product__image" src="<?php echo $this->get_product_image(); ?>" alt="<?php echo $this->get_product_image_alt(); ?>" <?php $this->the_product_image_title(); ?> />
            </a>
        </div>

        <!-- 3. Text aligned center -->
        <div class="aawp-product__ribbon-text">
            After careful testing and research, this product stood out as our top recommendation.
        </div>

        <!-- 4. Bullet points -->
        <div class="aawp-product__description">
            <?php echo $this->get_product_description(); ?>
        </div>

        <!-- 5. Price (Aligned Left) -->
        <div class="aawp-product__pricing">
            <?php if ( $this->get_product_is_sale() && $this->sale_show_old_price() ) { ?>
                <span class="aawp-product__price aawp-product__price--old"><?php echo $this->get_product_pricing('old'); ?></span>
            <?php } ?>

            <?php if ( $this->show_advertised_price() ) { ?>
                <span class="aawp-product__price aawp-product__price--current"><?php echo $this->get_product_pricing(); ?></span>
            <?php } ?>
        </div>

        <!-- 6. CTA (Aligned Left) -->
        <div class="aawp-product__cta">
            <?php echo $this->get_button(); ?>
        </div>

        <!-- 7. Custom Content Container (Empty at first, filled by JavaScript) -->
        <div id="product-content-<?php echo esc_attr($asin); ?>" class="aawp-product__custom-content"></div>

        <?php if ( $this->get_product_rating() ) { ?>
            <div class="aawp-product__meta">
                <?php echo $this->get_product_star_rating(); ?>
                <?php if ( $this->get_product_reviews() ) { ?>
                    <span class="aawp-product__reviews">(<?php echo $this->get_product_reviews( $label = false ); ?>)</span>
                <?php } ?>
                <?php $this->the_product_check_prime_logo(); ?>
            </div>
        <?php } ?>

        <?php if ( $this->get_inline_info() ) { ?>
            <span class="aawp-product__info"><?php echo $this->get_inline_info_text(); ?></span>
        <?php } ?>
    </div>
</div>
