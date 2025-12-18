# Project Roadmap

This document outlines the development roadmap for jasonbrain.com. It serves as a guide for future features, enhancements, and strategic goals.

## Guiding Principles
- **Showcase Multi-Disciplinary Talent**: The site must effectively represent Jason Brain's skills in music, technology, and creative production.
- **User Experience First**: Every feature should be intuitive, performant, and engaging.
- **Maintain Brand Consistency**: All new sections and pages must adhere to the established style guide.

---

## Short-Term (Next 3 Months)

- **[Done] Server-Side Enhancement (PHP)**:
  - **Server-Side Includes**: Refactored all pages to use PHP `include` for shared components like the navigation (`nav.html`) and footer (`footer.html`), completing the transition away from the old JavaScript loader.
    - **Navigation**: All pages now use `<?php include 'nav.html'; ?>`.
    - **Footer**: All pages now use `<?php include 'footer.html'; ?>`.
  - **[Done] Self-Hosted Forms**: Replace the third-party Formspree dependency with a custom PHP script to handle contact form submissions.
- **[Done] Security & Best Practices**:
  - **Configuration Management**: Implemented a `config.php` file for sensitive data (like email addresses), which is ignored by Git. A `config-sample.php` is provided for developers.
  - **[Done] Professional Branding & Career Pivot**:
    - Created a dedicated `/resume/` page to showcase technical skills, education, and certifications.
    - Refactored `/about/` narrative to reflect the transition from entertainment to software development.
    - Updated `README.md` to serve as a technical profile for GitHub visitors.
- **[Done] Foundational Refactoring (v1.1.0)**:
  - Migrate all service pages from subdomains to subfolders within this repository (e.g., `/wedding-dj/`, `/music-production/`).
  - Implemented a shared navigation menu loaded via JavaScript.
  - Centralized all CSS and JavaScript assets into root files.
  - Refactored the main stylesheet to use CSS variables.
- **[To Do] Performance & Accessibility Pass**:
  - **[Done] Accessibility**: Make all interactive elements keyboard-accessible (e.g., convert `div` with `onclick` to proper links or buttons).
  - **Image Optimization**: Implement responsive images using `srcset` or the `<picture>` element to improve load times on different devices.
  - **[In Progress] Iframe Optimization**: Expand the use of the "click-to-load" iframe facade pattern to all pages with embedded media (e.g., Spotify, HearThis.at) to improve performance.
  - **Asset Minification**: Introduce a build step to minify CSS and JavaScript files for production.
- **[To Do] Enhance SEO & User Experience**:
  - **[Done] Create a custom `404.html` error page.**
  - Expand Schema.org structured data on all pages for richer search results.
- **[In Progress] Blog Template Development**:
  - **Initial Template Complete**: A custom Blogger XML template (`blogger-template.xml`) has been developed to align with the main site's branding and `STYLE_GUIDE.md`.
  - **[To Do] Refinement & Deployment**: Refine the template's CSS variables and responsive behavior, then deploy it to both the Music Blog and Tech Blog.
  - The template is version-controlled in the `blogger-templates/` directory.

- **[To Do] Blog Content Population**:
  - Write and publish the first 3-5 articles for both the Music Blog and Tech Blog to establish a content baseline on their respective platforms.

- **[To Do] Enhance Music Section**:
  - Investigate more dynamic ways to present music (e.g., custom audio player, API integration with Mixcloud/SoundCloud).
  - Add more context or stories behind the featured mixes and productions.

## Medium-Term (3-6 Months)

- **[Planned] Enhance Header Animation**:
  - Refactor the existing header canvas animation in `script.js` to be more modular and configurable.
  - Explore adding new interactive layers or effects (e.g., audio-reactive elements, different color palettes) to the "disco ball" and "water ripple" animations.

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