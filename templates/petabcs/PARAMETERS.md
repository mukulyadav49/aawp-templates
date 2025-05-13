# Enhanced AAWP Template Parameters

This document outlines all available parameters for the enhanced SEO-friendly AAWP template.

## Basic Parameters

| Parameter | Description | Example |
|-----------|-------------|---------|
| `template` | Specify template to use | `template="seo-content-layout"` |
| `box` | Amazon ASINs to display | `box="B0XXXXXXXX,B0XXXXXXXX"` |
| `grid` | Number of columns for grid layout | `grid="3"` |
| `title` | Main heading for the collection | `title="Best Dog Toys of 2025"` |
| `before_items` | Content to display before products | `before_items="Our experts tested..."` |
| `after_items` | Content to display after products | `after_items="Remember to consider..."` |
| `highlight_ids` | ASINs to mark as Editor's Choice | `highlight_ids="B0XXXXXXXX"` |

## Text Customization Parameters

| Parameter | Description | Default Value |
|-----------|-------------|---------------|
| `intro_text` | Main introduction text | "We researched and compared..." |
| `top_pick_title` | Heading for first product | "Our Top Pick" |
| `top_pick_intro` | Intro text for first product | "After careful testing..." |
| `top_pick_analysis_title` | Analysis heading for first product | "Why We Love It" |
| `top_pick_analysis` | Analysis text for first product | "This product excels..." |
| `editors_choice_title` | Heading for highlighted products | "Editor's Choice" |
| `editors_choice_intro` | Intro text for highlighted products | "This product offers..." |
| `editors_choice_analysis_title` | Analysis heading for highlighted products | "What Sets It Apart" |
| `editors_choice_analysis` | Analysis text for highlighted products | "This product offers unique..." |
| `option_title_format` | Format for regular option titles | "Option #%d" |
| `option_intro` | Intro text for regular options | "Another excellent choice..." |
| `option_analysis_title` | Analysis heading for regular options | "Worth Considering" |
| `option_analysis` | Analysis text for regular options | "While not our top pick..." |
| `conclusion_title` | Heading for conclusion section | "Buying Guide" |
| `show_buying_guide` | Whether to show buying guide | `true` or `false` |

## Custom Content Blocks

The `custom_blocks` parameter allows you to insert custom HTML content at various points in the template. Use double pipes (`||`) to separate multiple blocks and colons (`:`) to separate the position identifier from the content.

### Available Block Positions:

| Position Identifier | Description |
|---------------------|-------------|
| `before_all` | Before all products |
| `after_all` | After all products |
| `before_product_ASIN` | Before a specific product by ASIN |
| `after_product_ASIN` | After a specific product by ASIN |
| `before_position_N` | Before the Nth product (1-based) |
| `after_position_N` | After the Nth product (1-based) |
| `product_ASIN` | Replace a specific product by ASIN |
| `position_N` | Replace the Nth product (1-based) |

### Example:

```
custom_blocks="before_all:This is content before all products.||after_position_2:<div class='special-note'>Note after the second product</div>||product_B0XXXXXXXX:<p>Custom content replacing the first product</p>"
```

## Complete Example

```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" 
  template="seo-content-layout" 
  grid="3" 
  title="Best Dog Toys for Large Breeds" 
  before_items="Our team spent 40+ hours testing these toys with various dog breeds." 
  after_items="Remember to consider your dog's play style when choosing toys." 
  highlight_ids="B0XXXXXXXX"
  top_pick_title="Editor's #1 Choice"
  top_pick_intro="This toy outperformed all others in our durability tests."
  custom_blocks="before_all:<div class='alert'>Limited time sale on these items!</div>||after_position_2:<h4>Comparison Chart</h4><img src='/chart.jpg' alt='Comparison Chart'>"
  show_buying_guide="true"]
```

## Usage Tips

1. Use WordPress text editor for complex HTML in custom blocks
2. Store large content blocks in shortcodes and reference them in parameters
3. For multi-paragraph content, create the content in the WordPress editor and use the shortcode within your post
4. Keep shortcode attributes well-formatted for readability
