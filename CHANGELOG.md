# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.4.3] - 2025-12-20

### Added
- **Architecture**: Created `head.php` server-side include to centralize meta tags, CSS links, and analytics scripts across all pages.
- **Configuration**: Added `SITE_AUTHOR`, `SITE_DESCRIPTION`, and `SITE_KEYWORDS` to `config-sample.php` (and `config.php`) for global SEO management.

### Changed
- **Refactoring**: Updated `index.php`, `about/index.php`, and `contact/index.php` to use the new `head.php` include and configuration constants, reducing code duplication.
- **Documentation**: Updated `README.md` to standardize link formatting for project case studies.
- **Roadmap**: Marked "Shared Head Include" as completed in `ROADMAP.md`.

## [1.4.2] - 2025-12-20

### Added
- **Web Developer**: Created a dedicated case study page (`web-developer/lab-project.php`) for the "LAB: Digital Workshop" project, including a "Recent Updates" section.
- **Web Developer**: Added "Project Milestones" section to `lab-project.php` detailing v1.0.0 and v1.0.1 releases.
- **Web Developer**: Created a dedicated case study page (`web-developer/jasonbrain-project.php`) for the main `jasonbrain.com` monorepo.
- **Web Developer**: Added "Latest Update" and "Project Milestones" sections to the `jasonbrain-project.php` case study, sourcing content from the project's changelog.
- **Styles**: Added `.spotify-placeholder` class to `styles.css` for branded Spotify placeholders.

### Changed
- **Web Developer**: Updated the project card in `web-developer/index.php` to link to the new case study page.
- **Web Developer**: Updated the `jasonbrain.com` project card to link to its new case study page.
- **Portfolio**: Updated `README.md` to include the LAB project and technical details of the `jasonbrain.com` monorepo.
- **SEO**: Updated `sitemap.xml` to include the new case study page.
- **Corporate Events**: Rewrote `corporate-events/index.php` to pivot focus from Toronto to Haliburton corporate retreats and northern AV services.
- **Resume**: Added Rogers TV broadcast experience to `resume/index.php`.
- **Performance**: Implemented "click-to-load" iframe facade pattern on `wedding-dj/index.php` to improve page load speed.
- **Scripts**: Enhanced `script.js` to support dynamic height inheritance for iframe placeholders.
- **UI/UX**: Refactored FAQ sections on all service pages to use interactive collapsible accordions.

## [1.4.1] - 2025-12-19

### Added
- **Styles**: Added global CSS classes for the Testimonials section (`.testimonials`, `.testimonial-card`, etc.) to `styles.css`.
- **Roadmap**: Added tasks for implementing the testimonial form toggle and converting remaining service page contact forms to PHP.
- **Documentation**: Added "Form Handling & Security" section to `CONTRIBUTING.md` defining standards for PHP forms and configuration.

### Changed
- **Styles**: Removed text decoration (underline) from `.cta-button` in `styles.css` to ensure consistent button styling.
- **Documentation**: Updated `STYLE_GUIDE.md` to explicitly state that buttons should have no text decoration.
- **Wedding DJ**: Converted contact and testimonial forms in `wedding-dj/index.php` to use self-hosted PHP and secure `config.php` credentials.
- **Corporate Events**: Converted contact form in `corporate-events/index.php` to use self-hosted PHP.
- **Music Production**: Converted contact form in `music-production/index.php` to use self-hosted PHP.
- **Web Developer**: Converted contact form in `web-developer/index.php` to use self-hosted PHP.

## [1.4.0] - 2025-12-18

### Added
- **Resume Page**: Created a dedicated `/resume/` page with a print-friendly layout to showcase education, certifications, and work history.
- **Contact Form**: Added "Employment / Hiring Inquiry" to the service interest dropdown in `contact/index.php`.

### Changed
- **About Page**: Completely rewrote `/about/index.php` to narrate the fusion of creative experience with technical expertise (Creative Technologist).
- **Navigation**: Added a direct link to the Resume page in the main navigation menu (`nav.html`).
- **README**: Updated the repository `README.md` to function as a technical profile and portfolio overview.

## [1.3.0] - 2025-12-18

### Added
- Created a custom `404.php` error page.
- Updated the **Project Showcase** in the Web Developer section to include the `jasonbrain.com` monorepo and the new `lab.jasonbrain.com` SPA.

### Changed
- **perf**: Implemented the "click-to-load" iframe facade on the `music-production` page to improve initial load performance.

### Fixed
- Improved accessibility for interactive elements (`.package-card`, `.venue-card`) by removing inline `onclick` attributes and implementing keyboard navigation via `script.js`.

## [1.2.0] - 2025-12-13

### Added
- **Blogger Template**: Created the initial version of the custom Blogger XML template (`blogger-template.xml`) by importing and adapting a working theme.
- Created a dedicated contact page (`/contact/`) with a self-hosted PHP form processor.
- Created a dedicated about page (`/about/`) to improve site navigation and structure.
- Created a reusable `footer.html` include to standardize the site footer.

### Changed
- **Architecture**: Converted all pages from `.html` to `.php` to enable server-side includes for shared components (`nav.html`, `footer.html`), replacing the previous JavaScript-based loading mechanism.
- **Blogger Template**: Refactored `blogger-template.xml` to use the project's standard CSS variables, aligning its color palette and fonts with `STYLE_GUIDE.md`.
- Updated `sitemap.xml` to include new pages and reflect recent changes.
- Refactored all pages (`index.php`, `about/`, `contact/`, and all service pages) to use the new `footer.html` include, completing the component standardization.

### Removed
- **Blogger Template**: Deleted the obsolete `base-template.xml` placeholder file.
- Removed the third-party Formspree dependency for contact forms.
- Removed the full "About" section from the homepage, replacing it with a concise teaser.
- Deleted redundant `sitemap-main.xml` file.

## [1.1.0] - 2025-12-13
### Added
- Created dedicated service pages for Wedding DJ, Music Production, Web Developer, and Corporate Events.
- Created a shared `nav.html` file to act as a single source of truth for the site's navigation.
- Added project documentation: `ROADMAP.md`, `CONTRIBUTING.md`, and `STYLE_GUIDE.md`.
- Created a consolidated `sitemap.xml` for the root directory.
- Added `blogger-templates` directory with a base template to guide blog styling.

### Changed
- **Site Architecture**: Migrated all service pages from separate subdomains into a unified subfolder structure within the main repository.
- **Code Consolidation**: Updated all internal links across pages to use relative paths, improving site portability and maintainability.
- **Code Consolidation**: Refactored all pages to use a single, centralized `script.js` and `styles.css` from the root directory.
- **Code Consolidation**: Implemented a JavaScript function (`loadNav`) to dynamically load the shared navigation menu on all pages.
- **CSS**: Refactored the main `styles.css` to use CSS variables as defined in `STYLE_GUIDE.md`.
- Updated `README.md` and `ROADMAP.md` to reflect the new consolidated structure and future refactoring plans.

### Fixed
- Resolved a race condition where the dynamic navigation menu failed to load correctly on the homepage.
- Restored the header's water ripple effect which was missing after the JavaScript refactoring.

### Removed
- Deleted redundant `styles.css`, `script.js`, and `sitemap.xml` files from all service subdirectories to finalize asset consolidation.

## [1.0.0] - 2025-12-13
### Added
- Initial release of the jasonbrain.com personal portfolio website.
- Includes sections for About, Services, Featured Work, Music, Web Development, Corporate Events, and Contact.
- Implemented responsive design for mobile and desktop.
- Integrated Formspree for the contact form.
- Added lazy loading for images and iframe placeholders for performance.

[Unreleased]: https://github.com/jasonbra1n/jasonbra1n/compare/v1.4.1...HEAD
[1.4.1]: https://github.com/jasonbra1n/jasonbra1n/compare/v1.4.0...v1.4.1
[1.4.0]: https://github.com/jasonbra1n/jasonbra1n/compare/v1.3.0...v1.4.0
[1.3.0]: https://github.com/jasonbra1n/jasonbra1n/compare/v1.2.0...v1.3.0
[1.2.0]: https://github.com/jasonbra1n/jasonbra1n/compare/v1.1.0...v1.2.0
[1.1.0]: https://github.com/jasonbra1n/jasonbra1n/compare/v1.0.0...v1.1.0
[1.0.0]: https://github.com/jasonbra1n/jasonbra1n/releases/tag/v1.0.0