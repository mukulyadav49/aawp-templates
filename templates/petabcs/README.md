# AAWP Custom Templates for PetABCs

This directory contains custom AAWP templates for displaying products in two different layouts with the ability to add custom content inside the product boxes.

## Templates

1. **Top Pick** (`top-pick.php`): A highlighted box with "Our Top Pick" badge and product details
2. **Standard Pick** (`standard-pick.php`): A standard product display

## Layout Structure

### Top Pick Layout:
1. Product Title (Aligned Left)
2. Product Image (Aligned center)
3. Text aligned center - "After careful testing and research, this product stood out as our top recommendation."
4. Bullet points
5. Price (Aligned Left)
6. CTA (Aligned Left)
7. Custom HTML Content (optional, immediately after CTA)

### Standard Pick Layout:
1. Product Title (Aligned Left)
2. Product Image (Aligned center)
3. Bullet points
4. Price (Aligned Left)
5. CTA (Aligned Left)
6. Custom HTML Content (optional, immediately after CTA)

## Usage

### Basic Shortcode Usage

To use these templates in your WordPress content, use the following shortcodes:

For Top Pick:
```
[amazon box="ASIN" template="top-pick"]
```

For Standard Pick:
```
[amazon box="ASIN" template="standard-pick"]
```

Replace `ASIN` with the Amazon product's ASIN code.

### Adding Custom Content Inside Product Boxes

To add custom HTML content inside either template (immediately after the CTA button), use the `[product_content]` shortcode after the AAWP box:

```
[amazon box="B0123456789" template="top-pick"]
[product_content asin="B0123456789"]
<h3>Additional Information</h3>
<p>This is custom HTML content that appears inside the product box after the CTA button.</p>
[/product_content]
```

The `asin` parameter in the `[product_content]` shortcode should match the ASIN in the `[amazon]` shortcode to ensure the content appears in the correct box. If you omit the `asin` parameter, the content will be inserted into the most recently displayed product box.

### Simple Example:

```
[amazon box="B0123456789" template="top-pick"]
[product_content]
<h3>Why We Recommend This</h3>
<p>This product has excellent durability and performance.</p>
[/product_content]
```

### Multiple Products with Custom Content:

```
[amazon box="B0123456789" template="top-pick"]
[product_content asin="B0123456789"]
<h3>Our Top Rated Option</h3>
<p>Perfect for most pet owners.</p>
[/product_content]

[amazon box="B0987654321" template="standard-pick"]
[product_content asin="B0987654321"]
<h3>Budget-Friendly Alternative</h3>
<p>Great value for the price.</p>
[/product_content]
```

## Installation

1. Copy the files to your child theme's directories:
   ```
   wp-content/themes/my-child-theme/aawp/products/top-pick.php
   wp-content/themes/my-child-theme/aawp/products/standard-pick.php
   ```

2. Add the following lines to your theme's functions.php file:
   ```php
   // Include the product content shortcode
   include_once get_stylesheet_directory() . '/aawp/petabcs/product-content-shortcode.php';
   
   // Enqueue custom CSS for AAWP templates
   function enqueue_aawp_custom_css() {
       wp_enqueue_style('aawp-custom-picks', get_stylesheet_directory_uri() . '/aawp/petabcs/custom-picks.css');
   }
   add_action('wp_enqueue_scripts', 'enqueue_aawp_custom_css');
   ```

## Examples of Custom Content

You can include various HTML elements in your custom content:

```
[amazon box="B0123456789" template="top-pick"]
[product_content]
<h3>Why We Recommend This Product</h3>
<p>After extensive testing, we found this product excels in the following areas:</p>
<ul>
  <li><strong>Durability:</strong> Built to last with high-quality materials</li>
  <li><strong>Ease of Use:</strong> Simple setup and intuitive controls</li>
  <li><strong>Value:</strong> Excellent performance for the price point</li>
</ul>
<p>Read our <a href='/product-review'>full review here</a> for more details.</p>
[/product_content]
```

## Customizing Image Size

To change the image size in both templates, add this CSS to your theme's Custom CSS section:

```css
/* Adjust image size in both templates */
.aawp-product--top-pick .aawp-product__image,
.aawp-product--standard-pick .aawp-product__image {
    max-width: 300px; /* Set your desired width */
    width: 100%;
    height: auto;
    margin: 0 auto;
}
```

Adjust the `max-width` value to your desired size.
