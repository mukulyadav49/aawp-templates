<?php
/**
 * Standard Pick template - Regular product display
 *
 * @var AAWP_Template_Functions $this
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

?>

<div class="<?php echo $this->get_product_container_classes('aawp-product aawp-product--standard-pick'); ?>" <?php $this->the_product_container(); ?>>

    <a class="aawp-product__title" href="<?php echo $this->get_product_url(); ?>" title="<?php echo $this->get_product_link_title(); ?>" rel="nofollow noopener sponsored" target="_blank">
        <?php echo $this->get_product_title(); ?>
    </a>

    <a class="aawp-product__image--link aawp-product__image"
       href="<?php echo $this->get_product_image_link(); ?>" title="<?php echo $this->get_product_image_link_title(); ?>" rel="nofollow noopener sponsored" target="_blank">
        <img class="aawp-product__image" src="<?php echo $this->get_product_image(); ?>" alt="<?php echo $this->get_product_image_alt(); ?>" <?php $this->the_product_image_title(); ?> />
    </a>

    <div class="aawp-product__description">
        <?php echo $this->get_product_description(); ?>
    </div>

    <div class="aawp-product__pricing">
        <?php if ( $this->get_product_is_sale() && $this->sale_show_old_price() ) { ?>
            <span class="aawp-product__price aawp-product__price--old"><?php echo $this->get_product_pricing('old'); ?></span>
        <?php } ?>

        <?php if ( $this->show_advertised_price() ) { ?>
            <span class="aawp-product__price aawp-product__price--current"><?php echo $this->get_product_pricing(); ?></span>
        <?php } ?>
    </div>

    <div class="aawp-product__cta">
        <?php echo $this->get_button(); ?>
    </div>
</div>
