# Project Roadmap

This document outlines the development roadmap for jasonbrain.com. It serves as a guide for future features, enhancements, and strategic goals.

## Guiding Principles
- **Showcase Multi-Disciplinary Talent**: The site must effectively represent Jason Brain's skills in music, technology, and creative production.
- **User Experience First**: Every feature should be intuitive, performant, and engaging.
- **Maintain Brand Consistency**: All new sections and pages must adhere to the established style guide.

---

## Short-Term (Next 3 Months)

- **[In Progress] Strategic Brand Pivot ([BrainAV](https://github.com/BrainAV))**:
  - **Differentiation**: Formalize the distinction between **Jason Brain** (Personal Services/Portfolio) and **BrainAV** (AI Products/Tech Lab).
  - **Rebranding**: Transition `BrainAV.ca` from a wedding DJ service to the home for "The DJ Brain" and AI music tools.
  - **Lab Migration**: Rebrand "LAB: Digital Workshop" to be exclusively associated with Brain AV, consolidating all "Lab" concepts under the Tech Lab organization.

- **[To Do] Performance & Accessibility Pass**:
  - **Image Optimization**: Implement responsive images using `srcset` or the `<picture>` element to improve load times on different devices.
  - **Explicit Image Dimensions**: Add `width` and `height` attributes to all `<img>` tags to prevent Cumulative Layout Shift (CLS).
  - **Defer Third-Party Scripts**: Defer loading of Google Ads and Google Tag Manager scripts to reduce unused JavaScript and improve initial load time.
  - **Asset Minification**: Introduce a build step to minify CSS and JavaScript files for production.
  - **Remove Inline JS**: Move inline `onclick` handlers (e.g., scroll behaviors) to `script.js` using event delegation.
- **[To Do] Enhance SEO & User Experience**:
  - Expand Schema.org structured data on all pages for richer search results.
- **[To Do] Configuration Refactoring**:
  - **Centralize Form Logic**: Create a `src/ContactForm.php` class to encapsulate form handling logic, reducing duplication across service pages.
- **[In Progress] Blog Template Development**:
  - **Initial Template Complete**: A custom Blogger XML template (`blogger-template.xml`) has been developed to align with the main site's branding and `STYLE_GUIDE.md`.
  - **[To Do] Refinement & Deployment**: Refine the template's CSS variables and responsive behavior, then deploy it to both the Music Blog and Tech Blog.
  - The template is version-controlled in the `blogger-templates/` directory.

- **[To Do] Blog Content Population**:
  - Write and publish the first 3-5 articles for both the Music Blog and Tech Blog to establish a content baseline on their respective platforms.

- **[To Do] UI/UX Refinements**:
  - **Page Headers**: Refine page header styles (height, padding, typography) to improve readability and responsiveness across different devices.

- **[Planned] Seasonal & Occasion Effects**:
  - Expand the "Festive Mode" logic to support other holidays (e.g., New Year's Fireworks, Valentine's Hearts).
  - Create a configuration structure to easily schedule these effects.

- **[In Progress] Gemini API Integration**:
  - **[Done] Phase 1**: Add `GEMINI_API_KEY` to `config.php` to enable server-side AI features.
  - **[Done] Phase 2**: Create a PHP service class (`src/GeminiService.php`) to handle API requests.
  - **[Done] Phase 3**: Migrate credentials to the database (manageable via Admin Settings).

- **[To Do] Enhance Music Section**:
  - Investigate more dynamic ways to present music (e.g., custom audio player, API integration with Mixcloud/SoundCloud).
  - Add more context or stories behind the featured mixes and productions.

- **[In Progress] DJ Brain (BrainAV Flagship Product)**:
  - **Phase 1 (Foundation)**: Implement Mopidy setup, Database Schema, and PHP Backend MVP (API & Request Handling).
  - **Phase 2 (The Brain)**: Develop the Python AI Engine for intelligent queue management and context awareness.
  - **Phase 3 (Polish)**: Refine the frontend UI and implement multi-room audio support.

- **[To Do] Side Quest: AVDJ.ca & Flight Deck**:
  - **AVDJ.ca**: Establish the web presence for the AVDJ.ca domain.
  - **Flight Deck App**: Formalize and continue development of the custom "Flight Deck" control interface.

## Medium-Term (3-6 Months)

- **[Planned] Enhance Header Animation**:
  - Refactor the existing header canvas animation in `script.js` to be more modular and configurable.
  - Explore adding new interactive layers or effects (e.g., audio-reactive elements, different color palettes) to the "disco ball" and "water ripple" animations.

- **[In Progress] Admin Dashboard & CMS**:
  - **Database Integration**: Implement a secure login system backed by the MariaDB database.
  - **[In Progress] Content Management**: Create a dashboard to manage site settings (e.g., toggle Festive Mode, update contact info, manage Gemini API keys) and content.
  - **[To Do] Dynamic Routing**: Implement a router to fetch page and post content from the database based on the requested URL slug.

- **[Planned] BRAIN AV: AI Co-Producer**:
  - **Concept**: An open-source AI assistant for Ableton Live acting as an "Executive Producer" via OSC.
  - **Features**: Generative MIDI composition, sound design recipes, and arrangement orchestration.
  - **Tech**: Python bridge, AbletonOSC, and Local/Cloud LLM inference.

- **[Planned] Interactive Web Development Portfolio**:
  - Create a dedicated gallery or case study section for web development projects.
  - Include project descriptions, technologies used, and links to live sites.

- **[Planned] Video Gallery**:
  - Integrate a gallery for video production work, including projection mapping examples and DJ event recaps.

## Long-Term (6+ Months)

- **[Vision] E-commerce Integration**:
  - Explore selling digital products (sample packs, music tracks) or services (consulting sessions) directly through the site.

- **[Vision] Open Source "ResumeCMS" Product**:
  - Evolve the public resume/portfolio site into a packaged, reusable open-source product.
  - Create an installer and documentation for other creative professionals to host their own version.
- **[Vision] AI-Powered Site Builder**:
  - An admin tool to generate new pages and content from prompts, with a staging area for review before publishing.
  - This would form the core of a "self-administering" CMS, leveraging the Gemini API.

- **[Vision] Interactive Audio-Visual Experiences**:
  - Leverage WebGL or other technologies to create a unique, interactive experience on the homepage that combines Jason's music and visual art style.

## Completed Tasks

- **Resume Update**: Refined "Great Blue Heron Casino" entry with specific technical achievements (Systems Operator, Kiosks, ITIL).
- **Admin Authentication**: Implemented a secure, session-based login system (`login.php`, `logout.php`) for the `/admin/` area, backed by the MariaDB `users` table.
- **Admin Foundational Setup**: Created and secured initial admin setup (`setup.php`) and diagnostic (`db-check.php`) scripts, and fixed class autoloading in `bootstrap.php`.
- **Admin Settings**: Created `admin/settings.php` and `src/Settings.php` to manage site configuration from the database.
- **Maintenance Mode**: Implemented a database-driven maintenance mode system.
- **Festive Mode**: Implemented a seasonal "Snowflake" animation for the site header in `script.js` that automatically activates between Dec 19 and Jan 1.
- **Mobile Navigation**: Fixed the hamburger menu functionality by re-enabling the event listeners in `script.js`.
- **Repository Structure Refinement (Phase 2)**:
  - **Isolate Web Root**: Moved all public-facing code (`index.php`, assets, content pages) into a `public/` directory.
  - **Path Updates**: Verified `bootstrap.php` references in all page files account for the new directory structure.
  - **Project Hub**: Created a static `index.html` at the root to serve as a GitHub Pages landing site.
- **Repository Structure Refinement**:
  - **Adopt Best Practices**: Created `.gemini/` directory and moved `prompt.md` there.
  - **Cleanup**: Removed redundant `ROADMAP.md` and `STYLE_GUIDE.md` from the root directory.
  - **Changelog**: Updated `CHANGELOG.md` to link to detailed release notes in `docs/releases/`.
- **Refactor project structure**: Move documentation to .github directory for repository cleanliness.
- **Server-Side Enhancement (PHP)**:
  - **Server-Side Includes**: Refactored all pages to use PHP `include` for shared components like the navigation (`nav.html`) and footer (`footer.php`).
  - **Self-Hosted Forms**: Replace the third-party Formspree dependency with a custom PHP script.
  - **Shared Head Include**: Created `head.php` to centralize meta tags and assets.
  - **Bootstrap Implementation**: Implemented `src/bootstrap.php` as the single entry point for all pages.
  - **Database Connection**: Created `src/Database.php` and configured `config.php` for secure MariaDB access.
- **Security & Best Practices**:
  - **Configuration Management**: Implemented a `config.php` file for sensitive data.
  - **Professional Branding & Career Pivot**:
    - Created a dedicated `/resume/` page.
    - Refactored `/about/` narrative.
    - Updated `README.md`.
  - **DJ Brain Project**:
    - **Phase 0**: Completed project definition, architecture overview, and initial Docker scaffolding.
- **Foundational Refactoring (v1.1.0)**:
  - Migrate all service pages from subdomains to subfolders.
  - Implemented a shared navigation menu.
  - Centralized all CSS and JavaScript assets.
  - Refactored the main stylesheet to use CSS variables.
- **Accessibility**: Make all interactive elements keyboard-accessible.
  - **Venue Card Accessibility**: Refactored all venue and service cards to use semantic `<a>` tags.
- **Create a custom `404.html` error page.**
- **Functional Enhancements**:
  - **Testimonial Form**: Add `toggleTestimonialForm` function to `script.js`.
  - **Form Conversion**: Audit and convert all remaining service page contact forms from Formspree to the self-hosted PHP method.
- **UI/UX Refinements**:
  - **FAQ Styling**: Improve the CSS for FAQ sections across all pages to enhance readability and visual appeal.
  - **AI Collaboration Badge**: Added a "Developed with Gemini" badge to the site footer and `README.md`.
  - **Social Links**: Added social network links to the Contact page to provide alternative ways to connect.
- **Content Strategy & Updates**:
  - **Corporate Events Pivot**: Refocus the Corporate Events page away from Toronto to highlight Haliburton corporate events and AV services for northern retreats.
  - **Resume Expansion**: Add 6+ years of Rogers TV experience (Durham Region) to the resume.
  - **Blog Hub**: Created a dedicated `/blog/` landing page to aggregate Music and Tech blog content.
- **Strategic Brand Pivot**:
  - **Migration**: Moved "DJ Brain" project assets and documentation to the BrainAV organization context.
- **Performance**:
  - **Iframe Optimization**: Expanded the use of the "click-to-load" iframe facade pattern to all pages with embedded media (e.g., Spotify, HearThis.at) to improve performance.
- **Configuration Refactoring**:
  - **Centralize Site Data**: Defined constants for Site Name, Base URL, Contact Address, and Social Links in `config.php`.
  - **Refactor Pages**: Updated all pages (`index.php`, service pages, contact forms) to use the shared `head.php` include and config constants.
  - **Portfolio Hierarchy**: Established BrainAV as the top-level project in the showcase with a dedicated case study.
- **UI/UX Refinements**:
  - **Contact Page Layout**: Redesigned the Contact page to move the form "above the fold" into the header area for better immediate visibility.