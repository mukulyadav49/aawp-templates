<?php
/**
 * SEO-friendly product template with large images and pros/cons for PetABCs
 *
 * @var AAWP_Template_Functions $this
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
?>

<div class="<?php echo $this->get_product_container_classes('aawp-product aawp-product--large-image'); ?>" <?php $this->the_product_container(); ?>>

    <article itemscope itemtype="http://schema.org/Product" class="aawp-product__article">
        
        <div class="aawp-product__image-container aawp-product__image-container--large">
            <?php $this->the_product_ribbons(); ?>
            <a class="aawp-product__image-link"
               href="<?php echo $this->get_product_image_link(); ?>" title="<?php echo $this->get_product_image_link_title(); ?>" rel="nofollow noopener sponsored" target="_blank">
                <img class="aawp-product__image aawp-product__image--large" src="<?php echo $this->get_product_image(); ?>" alt="<?php echo $this->get_product_image_alt(); ?>" <?php $this->the_product_image_title(); ?> />
            </a>
        </div>
        
        <div class="aawp-product__content-container">
            <h3 class="aawp-product__title" itemprop="name">
                <a href="<?php echo $this->get_product_url(); ?>" title="<?php echo $this->get_product_link_title(); ?>" rel="nofollow noopener sponsored" target="_blank">
                    <?php echo $this->get_product_title(); ?>
                </a>
            </h3>

            <?php if ( $this->get_product_rating() ) { ?>
                <div class="aawp-product__rating">
                    <?php echo $this->get_product_star_rating(); ?>
                    <?php if ( $this->get_product_reviews() ) { ?>
                        <div class="aawp-product__reviews">
                            <?php echo $this->get_product_reviews(); ?> <?php _e('customer reviews', 'aawp'); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            
            <div class="aawp-product__pricing" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <?php if ( $this->get_product_is_sale() && $this->sale_show_old_price() ) { ?>
                    <span class="aawp-product__price aawp-product__price--old"><?php echo $this->get_product_pricing('old'); ?></span>
                <?php } ?>

                <?php if ( $this->show_advertised_price() ) { ?>
                    <span class="aawp-product__price aawp-product__price--current" itemprop="price"><?php echo $this->get_product_pricing(); ?></span>
                    <meta itemprop="priceCurrency" content="<?php echo $this->get_product_currency(); ?>">
                <?php } ?>

                <?php if ( $this->get_product_is_sale() && $this->sale_show_price_reduction() ) { ?>
                    <span class="aawp-product__price aawp-product__price--saved"><?php echo $this->get_saved_text(); ?></span>
                <?php } ?>
                
                <?php $this->the_product_check_prime_logo(); ?>
            </div>

            <!-- Product Description List -->
            <?php if ( $this->get_product_description() ) { ?>
                <div class="aawp-product__description">
                    <?php echo $this->get_product_description(); ?>
                </div>
            <?php } ?>
            
            <!-- Call-to-Action Buttons -->
            <div class="aawp-product__actions">
                <?php echo $this->get_button('detail'); ?>
                <?php echo $this->get_button(); ?>

                <?php if ( $this->get_inline_info() ) { ?>
                    <span class="aawp-product__info"><?php echo $this->get_inline_info_text(); ?></span>
                <?php } ?>
            </div>
        </div>
    </article>
</div>
