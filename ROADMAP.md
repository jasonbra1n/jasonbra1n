# Project Roadmap

This document outlines the development roadmap for jasonbrain.com. It serves as a guide for future features, enhancements, and strategic goals.

## Guiding Principles
- **Showcase Multi-Disciplinary Talent**: The site must effectively represent Jason Brain's skills in music, technology, and creative production.
- **User Experience First**: Every feature should be intuitive, performant, and engaging.
- **Maintain Brand Consistency**: All new sections and pages must adhere to the established style guide.

---

## Short-Term (Next 3 Months)

- **[Done] Foundational Refactoring**:
  - Migrate all service pages from subdomains to subfolders within this repository (e.g., `/wedding-dj/`, `/music-production/`).
  - Implemented a shared navigation menu loaded via JavaScript.
  - Centralized all CSS and JavaScript assets into root files.
  - Refactored the main stylesheet to use CSS variables.

- **[To Do] Performance & Accessibility Pass**:
  - **Accessibility**: Make all interactive elements keyboard-accessible (e.g., convert `div` with `onclick` to proper links or buttons).
  - **Image Optimization**: Implement responsive images using `srcset` or the `<picture>` element to improve load times on different devices.
  - **Asset Minification**: Introduce a build step to minify CSS and JavaScript files for production.

- **[To Do] Enhance SEO & User Experience**:
  - Create a custom `404.html` error page.
  - Expand Schema.org structured data on all pages for richer search results.

- **[In Progress] Blog Template Development**:
  - The Music Blog (`blog.jasonbrain.com`) and Tech Blog (`devblog.jasonbrain.com`) will remain on the Blogger platform.
  - Develop custom Blogger XML templates that align with this site's `STYLE_GUIDE.md`.
  - Create a `blogger-templates/` directory in this repository to store and version-control the templates, ensuring brand consistency.

- **[To Do] Blog Content Population**:
  - Write and publish the first 3-5 articles for both the Music Blog and Tech Blog to establish a content baseline on their respective platforms.

- **[To Do] Enhance Music Section**:
  - Investigate more dynamic ways to present music (e.g., custom audio player, API integration with Mixcloud/SoundCloud).
  - Add more context or stories behind the featured mixes and productions.

## Medium-Term (3-6 Months)

- **[Planned] Interactive Web Development Portfolio**:
  - Create a dedicated gallery or case study section for web development projects.
  - Include project descriptions, technologies used, and links to live sites.

- **[Planned] Video Gallery**:
  - Integrate a gallery for video production work, including projection mapping examples and DJ event recaps.

## Long-Term (6+ Months)

- **[Vision] E-commerce Integration**:
  - Explore selling digital products (sample packs, music tracks) or services (consulting sessions) directly through the site.

- **[Vision] Interactive Audio-Visual Experiences**:
  - Leverage WebGL or other technologies to create a unique, interactive experience on the homepage that combines Jason's music and visual art style.