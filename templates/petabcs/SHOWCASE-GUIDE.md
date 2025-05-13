# Showcase Layout with Large Images and Pros/Cons

This template creates a visually appealing product showcase with large images and structured content including pros and cons sections.

## Template Structure

The showcase layout follows this format for each product:

1. **Section Heading**: "Our Top Pick: {Product Name}" (varies by position)
2. **Large Product Image**: Centered, prominent product image
3. **Product Details**: Title, price, rating, and description
4. **Custom Content**: Detailed analysis of the product
5. **Pros and Cons**: Side-by-side lists of what we like and don't like
6. **Additional Custom Content**: Optional custom content after each product

## Implementation Instructions

### 1. Copy Template Files

Copy these files to your child theme:

```
your-child-theme/
├── aawp/
│   ├── products/
│   │   └── large-image-box.php
│   └── showcase-layout.php
```

### 2. Add CSS

Add the CSS from `showcase-style.css` to your site using one of these methods:

1. **AAWP Settings**: Go to AAWP → Settings → Output → Custom CSS
2. **Theme Customizer**: Add to your theme's additional CSS
3. **Custom Snippets Plugin**: Create a CSS snippet

## Basic Usage

```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" 
  template="showcase-layout" 
  title="Best Cat Toys for 2025"
  product_pros="Durable construction,Interactive features,Great for solo play||Easy to clean,Affordable price,Multiple play modes||Budget-friendly,Small footprint,Colorful design||Premium materials,Lifetime warranty,Advanced features||Simple design,Effective at engaging cats,Multiple cats can play"
  product_cons="Higher price point,Requires batteries||Not as durable,Can be noisy||Limited durability,Basic design||Very expensive,Large size||Basic materials,Limited features"
]
```

## Available Parameters

### Section Headers

Control the headings that appear above each product:

```
top_pick_heading="Our Top Pick: "
runner_up_heading="Runner-Up: "
budget_pick_heading="Best Budget Option: "
premium_pick_heading="Premium Choice: "
also_great_heading="Also Great: "
```

### Pros and Cons

Add pros and cons for each product using these parameters:

```
product_pros="Pro 1,Pro 2,Pro 3||Pro 1,Pro 2,Pro 3||Pro 1,Pro 2,Pro 3"
product_cons="Con 1,Con 2||Con 1,Con 2||Con 1,Con 2"
pros_label="What We Like"
cons_label="What We Don't Like"
```

Each set of pros/cons is separated by `||` and corresponds to products in order.

### Custom Content

Add custom content for each product:

```
custom_blocks="product_content_B0XXXXXXXX:This is a detailed analysis of the first product...||position_content_2:This is content about the second product..."
```

### Comparison Table

Add a comparison table after all products:

```
custom_blocks="after_all:<h3>Product Comparison</h3>
<table>
  <tr>
    <th>Feature</th>
    <th>Product 1</th>
    <th>Product 2</th>
    <th>Product 3</th>
    <th>Product 4</th>
    <th>Product 5</th>
  </tr>
  <tr>
    <td>Price</td>
    <td>$49.99</td>
    <td>$39.99</td>
    <td>$19.99</td>
    <td>$89.99</td>
    <td>$29.99</td>
  </tr>
  <!-- Additional rows -->
</table>"
```

## Complete Example

```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" 
  template="showcase-layout" 
  title="Best Cat Toys of 2025" 
  before_items="Our team of pet experts and feline testers spent over 200 hours playing with and evaluating dozens of cat toys to find the absolute best options for your furry friends."
  top_pick_heading="Best Overall: "
  runner_up_heading="Runner-Up: "
  budget_pick_heading="Best Value: "
  premium_pick_heading="Premium Option: "
  also_great_heading="Also Recommended: "
  product_pros="Interactive design,Motion sensor technology,Durable construction,Great for solo play,Engages hunting instincts||Easy to clean,Multiple play modes,Affordable price,Long battery life,Quieter operation||Budget-friendly,Catnip included,Simple but effective,Small footprint,Great for kittens||Premium materials,Two-year warranty,Advanced motion patterns,Customizable settings,Multiple attachments||Simple design,Effective at engaging cats,Multiple cats can play,No batteries needed,Washable"
  product_cons="Higher price point,Requires batteries,Occasional sensor issues||Not as durable as top pick,Can be noisy at times,Limited warranty||Limited durability with aggressive cats,Basic design,No smart features||Very expensive,Large footprint,Batteries not included||Basic materials,Limited features,No warranty"
  custom_blocks="product_content_B0XXXXXXXX:Our top pick excels in every category we tested. The motion sensors accurately detect your cat's approach and create unpredictable movements that keep cats engaged for longer periods. During our testing, even cats that quickly lose interest in toys remained engaged with this one for 15+ minute sessions multiple times a day. The durable construction withstood aggressive play from larger cats, and the automatic shut-off feature helps preserve battery life.||position_content_2:Our runner-up option offers many of the same features as our top pick but at a more accessible price point. While the sensors aren't quite as responsive and the construction isn't as premium, it still provided excellent engagement for our test cats. The multiple play modes allow you to customize the experience based on your cat's activity level and play style.||after_all:<h3>Cat Toy Comparison Chart</h3>
<table>
  <tr>
    <th>Feature</th>
    <th>Top Pick</th>
    <th>Runner-Up</th>
    <th>Budget Option</th>
    <th>Premium Choice</th>
    <th>Also Great</th>
  </tr>
  <tr>
    <td>Price Range</td>
    <td>$40-50</td>
    <td>$30-40</td>
    <td>$15-20</td>
    <td>$70-90</td>
    <td>$20-30</td>
  </tr>
  <tr>
    <td>Battery Type</td>
    <td>3 AA</td>
    <td>2 AA</td>
    <td>None</td>
    <td>Rechargeable</td>
    <td>None</td>
  </tr>
  <tr>
    <td>Playtime</td>
    <td>8 hours</td>
    <td>6 hours</td>
    <td>N/A</td>
    <td>12 hours</td>
    <td>N/A</td>
  </tr>
  <tr>
    <td>Motion Sensor</td>
    <td>Yes</td>
    <td>Yes</td>
    <td>No</td>
    <td>Yes</td>
    <td>No</td>
  </tr>
  <tr>
    <td>Catnip Included</td>
    <td>Yes</td>
    <td>No</td>
    <td>Yes</td>
    <td>Yes</td>
    <td>No</td>
  </tr>
  <tr>
    <td>Warranty</td>
    <td>1 Year</td>
    <td>90 Days</td>
    <td>None</td>
    <td>2 Years</td>
    <td>30 Days</td>
  </tr>
</table>"
]
```

## Advanced Customization Tips

### 1. Creating a Custom Title Format

To create a custom title format that includes ratings or other elements:

```
custom_blocks="before_all:<div class='custom-title'>
  <h2>Best Cat Toys of 2025</h2>
  <div class='rating-summary'>Based on 200+ hours of testing</div>
  <div class='rating-stars'>★★★★★</div>
</div>"
```

### 2. Adding Video Reviews

Add video content for specific products:

```
custom_blocks="after_product_B0XXXXXXXX:<div class='video-container'>
  <h4>Watch Our Video Review</h4>
  <iframe width='560' height='315' src='https://www.youtube.com/embed/XXXXXXXXXX' frameborder='0' allowfullscreen></iframe>
</div>"
```

### 3. Adding Expandable Content Sections

Create expandable content sections for detailed specifications:

```
custom_blocks="after_product_B0XXXXXXXX:<details>
  <summary>Technical Specifications</summary>
  <ul>
    <li><strong>Dimensions:</strong> 5.2 x 3.1 x 9.8 inches</li>
    <li><strong>Weight:</strong> 12 ounces</li>
    <li><strong>Materials:</strong> ABS plastic, rubber grip</li>
    <li><strong>Battery Life:</strong> Approximately 8 hours</li>
    <li><strong>Warranty:</strong> 1 year manufacturer warranty</li>
  </ul>
</details>"
```

### 4. Adding User Feedback Sections

Include summarized user feedback from verified purchases:

```
custom_blocks="after_product_B0XXXXXXXX:<div class='user-feedback'>
  <h4>What Verified Owners Say</h4>
  <blockquote>"My cats absolutely love this toy! Even my older cat who rarely plays with anything showed interest." - Amazon Customer</blockquote>
  <blockquote>"Great quality, but battery life isn't as long as advertised." - Verified Purchase</blockquote>
</div>"
```

## Troubleshooting

### 1. Images Not Displaying Properly

If images are not displaying at the correct size:

- Check that your theme isn't overriding the image size CSS
- Try adding `!important` to the image size declarations in CSS
- Ensure your product images are high resolution (at least 800px wide)

### 2. Pros/Cons Not Appearing

If pros/cons sections aren't appearing:

- Ensure you've formatted the `product_pros` and `product_cons` parameters correctly
- Check that you have the correct number of item sets (separated by `||`)
- Verify that the CSS for pros/cons sections is properly loaded

### 3. Layout Breaking on Mobile

If the layout looks poor on mobile devices:

- Check the responsive CSS is properly loaded
- Add additional responsive breakpoints if needed
- Test with common mobile resolutions
