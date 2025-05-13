# PetABCs Enhanced SEO-Friendly AAWP Templates

This directory contains custom AAWP templates designed for PetABCs with enhanced SEO structure, content-rich layouts, and advanced customization options.

## Files Overview

1. **`/products/seo-content-box.php`**: Individual product box template with schema.org markup
2. **`seo-content-layout.php`**: Layout template for displaying multiple products with rich content sections
3. **`petabcs-custom.css`**: Base custom styling for the templates
4. **`custom-blocks.css`**: Additional CSS for custom content blocks
5. **`PARAMETERS.md`**: Complete documentation of all available parameters
6. **`EXAMPLES.md`**: Example usage scenarios and code snippets

## Key Features

- **Schema.org SEO Structure**: Properly marked up for search engines
- **Content-Rich Layout**: Space for detailed product analysis and comparisons
- **Text Customization**: Parameterized text blocks for easy customization
- **Custom Content Blocks**: Insert HTML content at specific positions
- **Responsive Design**: Works well on all screen sizes
- **Highlighted Products**: Special styling for top picks and editor's choices

## Implementation Instructions

### 1. Copy Template Files to Child Theme

Copy these files to your child theme directory maintaining the same structure:

```
your-child-theme/
├── aawp/
│   ├── products/
│   │   └── seo-content-box.php
│   └── seo-content-layout.php
```

### 2. Add CSS

Combine and add the CSS from both CSS files to your site using one of these methods:

1. **AAWP Settings**: Go to AAWP → Settings → Output → Custom CSS
2. **Theme Customizer**: Add to your theme's additional CSS
3. **Custom Snippets Plugin**: Create a CSS snippet

### 3. Basic Usage

The template can be used with minimal parameters:

```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" template="seo-content-layout" title="Best Pet Products in 2025"]
```

### 4. Advanced Customization

For complete customization, you can use additional parameters:

```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" 
  template="seo-content-layout" 
  grid="3" 
  title="Best Dog Toys for Large Breeds" 
  before_items="Our team spent 40+ hours testing these toys with various dog breeds." 
  after_items="Remember to consider your dog's play style when choosing toys." 
  highlight_ids="B0XXXXXXXX"
  top_pick_title="Our Top Choice"
  custom_blocks="before_all:<div class='alert'>Limited time sale on these items!</div>"
]
```

See `PARAMETERS.md` for a complete list of available parameters and `EXAMPLES.md` for more usage examples.

## Custom Content Blocks

The most powerful feature of this template is the ability to insert custom HTML content at various points in the layout using the `custom_blocks` parameter.

Available positions for custom blocks:

- Before/after all products
- Before/after specific products (by ASIN or position)
- Replace specific products with completely custom content

Example:

```
custom_blocks="before_all:<p>Content before all products</p>||after_position_2:<table>...</table>"
```

## Tips for Best Results

1. **Text Customization**: Use the text parameters to maintain consistent voice and style
2. **Custom Content**: Add comparison tables, videos, and additional details using custom blocks
3. **Highlighted Products**: Use the `highlight_ids` parameter to emphasize recommended products
4. **Organized Shortcodes**: Keep your shortcodes organized with line breaks for better readability
5. **Use Shortcodes for Complex Content**: For very complex custom content, create a separate shortcode and use it within the `custom_blocks` parameter

## Troubleshooting

If you encounter issues:

1. **Template Not Found**: Verify the folder structure is exactly as shown
2. **PHP Errors**: Check for syntax errors in your template files
3. **Custom Blocks Not Rendering**: Ensure HTML in custom blocks is properly formatted
4. **Styling Issues**: Check that CSS has been added correctly

## Further Customization

These templates can be further customized by directly editing the PHP files. When making changes:

1. Make a backup of the original files
2. Test changes on a staging site first
3. Keep track of your modifications for future updates

For assistance with customization, refer to the AAWP documentation or contact a developer familiar with WordPress and AAWP.

## Credits

These enhanced templates were created for PetABCs to improve product presentation, SEO, and content richness.
