# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- **Footer**: Added a link to the GitHub profile in `public/footer.php`.
- **Roadmap**: Added task to explore integrating the Lab SPA with the jasonbra1n CMS backend.

### Changed
- **Documentation**: Updated `README.md` to explicitly mention the repository's role as the foundation for "jasonbra1n CMS".
- **Roadmap**: Marked "Differentiation" and "Rebranding" tasks for the BrainAV pivot as completed.
- **Roadmap**: Shifted strategy for "LAB: Digital Workshop" from migration to integration, retaining it as a standalone SPA.
- **Roadmap**: Updated "Admin Dashboard & CMS" section to formally reference "jasonbra1n CMS".
- **Security**: Moved `public/admin/reset_password.php` to `.gemini/non_public/admin/` to prevent accidental public exposure.

### Removed
- **Cleanup**: Deleted obsolete `header.php` from `.github/` directory.

## [1.7.1] - 2026-01-01

### Added
- **Architecture**: Created `public/src/GeminiService.php` to handle communication with the Google Gemini API.
- **Documentation**: Created `docs/database.md` to guide developers on updating the database schema.
- **Authentication**: Implemented a secure, token-based "Remember Me" feature for the admin login.
- **Maintenance Mode**: Implemented a database-driven maintenance mode system. Created `public/maintenance.php` and added logic to `public/index.php` to restrict access to non-logged-in users when enabled in settings.
- **Roadmap**: Added "[Vision] AI-Powered Site Builder" to `.github/ROADMAP.md` and detailed the concept in `.gemini/scratchpad.md`.
- **Admin**: Created reusable admin header (`includes/header.php`) and footer (`includes/footer.php`) for consistent layout and security.
- **Admin**: Created a new admin dashboard at `public/admin/index.php`.
- **Admin**: Created `public/admin/settings.php` to allow management of site settings from the database.
- **Architecture**: Created `public/src/Settings.php` class to encapsulate database logic for site settings.
- **Documentation**: Added "Admin Panel Development" section to `CONTRIBUTING.md` to document the standard pattern for creating secure admin pages.
- **Festive Mode**: Implemented a seasonal "Snowflake" animation in `script.js` that automatically activates between Dec 19 and Dec 31.
- **Database**: Created `database/` directory and defined initial schema for `users` and `settings` tables in `database.sql`.
- **Workspace**: Synced the BrainAV organization website (`index.html`) to the local `workspace/BrainAV/` directory.
- **Configuration**: Updated `.gitignore` to exclude server-specific configuration and OS-generated files.
- **Documentation**: Updated `.gemini/scratchpad.md` to document the database infrastructure, admin dashboard architecture, and local workspace structure.
- **Contact Page**: Redesigned the Contact page to move the form "above the fold" into the header area for better visibility.
- **Database**: Deployed initial schema (`users`, `settings`) to production database `jasonbra_jasonbra1n`.
- **About Page**: Implemented a new glassmorphism header layout and consolidated professional details into a "Core Competencies" list.
- **Homepage**: Refreshed the "Creative Technologist" teaser with a new gradient container and centered actions.
- **Architecture**: Implemented a class autoloader in `src/bootstrap.php` to automatically load classes from the `src/` directory.
- **Database**: Created `src/Database.php` class to handle secure PDO connections using configuration constants.
- **Authentication**: Created `src/User.php` and `src/Session.php` in `public/src/` to handle login logic and session management.
- **Admin**: Created `public/admin/` directory with `login.php`, `index.php` (dashboard), `logout.php`, and `setup.php` for user management.
- **Admin**: Created `public/admin/reset_password.php` as an emergency utility to reset admin passwords (to be uploaded on demand and deleted after use).
- **Admin**: Added `db-check.php` for system diagnostics and linked it from the dashboard.
- **Configuration**: Updated `config-sample.php` to include database connection templates.

### Changed
- **Admin**: Updated `db-check.php` to verify the existence of the `auth_tokens` table.
- **Documentation**: Updated `.github/CONTRIBUTING.md` to reference the new database management guide.
- **Admin**: Refactored `db-check.php` to use the new reusable admin header and footer.
- **Documentation**: Updated `.gemini/scratchpad.md` with a detailed, phased plan for Gemini API integration features.
- **Roadmap**: Updated `.github/ROADMAP.md` to mark admin authentication as complete and shift focus to content management.
- **Documentation**: Refined PHPDoc for `Session::getUser()` for better clarity.
- **Resume**: Updated the "Great Blue Heron Casino" entry in `resume/index.php` to "Systems Operator & MIS Support". Added detailed achievements regarding Gaming Modernization (TITO, Konami), Infrastructure (POS, Island Internet), ITIL Transformation, and Special Projects (Kiosks, Biometrics).
- **Configuration**: Updated `.gitignore` to ignore the `workspace/` directory by default and all `config.php` files globally.
- **Documentation**: Updated `CONTRIBUTING.md` to clarify the usage and structure of the `workspace/` directory.
- **Roadmap**: Added "Festive Mode" to the Short-Term roadmap.
- **Roadmap**: Updated "Admin Dashboard & CMS" status to `[In Progress]` following the implementation of database and auth classes.
- **Content**: Refined copy on the About page and Homepage to be more direct and recruiter-friendly, highlighting "Systems Analysis" and "Creative Technologist" roles.
- **Performance**: Implemented responsive images (`srcset`) for the profile picture on the About page.
- **Styles**: Added `.contact-header` and `.about-header` classes to `styles.css` to support the new split-column header layouts.

### Fixed
- **Architecture**: Corrected a planning oversight by creating the `public/src/GeminiService.php` file, which was previously documented but not implemented.
- **Authentication**: Fixed fatal 500 errors on `setup.php` and `login.php` by resolving class loading issues with a robust autoloader in `bootstrap.php` and correcting property access.
- **Admin**: Fixed a fatal 500 error on the admin dashboard by adding the missing `getUser()` method to the `Session` class.
- **Security**: Re-enabled session protection on `db-check.php` to secure the diagnostics page.
- **Database**: Improved connection error handling in `src/Database.php` to provide clear error messages instead of a generic 500 error.
- **Authentication**: Corrected `password` vs `password_hash` column name mismatch in `User.php` and `reset_password.php` to align with the database schema.

## [1.7.0] - 2025-12-22

### Added
- **Social Links**: Added GitHub, YouTube, and HearThis.at to `contact/index.php` and `config.php`.

### Changed
- **Workflow**: Streamlined `.gemini/PROMPT_GUIDE.md` to focus on a "Quick Sync" workflow and removed legacy XML-based prompts.
- **Documentation**: Updated `CONTRIBUTING.md` to include `PROMPT.md` in the repository structure overview.
- **Documentation**: Updated `README.md` to link to the correct `PROMPT_GUIDE.md`.
- **Project Hub**: Updated `index.html` with absolute documentation links and expanded social icons.
- **Performance**: Implemented responsive images on the homepage (`index.php`) using `srcset` and `sizes` attributes to serve optimized WebP assets based on viewport size.

### Fixed
- **Mobile Navigation**: Restored functionality to the hamburger menu by explicitly calling `initializeNavEventListeners()` in `script.js` (broken during PHP migration).
- **Mobile UI**: Restored the hamburger menu "X" animation and improved the alignment and hover states of mobile menu items in `styles.css`.

## [1.6.0] - 2025-12-21

### Added
- **AI Workflow**: Defined the "Creative Technologist" persona and project priorities in `.gemini/persona.md` and added `scratchpad.md` to further formalize the AI collaboration process.
- **Repository**: Added a static `index.html` at the root to serve as a GitHub Pages landing hub for the project repository.
- **Blog**: Created a dedicated blog landing page at `/blog/` to serve as a hub for the Music and Tech blogs.
- **AI Workflow**: Added new prompts to `.gemini/prompt.md` for targeted development in the `public/` directory.
- **Contact Page**: Added a sidebar with social media links, fulfilling a roadmap item.
- **Styles**: Added missing `.platforms-grid` and `.platform-link` styles to `styles.css` for consistent social link display.
- **Documentation**: Added a "Badges" section to `STYLE_GUIDE.md` to standardize shields.io usage.
- **Documentation**: Added "Repository Structure" section to `.github/CONTRIBUTING.md` to define the directory layout standards.
- **Documentation**: Added links to `SECURITY.md` and `CODE_OF_CONDUCT.md` in `README.md` under Project Standards.
- **Architecture**: Moved all deployable website code (index.php, assets, src) to a `public/` directory to separate it from repository metadata.

### Changed
- **Navigation**: Updated the "Blogs" link in `nav.html` to point to the new `/blog/` landing page.
- **README**: Added a "Project Hub" badge to `README.md` linking to the new GitHub Pages landing page.
- **README**: Updated the main profile `README.md` to link to the new `/blog/` hub.
- **Repository Hub**: Enhanced root `index.html` to serve as a full "Creative Technologist Hub", adding links to the blog, social media, and a standardized Gemini badge.
- **Corporate Events**: Refactored the page header for improved readability.
- **Repository**: Moved `prompt.md` to `.gemini/` directory to declutter root.
- **Repository**: Removed redundant `ROADMAP.md` and `STYLE_GUIDE.md` from root (canonical versions are in `.github/`).
- **Changelog**: Updated version links to point to local `docs/releases/` files instead of GitHub comparisons.

### Fixed
- **Contact Page**: Added the standard site header, which was previously missing.
- **Accessibility**: Converted `div`-based "venue cards" to semantic `<a>` tags on `corporate-events/index.php` to improve accessibility, addressing a QA finding.

---

## [1.5.1] - 2025-12-20

### Added
- **Docs**: Created a second blog post for 2025-12-20 announcing the v1.5.0 release.
- **Documentation**: Updated `README.md` and `ROADMAP.md` to link to the new BrainAV GitHub Organization.
- **Web Developer**: Created a new case study page for the "BRAIN AV: AI Co-Producer" project.
- **Portfolio**: Added "AI Co-Producer" project to `README.md`.
- **Portfolio**: Expanded "3D Printing" details in `README.md` and `resume/index.php` to reflect skills listed on BrainAV.ca.
- **Portfolio**: Added "Drone Pilot" and "Live Streaming" skills to `resume/index.php`, completing the migration of personal services from BrainAV.
- **Portfolio**: Updated "DJ Brain" repository link to the new BrainAV organization location.
- **Roadmap**: Added tasks for "Venue Card Accessibility" and "Centralize Form Logic" following a QA consistency check.
- **Web Developer**: Created `brainav-project.php` case study to serve as the parent page for the BrainAV organization.
- **Web Developer**: Refactored project showcase cards in `web-developer/index.php` to use accessible `<a>` tags and added BrainAV.

## [1.5.0] - 2025-12-20

### Added
- **Portfolio**: Added "DJ Brain" project to `README.md` and `web-developer/index.php`.
- **Web Developer**: Created a dedicated case study page (`web-developer/dj-brain-project.php`) for the "DJ Brain" project.
- **Documentation**: Added "AI Collaboration" section to `CONTRIBUTING.md` to formalize the Human-AI workflow.
- **UI**: Added "Developed with Gemini" badge to the site footer and `README.md`.
- **Portfolio**: Documented the use of Google's "Antigravity" app for the DJ Brain project in `README.md` and the case study.
- **Documentation**: Added VS Code as the official IDE to `CONTRIBUTING.md`.
- **Documentation**: Created `prompt.md` with starter prompts to streamline AI collaboration sessions.

### Changed
- **Architecture**: Refactored all pages (root, services, about, contact, resume, case studies) to use the centralized `head.php` include, removing hardcoded headers.
- **Architecture**: Renamed `footer.html` to `footer.php` and updated all include references to follow best practices.
- **Architecture**: Implemented `src/bootstrap.php` as the single entry point for all pages, standardizing application initialization.
- **Refactoring**: Updated all pages to use constants from `config.php` (via bootstrap) for page titles, descriptions, and Schema.org data, ensuring site-wide consistency.
- **UI/UX**: Refactored headers on service pages (`wedding-dj`, `music-production`, `web-developer`) for improved readability and visual hierarchy.
- **Documentation**: Updated `ROADMAP.md` to include DJ Brain milestones and reflect completed refactoring tasks.
- **Web Developer**: Updated the "Tech Stack" and FAQ on the web developer page to mention Gemini and Gemma.

### Fixed
- **CSS**: Corrected a layout issue where the `.cta-button` would overlap text above it by adding `display: inline-block` and `margin-top` in `styles.css`.

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

[Unreleased]: https://github.com/jasonbra1n/jasonbra1n/compare/v1.7.1...HEAD
[1.7.1]: docs/releases/v1.7.1.md
[1.6.0]: docs/releases/v1.6.0.md
[1.5.1]: docs/releases/v1.5.1.md
[1.5.0]: docs/releases/v1.5.0.md
[1.4.3]: docs/releases/v1.4.3.md
[1.4.2]: docs/releases/v1.4.2.md
[1.4.1]: docs/releases/v1.4.1.md
[1.4.0]: docs/releases/v1.4.0.md
[1.3.0]: docs/releases/v1.3.0.md
[1.2.0]: docs/releases/v1.2.0.md
[1.1.0]: docs/releases/v1.1.0.md
[1.0.0]: https://github.com/jasonbra1n/jasonbra1n/releases/tag/v1.0.0