# Nexlink IT Website - AI Agent Instructions

## Project Overview

This is the **Nexlink IT LLC** website - a professional IT services company website built with modern web standards. The project consists of:

- **Main marketing website** (root directory): Static HTML/CSS/JS with Tailwind CSS
- **Customer Portal** (`customer-portal/`): Authenticated dashboard for client management  
- **Marketing Campaigns** (`campaigns/`): Campaign-specific landing pages
- **Legacy Archive** (`old/`): Archived PHP-based previous version (reference only)

## Architecture & Design System

### Core Design Principles
- **Brand-first design** with consistent blue theme (`#0ea5e9` primary brand color)
- **Dark/light theme support** with automatic system preference detection
- **Mobile-first responsive** design using Tailwind CSS utility classes
- **Performance-optimized** with CDN-delivered Tailwind and minimal JavaScript

### Key Technical Patterns

**Theme Management:**
```javascript
// Theme bootstrap in <head> - critical for preventing flash
const theme = stored || (prefersDark ? 'dark' : 'light');
if (theme === 'dark') document.documentElement.classList.add('dark');
```

**CSS Architecture:**
- Uses **Tailwind CSS via CDN** with custom config extensions
- **CSS custom properties** in `styles.css` for consistent theming:
  ```css
  :root {
    --duration: 500ms;
    --easing: cubic-bezier(0.22, 1, 0.36, 1);
    --brand: #0ea5e9;
  }
  ```
- **Utility-first approach** with semantic component classes (`.card`, `.btn-primary`, `.glass`)

**Animation System:**
- **Intersection Observer** for scroll-triggered animations via `[data-animate]` attributes
- **Consistent easing** (`cubic-bezier(0.22, 1, 0.36, 1)`) across all transitions
- **Performance-conscious** animations with `transform` and `opacity`

## File Structure & Conventions

### Directory Organization
```
/                    # Main marketing website
├── customer-portal/ # Customer dashboard demo in HTML/CSS/JS, not yet a web app nor functional.
├── campaigns/       # Marketing campaign/landing pages
├── legal/          # Legal pages (privacy, terms, etc.)
├── old/            # Archived legacy version (DO NOT MODIFY)
└── samples/        # API endpoint examples
```

### Naming Conventions
- **Hyphenated URLs**: `contact.html`, `privacy-policy.html`
- **Semantic file names**: `portal-styles.css`, `login-script.js` for portal-specific assets
- **Component prefixes**: `.card-*`, `.btn-*`, `.nav-*` for related CSS classes

### HTML Structure Patterns
- **Consistent meta tags** including theme-color and Open Graph
- **Theme bootstrap script** must be first in `<head>` (before Tailwind)
- **Tailwind config** included inline for color extensions and dark mode
- **Semantic markup** with proper ARIA attributes and keyboard navigation

## Customer Portal Architecture

The `customer-portal/` is a **separate application** with its own styling and JavaScript:

**Key Features:**
- **Session-based authentication** with demo credentials (`demo@nexlink.cloud` / `demo123`)
- **Shared design system** but portal-specific components (`portal-styles.css`)
- **Mock data simulation** for dashboard widgets and billing information
- **Progressive enhancement** with JavaScript for interactions

**Portal-Specific Patterns:**
- **Login state management** in `login-script.js`
- **Real-time UI updates** using simulated API responses
- **Responsive dashboard layouts** using CSS Grid and Flexbox

## API & Integration Points

### Contact Form API
- **CORS-enabled** with proper headers for cross-origin requests
- **JSON-based** request/response with validation
- **Fallback handling** in `script.js` for development vs production endpoints

### External Dependencies
- **Tailwind CSS** via CDN (v3.x) with custom configuration
- **No build process** - direct browser compatibility approach
- **Font**: Inter font family from system fonts with fallbacks

## Development Guidelines

### When Editing Files
1. **Preserve theme bootstrap** script position in HTML head
2. **Use existing CSS classes** from `styles.css` before creating new ones
3. **Follow mobile-first** responsive patterns with Tailwind breakpoints
4. **Maintain ARIA attributes** and semantic markup standards
5. **Test dark/light themes** - both should be visually consistent

### Adding New Pages
- Copy HTML structure from `index.html` for consistency
- Include theme bootstrap and Tailwind config
- Use existing `.card`, `.btn-primary` classes for UI consistency
- Add to navigation in both desktop and mobile menu variants

### API Development
- Follow `samples/contact.php` pattern for new endpoints
- Use `/v1/api/` prefix for all API routes
- Include proper CORS headers and JSON responses
- Handle both development and production environment differences

## Important Notes

- **Legacy `old/` directory**: Contains archived PHP version - do not modify, reference only
- **No build system**: Project uses direct CDN dependencies for simplicity
- **Customer portal**: Separate authentication flow - maintains design consistency but independent functionality
- **Campaign pages**: Purpose-built for advertising with conversion-focused layouts