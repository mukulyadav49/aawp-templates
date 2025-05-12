# PetABCs SEO-Friendly AAWP Templates

This directory contains custom AAWP templates designed for PetABCs with enhanced SEO structure and content-rich layouts.

## Files Overview

1. **`/products/seo-content-box.php`**: Individual product box template with schema.org markup
2. **`seo-content-layout.php`**: Layout template for displaying multiple products with rich content sections
3. **`petabcs-custom.css`**: Custom styling for the templates

## Implementation Instructions

### 1. Copy to Child Theme

Copy these files to your child theme directory maintaining the same structure:

```
your-child-theme/
├── aawp/
│   ├── products/
│   │   └── seo-content-box.php
│   └── seo-content-layout.php
```

### 2. Add CSS

Add the CSS from `petabcs-custom.css` to your site using one of these methods:

1. **AAWP Settings**: Go to AAWP → Settings → Output → Custom CSS
2. **Theme Customizer**: Add to your theme's additional CSS
3. **Custom Snippets Plugin**: Create a CSS snippet

### 3. Usage Examples

#### Basic Usage:
```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" template="seo-content-layout" title="Best Pet Products in 2025"]
```

#### With All Parameters:
```
[amazon box="B0XXXXXXXX,B0XXXXXXXX,B0XXXXXXXX" 
  template="seo-content-layout" 
  grid="3" 
  title="Best Dog Toys for Large Breeds" 
  before_items="Our team spent 40+ hours testing these toys with various dog breeds." 
  after_items="Remember to consider your dog's play style when choosing toys." 
  highlight_ids="B0XXXXXXXX"]
```

#### Single Product:
```
[amazon box="B0XXXXXXXX" template="seo-content-box"]
```

## Customization

These templates can be further customized:

1. Edit product intro and analysis text in `seo-content-layout.php`
2. Modify CSS variables to change colors and styling
3. Add additional schema.org attributes for enhanced SEO

## Tips for Best Results

1. Use meaningful titles for your product collections
2. Write unique content for the before_items and after_items parameters
3. Include relevant keywords in your custom text sections
4. Highlight your genuinely recommended products with highlight_ids
