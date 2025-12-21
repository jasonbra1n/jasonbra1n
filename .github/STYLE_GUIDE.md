# Website Style Guide

This document defines the visual identity for jasonbrain.com. All new components and pages should adhere to these guidelines to maintain brand consistency.

---

## Color Palette

### Primary Colors
- **Dark Purple (Primary Background)**: `rgb(41, 18, 89)` / `#291259`
  - Usage: Main background, footers, dark sections.
- **Bright Purple (Gradient/Accent)**: `rgb(129, 70, 255)` / `#8146ff`
  - Usage: Gradients, links, highlights, borders.

### Accent Colors
- **Coral Red (Primary CTA)**: `rgb(255, 111, 97)` / `#ff6f61`
  - Usage: Call-to-action buttons, important links, badges.
- **Cyan (Web/AI Section)**: `rgb(0, 255, 255)` / `#00ffff`
  - Usage: Highlights and accents within the "Web Development & AI" section.

### Neutral Colors
- **White**: `#ffffff`
  - Usage: Main container background, text on dark backgrounds.
- **Light Gray/Off-White**: `rgb(248, 244, 255)` / `#f8f4ff`
  - Usage: Info boxes, highlighted content areas (`.why-choose-box`).
- **Very Light Gray (Cards)**: `#f9f1f1`
  - Usage: Background for `.venue-card` elements.
- **Dark Gray (Text)**: `rgb(51, 51, 51)` / `#333`
  - Usage: Default body text color.
- **Medium Gray (Subtle Text)**: `rgb(102, 102, 102)` / `#666`
  - Usage: Paragraphs, descriptions, secondary text.

---

## Typography

- **Font Family**: `'Arial', sans-serif`

### Headings
- **H1 (`#header-title`)**: `3.5rem`, white, with text-shadow.
- **H2 (Section Titles)**: `2.5rem`, color `#291259`.
- **H3**: `1.8rem`, color `#291259` or `white` depending on background.
- **H4**: `1.3rem` - `1.4rem`, typically used for item titles or sub-headings.

### Body Text
- **Default Paragraph**: `1rem`, color `#333` or `#444`.
- **Intro Paragraphs**: `1.1rem` - `1.2rem`, often with a lighter weight or color (`#666`).

---

## Components

### Buttons
- **Primary CTA (`.cta-button`)**:
  - Background: `#ff6f61`
  - Text Color: `white`
  - Border-radius: `25px`
  - Padding: `1rem 2rem`
  - Text Decoration: `none`
  - Hover: Scale and shadow effect.
- **Form Submit (`.form-submit-button`)**:
  - Background: `linear-gradient(135deg, #8146ff, #ff6f61)`
  - Text Color: `white`
  - Border-radius: `10px`
  - Hover: Vertical lift and increased shadow.

### Cards
- **Venue/Service Cards (`.venue-card`)**:
  - Background: `var(--very-light-gray)` / `#f9f1f1`
  - Border-radius: `10px`
  - Image Border: `2px solid var(--color-primary-bg)`
  - Hover: Lifts up (`transform: translateY(-5px)`).
  - Note: Should be implemented as an `<a>` tag for accessibility.
- **Package Cards (`.package-card`)**:
  - Background: `var(--color-neutral-white)` with a `box-shadow`.
  - Border: `2px solid #f0f0f0`.
  - The `.popular` variant has a purple border (`var(--color-accent-purple)`) and is scaled up.
  - Note: These are interactive and should be implemented as clickable elements.
- **Testimonial Cards (`.testimonial-card`)**:
  - Background: `var(--color-neutral-white)` with a `box-shadow`.
  - Border: `2px solid #f0f0f0`.
  - Contains a `.testimonial-quote` and a `.testimonial-author`.
  - The `.vendor-testimonial` variant has a light gray background (`var(--color-neutral-light-gray)`).

### Info Boxes
- Characterized by a light background (`#f8f4ff`), rounded corners, and a left border (`4px solid #8146ff`). Used for `.why-choose-box`, `.mix-summary-box`, etc.
- **Timeline Box (`.timeline-box`)**:
  - Background: `var(--color-neutral-light-gray)`.
  - Border: `1px solid #ddd`.
  - Used within package cards to show the event timeline.
- **Payment Info Box (`.payment-info-box`)**:
  - Background: `var(--color-neutral-light-gray)`.
  - Border: `2px dashed var(--color-accent-purple)`.
  - Used to highlight payment terms.

### Code Blocks
- **Preformatted Text (`pre`)**:
  - Background: `#2d2d2d` (Dark Gray)
  - Text Color: `#f8f8f2` (Off White)
  - Font: Monospace
  - Border-radius: `5px`
- **Inline Code (`code`)**:
  - Text Color: `#e6db74` (Soft Yellow)

### Badges
Used in documentation (README.md) and the site footer to indicate technologies, status, or special links.
- **Style**: We use the `for-the-badge` style from shields.io for a consistent, flat, and readable look.
- **Colors**:
  - **Standard Tech/Status**: `8146ff` (Bright Purple). Matches the primary accent.
  - **Special/CTA**: `ff6f61` (Coral Red). Used for high-priority links like the "Project Hub".
- **Examples**:
  - Tech Stack: `https://img.shields.io/badge/PHP-8146FF?style=for-the-badge&logo=php&logoColor=white`
  - "Developed with Gemini": `https://img.shields.io/badge/Developed%20with-Gemini-8146FF?style=for-the-badge&logo=google-gemini&logoColor=white`