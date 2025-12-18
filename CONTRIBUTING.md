# Contributing Guide

Thank you for your interest in contributing to the jasonbrain.com website! This guide provides instructions for developers (both human and AI) to ensure consistency, quality, and alignment with the project's vision.

## Project Persona & Voice

The brand voice of Jason Brain is:
- **Experienced & Professional**: Reflects 30+ years of expertise.
- **Creative & Innovative**: Bridges technology and art.
- **Personable & Passionate**: Connects with the audience on a human level.

All new copy and content should align with this voice. When in doubt, refer to the existing text on the `index.html` and `readme.md` files. The tone is confident, inspiring, and slightly futuristic.

## Tech Stack
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Backend**: PHP (v8.4 on production)
- **Database**: MySQL
- **Contact Form**: Self-hosted PHP script
- **Blogs**: Blogger platform, with custom XML templates stored in the `blogger-templates/` directory.
- **Hosting**: PHP-enabled hosting (e.g., cPanel)

## Development Workflow

1.  **Initial Setup**: Before starting, copy the `config-sample.php` file to a new file named `config.php`. Update `config.php` with your local environment details (e.g., a test email address). This file is ignored by Git and is required for features like the contact form to work.
    ```bash
    cp config-sample.php config.php
    ```
1.  **Create a new branch**: All new features or fixes should be done in a separate branch.
    ```bash
    git checkout -b feature/your-feature-name
    ```
2.  **Write clean code**: Follow the coding standards outlined below.
3.  **Update documentation**: If you add a new feature, update the `ROADMAP.md` or `CHANGELOG.md` as needed.
4.  **Submit a Pull Request**: Provide a clear description of the changes you've made.

## Coding Standards

### Site Architecture
- **Multi-Page Structure**: The site is moving from a single-page, anchor-link-heavy design to a more robust multi-page architecture. New top-level sections (like "About" or "Contact") should be created in their own subdirectories (e.g., `/about/`, `/contact/`) with an `index.php` file. This improves SEO, maintainability, and user navigation.
- **Descriptive URLs**: Directory names should be lowercase, hyphenated, and descriptive of the page's content (e.g., `music-production`). This creates clean, SEO-friendly URLs.
- **Reusable Components**: Core repeating elements like the navigation and footer are managed as PHP includes (`nav.html`, `footer.html`). All new pages should use these includes to ensure consistency.
  - `<?php include '../nav.html'; ?>`
  - `<?php include '../footer.html'; ?>`
- **Sitemap**: Whenever a new page is added or an existing one is removed, the `sitemap.xml` file in the root directory must be updated to reflect the change. This is crucial for SEO and ensuring search engines can find all content.
- **Internal Linking**: When relevant, add contextual links within page content to other pages on the site. This helps users discover more content and signals the relationship between pages to search engines.

### HTML
- Use semantic HTML5 tags (`<section>`, `<nav>`, `<header>`, `<footer>`, etc.).
- **Page Metadata**: Every page must have a unique and descriptive:
  - `<title>` tag (e.g., "Wedding DJ Services in Haliburton | Jason Brain").
  - `<meta name="description">` tag that summarizes the page content (approx. 150-160 characters).
- Ensure all images have descriptive `alt` attributes for accessibility and SEO.
- Use lazy loading (`loading="lazy"`) for off-screen images and iframes to improve performance.
- **Structured Data**: Use Schema.org structured data (via JSON-LD script) to help search engines understand the page's content. Refer to `contact/index.php` for an example of `ContactPage` schema.

### CSS
- Follow the existing BEM-like naming convention (e.g., `.contact-form-container`, `.package-feature-item`).
- Keep styles organized into logical sections with comments (e.g., `/* Top Navigation */`, `/* Contact Section */`).
- Use the CSS variables defined in `:root` for all colors and fonts to maintain consistency with `STYLE_GUIDE.md`.
- Prioritize mobile-first responsive design. Use `@media (max-width: ...)` for adjustments on smaller screens.

### JavaScript
- Write clean, modern JavaScript (ES6+).
- Ensure all shared, custom scripts are placed in the root `script.js` file.
- Add comments to explain complex logic.
- Ensure any new interactive elements are accessible via keyboard.

### Iframe Lazy-Loading (Facade Pattern)
- **Purpose**: To improve initial page load speed by deferring the loading of heavy `iframe` content (like music players) until a user clicks on a placeholder.
- **Location**: The logic is located in `script.js` inside the `DOMContentLoaded` event listener.
- **How to Use**:
  1.  Instead of placing an `<iframe>` tag directly in the HTML, create a `<div>` with the class `iframe-placeholder`.
  2.  Add a `data-src` attribute to the div, containing the URL that the final iframe will use.
  3.  Inside the `div`, you can add simple HTML to style the placeholder, such as a play button and text.
- **Example HTML**:
  ```html
  <div class="iframe-placeholder" data-src="https://app.hearthis.at/embed/...">
    <div class="iframe-placeholder-content">
      <div class="play-button"></div>
      <p>Load Player</p>
    </div>
  </div>
  ```
- **How it Works**: The script finds all `.iframe-placeholder` elements, listens for a click, and then dynamically creates the `iframe` element and replaces the placeholder with it.


### Header Canvas Animation
- **Location**: The logic is located in `script.js` inside the `DOMContentLoaded` event listener, triggered by the presence of the `.lights` canvas element.
- **Overview**: This is a custom, multi-layered animation. It's designed to be a visually engaging, interactive element for the site's header.
- **Key Components**:
  - `lights`: An array of objects representing the colored orbs that orbit a central point. This creates the "disco ball" effect.
  - `ripples`: An array of objects created on `mousedown` or `touchstart` events, creating an expanding "water ripple" effect.
  - `stars`: An array of objects for the twinkling starfield background.
  - `animate()`: The core animation loop using `requestAnimationFrame` to draw all components onto the canvas.
- **Contribution Guidelines**:
  - **Performance**: Be mindful of performance. New effects should be efficient and not cause significant CPU/GPU load. Test on various devices.
  - **Modularity**: When adding new effects, try to keep their logic separate within the `animate()` loop for clarity.
  - **Configuration**: If adding configurable parameters (e.g., number of stars, light speed), consider defining them as constants at the top of the animation block.
  - **Brand Alignment**: New visual effects should align with the "Creative & Innovative" and "slightly futuristic" brand voice.


### Commit Messages

Follow the Conventional Commits specification. This helps in automating changelogs and understanding the history.
- `feat:` (a new feature)
- `fix:` (a bug fix)
- `docs:` (changes to documentation)
- `style:` (code formatting, white-space, etc.)
- `refactor:` (code changes that neither fix a bug nor add a feature)
- `perf:` (a code change that improves performance)

## Release Process

When preparing a new version for release (e.g., `v1.2.0`), follow these steps:

1.  **Update the Changelog**: Move all items from the `[Unreleased]` section of `CHANGELOG.md` to a new version heading (e.g., `[1.2.0] - YYYY-MM-DD`).
2.  **Create a Release Description**: Create a new markdown file named after the version (e.g., `v1.2.0.md`). This file should summarize the key changes, new features, and bug fixes included in the release. Use previous release descriptions as a template.
3.  **Tag the Release**: Once the changes are merged into the main branch, create a new Git tag for the version.
    ```bash
    git tag -a v1.2.0 -m "Release v1.2.0"
    git push origin v1.2.0
    ```
4.  **Create GitHub Release**: Use the content from the release description markdown file to create a new release on GitHub, attaching the tag you just created.