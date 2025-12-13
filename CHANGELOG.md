# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

### Changed

### Fixed

### Removed

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

[Unreleased]: https://github.com/jasonbra1n/jasonbra1n/compare/v1.1.0...HEAD
[1.1.0]: https://github.com/jasonbra1n/jasonbra1n/compare/v1.0.0...v1.1.0
[1.0.0]: https://github.com/jasonbra1n/jasonbra1n/releases/tag/v1.0.0