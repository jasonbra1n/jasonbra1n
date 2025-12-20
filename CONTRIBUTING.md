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
- **Development Environment**: VS Code with the Gemini Code Assist extension.

### AI Collaboration
- **Primary AI Assistant**: Google Gemini is the primary AI coding assistant for this project, acting as a pair programmer under human direction.
- **Workflow**: The development process follows a Human-AI collaboration model, where the human director sets the vision and standards, and the AI assistant helps with code generation, refactoring, and documentation.

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

## Content & Resume Maintenance

To ensure the professional profile remains current, please adhere to the following update triggers:
- **Resume Page (`/resume/`)**: Update this page whenever a significant project is completed, a new technology is mastered, or a new certification is earned.
- **GitHub Profile (`README.md`)**: This file acts as the public-facing portfolio. Ensure it mirrors the skills and "Current Focus" listed on the resume page.
- **Service Pages**: When adding new capabilities (e.g., a new music production service), ensure the corresponding service page and the "Services" dropdown in `nav.html` are updated.
- **Project Case Studies**: For major projects (like `jasonbrain.com` or `lab.jasonbrain.com`), create a dedicated case study page within the `/web-developer/` directory to detail the project's architecture, features, and tech stack. This serves as a deep-dive for the portfolio.

## Roadmap Maintenance

- **Completed Tasks**: When a task in `ROADMAP.md` is marked as `[Done]`, move it from its current section (e.g., Short-Term) to the "Completed Tasks" list at the bottom of the file. This keeps the active roadmap focused on pending work.

## Coding Standards

### Site Architecture
- **Multi-Page Structure**: The site is moving from a single-page, anchor-link-heavy design to a more robust multi-page architecture. New top-level sections should be created in their own subdirectories (e.g., `/about/`, `/contact/`, `/resume/`) with an `index.php` file. This improves SEO, maintainability, and user navigation.
- **Descriptive URLs**: Directory names should be lowercase, hyphenated, and descriptive of the page's content (e.g., `music-production`). This creates clean, SEO-friendly URLs.
- **Reusable Components**: Core repeating elements like the navigation and footer are managed as PHP includes (`nav.html`, `footer.php`). All new pages should use these includes to ensure consistency.
  - `<?php include '../nav.html'; ?>`
  - `<?php include '../footer.php'; ?>`
- **Application Entrypoint**: All pages should begin by requiring the `src/bootstrap.php` file, which handles configuration loading and future class autoloading.
- **PHP Logic**: Business logic (like form handlers or data processors) should eventually be encapsulated in classes within a `/src` directory to keep page files clean.
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

### Form Handling & Security
- **Self-Hosted PHP**: All forms should be processed by self-hosted PHP scripts within the same page (or a dedicated handler), removing dependencies on third-party services like Formspree.
- **Configuration**: Never hardcode email addresses or sensitive credentials in the PHP files.
  - Always require `config.php` at the top of the file.
  - Use the constants defined in `config.php` (e.g., `RECIPIENT_EMAIL`, `RECIPIENT_NAME`).
  - Include a fallback or `die()` check if `config.php` is missing to prevent errors in environments where it hasn't been set up.
- **Spam Protection**: Implement a "honeypot" field (hidden input) to catch basic bots.
- **Sanitization**: Always sanitize and validate user input (`strip_tags`, `filter_var`) before processing or sending emails.

### Iframe Lazy-Loading (Facade Pattern)
- **Purpose**: To improve initial page load speed by deferring the loading of heavy `iframe` content (like music players) until a user clicks on a placeholder.
- **Location**: The logic is located in `script.js` inside the `DOMContentLoaded` event listener.
- **How to Use**:
  1.  Instead of placing an `<iframe>` tag directly in the HTML, create a `<div>` with the class `iframe-placeholder`.
  2.  Add a `data-src` attribute to the div, containing the URL that the final iframe will use.
  3.  Set the desired height of the placeholder and the final iframe using an inline style (e.g., `style="height: 352px;"`). If no height is set, it will default to a `min-height` of 150px.
  3.  Inside the `div`, you can add simple HTML to style the placeholder, such as a play button and text.
- **Example HTML**:
  ```html
  <div class="iframe-placeholder" data-src="https://app.hearthis.at/embed/..." style="height: 150px;">
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