# AAWP Custom Templates for PetABCs

This directory contains custom AAWP templates for displaying products in two different layouts:

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

### Standard Pick Layout:
1. Product Title (Aligned Left)
2. Product Image (Aligned center)
3. Bullet points
4. Price (Aligned Left)
5. CTA (Aligned Left)

## Usage

### Shortcode Usage

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

### Installation

1. Copy the entire `petabcs` directory to your child theme's `aawp` directory:
   ```
   wp-content/themes/my-child-theme/aawp/
   ```

2. Add the CSS to your theme:
   - Option 1: Copy the contents of `custom-picks.css` to your theme's Custom CSS section in the WordPress customizer
   - Option 2: Enqueue the CSS file in your child theme's `functions.php`:
     ```php
     function enqueue_aawp_custom_css() {
         wp_enqueue_style('aawp-custom-picks', get_stylesheet_directory_uri() . '/aawp/petabcs/custom-picks.css');
     }
     add_action('wp_enqueue_scripts', 'enqueue_aawp_custom_css');
     ```
