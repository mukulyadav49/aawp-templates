# Advanced Template Usage Examples

This document provides practical examples of how to use the enhanced SEO-friendly AAWP template.

## Basic Example

```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" template="seo-content-layout" title="Best Products of 2025"]
```

## Custom Text Example

This example customizes all text elements:

```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" 
  template="seo-content-layout" 
  title="Best Dog Toys for Aggressive Chewers" 
  intro_text="Finding durable toys for dogs who love to chew can be challenging. We've tested dozens of options to find the most durable and safe toys for your furry friend."
  top_pick_title="Most Durable Option" 
  top_pick_intro="This indestructible toy withstood our toughest testing with even the most aggressive chewers."
  top_pick_analysis_title="What Makes It Special"
  top_pick_analysis="Made from reinforced natural rubber, this toy combines extreme durability with pet-safe materials. The irregular bounce pattern keeps dogs engaged for hours, and the textured surface is gentle on teeth and gums while promoting dental health."
  editors_choice_title="Best Value Pick"
  editors_choice_intro="This toy offers nearly the same durability at a more affordable price point."
  option_title_format="Alternative #%d"
  option_intro="A solid alternative with unique benefits for certain dogs."
  conclusion_title="How We Tested"
]
```

## Custom Content Blocks Example

This example adds custom HTML content blocks at various points in the template:

```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" 
  template="seo-content-layout"
  title="Best Pet Carriers for Travel"
  custom_blocks="before_all:<div class='alert'>SUMMER SALE: Most of these carriers are currently discounted!</div>||
  after_position_1:<h4>Size Comparison</h4>
  <table>
    <tr>
      <th>Carrier</th>
      <th>Dimensions</th>
      <th>Weight Capacity</th>
    </tr>
    <tr>
      <td>Top Pick</td>
      <td>18\" x 11\" x 11\"</td>
      <td>Up to 20 lbs</td>
    </tr>
    <tr>
      <td>Runner Up</td>
      <td>19\" x 12\" x 12\"</td>
      <td>Up to 25 lbs</td>
    </tr>
  </table>||
  before_product_B0XXXXXXXX:<div class='featured-box'>
    <h4>Editor's Note</h4>
    <p>This carrier was featured in Pet Travel Magazine as the \"Most Comfortable Carrier of 2025\"</p>
  </div>"
]
```

## Complete Advanced Example

This comprehensive example showcases most available parameters:

```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" 
  template="seo-content-layout" 
  grid="2" 
  title="Best Interactive Cat Toys of 2025" 
  before_items="Keeping your cat mentally stimulated is just as important as physical exercise. Interactive toys can help prevent boredom and behavioral issues while strengthening the bond between you and your feline friend." 
  after_items="Consider your cat's play style and preferences when selecting an interactive toy. Some cats prefer chasing, while others enjoy batting or puzzle toys." 
  highlight_ids="B0XXXXXXXX"
  top_pick_title="Best Overall Interactive Toy"
  top_pick_intro="This electronic toy mimics natural prey movement and adapts to your cat's play style."
  top_pick_analysis="During our testing, cats of all ages showed continued interest in this toy even after weeks of use, unlike many toys that cats lose interest in quickly."
  custom_blocks="before_all:<div class='video-container'><iframe width='560' height='315' src='https://www.youtube.com/embed/XXXXXXXXXX' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>
  <p>Watch our video review of these interactive cat toys to see them in action!</p>||
  after_position_2:<h4>Key Features Comparison</h4>
  <table>
    <tr>
      <th>Feature</th>
      <th>Top Pick</th>
      <th>Budget Option</th>
    </tr>
    <tr>
      <td>Battery Life</td>
      <td>8 hours</td>
      <td>4 hours</td>
    </tr>
    <tr>
      <td>Automatic Mode</td>
      <td>Yes</td>
      <td>No</td>
    </tr>
    <tr>
      <td>App Control</td>
      <td>Yes</td>
      <td>No</td>
    </tr>
  </table>||
  position_4:<div class='aawp-product custom-product'>
    <h3>Bonus Recommendation: DIY Cat Toy</h3>
    <img src='/images/diy-cat-toy.jpg' alt='DIY Cat Toy' />
    <p>Not all great cat toys need to be purchased! Here's a simple DIY option that our test cats loved:</p>
    <ol>
      <li>Take an empty toilet paper roll</li>
      <li>Cut small holes in the sides</li>
      <li>Place a few treats inside</li>
      <li>Fold the ends closed</li>
    </ol>
    <p>This homemade puzzle toy costs nothing but provides great mental stimulation!</p>
  </div>"
  show_buying_guide="true"
]
```

## Practical Usage Tips

### Using WordPress Text Editor for Complex HTML

For complex HTML content in custom blocks, it's easier to use the WordPress text editor:

1. Create your content in the WordPress text editor
2. Switch to Text/HTML mode
3. Copy the HTML
4. Paste it into your shortcode parameter

### Using Variables for Repeated Content

If you have content that you use in multiple places, create reusable variables in your theme:

```php
// In your theme's functions.php
function my_aawp_custom_blocks() {
    return array(
        'comparison_table' => '<table>...</table>',
        'disclaimer' => '<p class="disclaimer">Products tested as of May 2025...</p>'
    );
}

// Then in your template:
echo do_shortcode('[amazon box="B0XXXXXXXX" template="seo-content-layout" custom_blocks="after_all:' . my_aawp_custom_blocks()['disclaimer'] . '"]');
```

### Using for Featured Sections

Create dedicated "Featured Product" sections with custom styling:

```
[amazon box="B0XXXXXXXX" 
  template="seo-content-layout" 
  top_pick_title="Featured Product of the Month"
  top_pick_intro="Every month, our experts select one standout product to feature."
  custom_blocks="before_all:<div class='featured-banner'>FEATURED PRODUCT</div>"
]
```

### Creating Comparison Tables

Use custom blocks to create detailed comparison tables between products:

```
custom_blocks="after_all:<h3>Detailed Comparison</h3>
<table class='comparison-table'>
  <tr>
    <th>Feature</th>
    <th>Product 1</th>
    <th>Product 2</th>
    <th>Product 3</th>
  </tr>
  <tr>
    <td>Weight</td>
    <td>2.4 lbs</td>
    <td>3.1 lbs</td>
    <td>1.8 lbs</td>
  </tr>
  <!-- More rows -->
</table>"
```
