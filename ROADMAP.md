# Project Roadmap

This document outlines the development roadmap for jasonbrain.com. It serves as a guide for future features, enhancements, and strategic goals.

## Guiding Principles
- **Showcase Multi-Disciplinary Talent**: The site must effectively represent Jason Brain's skills in music, technology, and creative production.
- **User Experience First**: Every feature should be intuitive, performant, and engaging.
- **Maintain Brand Consistency**: All new sections and pages must adhere to the established style guide.

---

## Short-Term (Next 3 Months)

- **[To Do] Performance & Accessibility Pass**:
  - **Image Optimization**: Implement responsive images using `srcset` or the `<picture>` element to improve load times on different devices.
  - **[Done] Iframe Optimization**: Expand the use of the "click-to-load" iframe facade pattern to all pages with embedded media (e.g., Spotify, HearThis.at) to improve performance.
  - **Asset Minification**: Introduce a build step to minify CSS and JavaScript files for production.
- **[To Do] Enhance SEO & User Experience**:
  - Expand Schema.org structured data on all pages for richer search results.
- **[In Progress] Blog Template Development**:
  - **Initial Template Complete**: A custom Blogger XML template (`blogger-template.xml`) has been developed to align with the main site's branding and `STYLE_GUIDE.md`.
  - **[To Do] Refinement & Deployment**: Refine the template's CSS variables and responsive behavior, then deploy it to both the Music Blog and Tech Blog.
  - The template is version-controlled in the `blogger-templates/` directory.

- **[To Do] Blog Content Population**:
  - Write and publish the first 3-5 articles for both the Music Blog and Tech Blog to establish a content baseline on their respective platforms.

- **[To Do] UI/UX Refinements**:
  - **Social Links**: Add social network links to the Contact page to provide alternative ways to connect.
  - **Page Headers**: Refine page header styles (height, padding, typography) to improve readability and responsiveness across different devices.

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

## Completed Tasks

- **Server-Side Enhancement (PHP)**:
  - **Server-Side Includes**: Refactored all pages to use PHP `include` for shared components like the navigation (`nav.html`) and footer (`footer.html`).
  - **Self-Hosted Forms**: Replace the third-party Formspree dependency with a custom PHP script.
- **Security & Best Practices**:
  - **Configuration Management**: Implemented a `config.php` file for sensitive data.
  - **Professional Branding & Career Pivot**:
    - Created a dedicated `/resume/` page.
    - Refactored `/about/` narrative.
    - Updated `README.md`.
- **Foundational Refactoring (v1.1.0)**:
  - Migrate all service pages from subdomains to subfolders.
  - Implemented a shared navigation menu.
  - Centralized all CSS and JavaScript assets.
  - Refactored the main stylesheet to use CSS variables.
- **Accessibility**: Make all interactive elements keyboard-accessible.
- **Create a custom `404.html` error page.**
- **Functional Enhancements**:
  - **Testimonial Form**: Add `toggleTestimonialForm` function to `script.js`.
  - **Form Conversion**: Audit and convert all remaining service page contact forms from Formspree to the self-hosted PHP method.
- **UI/UX Refinements**:
  - **FAQ Styling**: Improve the CSS for FAQ sections across all pages to enhance readability and visual appeal.
- **Content Strategy & Updates**:
  - **Corporate Events Pivot**: Refocus the Corporate Events page away from Toronto to highlight Haliburton corporate events and AV services for northern retreats.
  - **Resume Expansion**: Add 6+ years of Rogers TV experience (Durham Region) to the resume.