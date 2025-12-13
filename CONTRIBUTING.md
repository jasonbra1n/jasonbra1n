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
- **Contact Form**: Formspree
- **Blogs**: Blogger platform, with custom XML templates stored in the `blogger-templates/` directory.
- **Hosting**: Static site hosting (e.g., GitHub Pages, Netlify, Vercel)

## Development Workflow

1.  **Create a new branch**: All new features or fixes should be done in a separate branch.
    ```bash
    git checkout -b feature/your-feature-name
    ```
2.  **Write clean code**: Follow the coding standards outlined below.
3.  **Update documentation**: If you add a new feature, update the `ROADMAP.md` or `CHANGELOG.md` as needed.
4.  **Submit a Pull Request**: Provide a clear description of the changes you've made.

## Coding Standards

### HTML
- Use semantic HTML5 tags (`<section>`, `<nav>`, `<header>`, `<footer>`, etc.).
- Ensure all images have descriptive `alt` attributes for accessibility and SEO.
- Use lazy loading (`loading="lazy"`) for off-screen images and iframes to improve performance.

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