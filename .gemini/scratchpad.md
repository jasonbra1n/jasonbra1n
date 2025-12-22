# Scratchpad

This file is for temporary notes, plans, and brainstorming. It is not part of the final project build or documentation.

---

# 🖼️ Image Optimization Plan

## Objective
Improve Core Web Vitals (LCP) and reduce bandwidth usage by serving responsive images. We will implement `srcset` and `sizes` attributes so browsers can download the most appropriate image size for their viewport.

## 1. Audit & Strategy

### Current State
*   Most images are currently served as single `.webp` files (e.g., `_tn.webp`).
*   **Key Areas**:
    *   **Homepage**: Service cards, About teaser, Gallery.
    *   **Service Pages**: Hero images, gallery grids.

### Proposed Breakpoints
We will target three standard sizes to cover mobile, tablet, and desktop:
1.  **Small (Mobile)**: `480w` (e.g., `image-480.webp`)
2.  **Medium (Tablet/Card)**: `800w` (e.g., `image-800.webp`)
3.  **Large (Desktop/Hero)**: `1200w` (e.g., `image-1200.webp`)

## 2. Implementation Steps

### 🟢 Phase 1: Homepage (Completed)
*   [x] **Asset Generation**: `jason-profile`, `service-cards`, `featured-work`.
*   [x] **Code Update**: `public/index.php` updated with `srcset`.

### 🟡 Phase 2: Service Pages (Next Up)
*   **User Task**: Generate responsive assets (Most appear complete in `manifest.json`).
*   **Gemini Task**: Update HTML/PHP with `srcset`, `sizes`, `width`, and `height`.

#### 1. About Page (`public/about/index.php`)
*   [x] **Assets**: `jason-profile.jpg` (Generated).
*   [ ] **Code**: Update main profile image to use responsive versions.

#### 2. Wedding DJ (`public/wedding-dj/index.php`)
*   [x] **Assets**: `event-setup-1`, `event-setup-2`, `event-setup-3` (Generated).
*   [ ] **Code**: Update gallery/hero images.

#### 3. Music Production (`public/music-production/index.php`)
*   [x] **Assets**: `king-oakes-production`, `video-dj` (Generated).
*   [ ] **Code**: Update content images.

#### 4. Web Developer (`public/web-developer/index.php`)
*   [x] **Assets**: `custom-websites`, `ecommerce`, `seo`, `ai-integration`, `project-main` (Generated).
*   [ ] **Code**: Update services grid and project cards.

#### 5. Corporate Events (`public/corporate-events/index.php`)
*   [x] **Assets**: `gala`, `conference`, `holiday-party`, `product-launch` (Generated).
*   [ ] **Code**: Update event type grid.

### 🔴 Phase 3: Explicit Dimensions (CLS Fix)
*   [ ] **Audit**: Review all pages for missing `width` and `height` attributes on `<img>` tags.
*   [ ] **Update**: Apply dimensions to match the aspect ratio of the images.

### 🔵 Phase 4: Defer Scripts (Performance)
*   [ ] **Update `head.php`**:
    *   Defer Google Ads (`adsbygoogle.js`).
    *   Defer Google Tag Manager (`gtag.js`).
    *   Ensure analytics still fire correctly after deferral.

### Step 3: CSS Adjustments
*   [ ] Ensure `img { max-width: 100%; height: auto; }` is globally applied (already in `styles.css` via reset, but verify).
*   [x] Ensure `img { max-width: 100%; height: auto; }` is globally applied (already in `styles.css` via reset, but verify).
*   [ ] **Blogger Template**: Add responsive image defaults to `blogger-template.xml` to prevent overflow.
    ```css
    /* Responsive Image Defaults */
    img {
      max-width: 100%;
      height: auto;
      display: block;
    }
    ```

## 3. Verification
*   Use Chrome DevTools "Network" tab to verify the correct image loads on different viewport sizes.
*   **CLS Check**: Use the "Performance" tab to ensure no layout shifts occur when images load.
*   Run Lighthouse performance audit before and after.

---

*Status: Planning Phase*