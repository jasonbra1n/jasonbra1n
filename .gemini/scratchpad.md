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

## 4. Database Infrastructure (Planning)
**Server Details (cPanel/phpMyAdmin)**:
- **Server type**: MariaDB
- **Server version**: 10.11.15-MariaDB-cll-lve-log
- **Protocol version**: 10
- **Server charset**: cp1252 West European (latin1)

*Note: When implementing the PHP connection, we must explicitly set the charset to `utf8mb4` to ensure proper handling of special characters and emojis, overriding the server's `latin1` default.*

### Action Items
*   [x] **Initialization**: Create `database/` directory and placeholder `database.sql`.
*   [x] **Schema Design**: Define tables for `users` (admin) and `settings` (API keys). *Note: BrainAV uses a separate database.*
*   [x] **Migration Strategy**: Manual upload via phpMyAdmin (Current). Future: PHP migration script.

## 5. Gemini API Integration (Planning)
**Goal**: Enable server-side AI features using the Gemini API to enhance both the admin experience and public user engagement.

### Phase 1: Foundational Setup (Completed)
- [x] Add `GEMINI_API_KEY` to `public/config.php`.
- [x] Move API key to the `settings` table in the database, manageable via `admin/settings.php`.
- [x] Create a service class (`src/GeminiService.php` or similar) to handle API requests.

### Phase 2: Admin Panel Features (CMS Enhancement)
These features would live inside the `/admin` area to help with content creation and management.

*   **Content Generation & SEO**:
    *   **Blog Post Assistant**: From a simple prompt in the admin panel, generate blog post titles, structured outlines, or even full drafts.
    *   **SEO Optimizer**: Automatically generate SEO-friendly meta descriptions and keywords for new pages or blog posts.
    *   **Image Alt-Text Generator**: When an image is uploaded to the CMS, use Gemini's multimodal capabilities to generate descriptive alt text for accessibility and SEO.
*   **Content Summarization**:
    *   Create concise summaries of long blog posts or project case studies. These summaries can be used as teasers on listing pages or for social media.

### Phase 3: Public-Facing Features (User Engagement)
These features would be available to visitors on the live site.

*   **Conversational AI Chatbot ("Ask Jason")**:
    *   **Concept**: A chatbot trained on the site's content (services, resume, blog posts, project details).
    *   **Function**: It could answer user questions like "What are your core competencies?" or "Tell me about the DJ Brain project."
    *   **Lead Capture**: If the bot cannot answer a question, it can offer to forward the user's query directly to the contact form.
*   **Interactive Resume/Portfolio**:
    *   On the resume or project pages, an "Ask me about this" feature could allow users to ask specific questions about a job or project, with Gemini providing answers based on the page's content.
*   **Creative "Co-Producer" Demo**:
    *   A small, interactive tool to demonstrate the "AI Co-Producer" concept from the roadmap.
    *   A user could input a mood (e.g., "dark, energetic, 80s synthwave") and get a suggested chord progression, drum pattern, or synth patch idea generated by Gemini.

### Phase 4: Long-Term Vision
*   **AI-Powered Site Builder**: This remains the ultimate goal, as detailed in Section 7. The features from Phase 2 would serve as building blocks for this larger vision.

## 6. Admin Dashboard & Authentication (Planning)
**Goal**: Create a secure backend to manage site settings and content using the established database connection.

### Architecture
*   **Auth**: `src/User.php` - Handle user authentication (login, password hashing).
*   **Session**: `src/Session.php` - Wrapper for secure session handling and flash messages.
*   **Settings**: `src/Settings.php` - CRUD operations for the `settings` table (Key-Value store).

### Implementation Steps
1.  **Login Logic**: Create `src/User.php` and `src/Session.php`.
2.  **Login UI**: Create `public/admin/login.php`.
3.  **Dashboard**: Create `public/admin/index.php` (Protected route).

### Current Status
*   **Troubleshooting**: Actively debugging 500 errors during initial admin user creation via `setup.php`. The focus is on verifying and stabilizing the database connection and form submission process.


## 6. Local Workspace Structure
**Directory**: `workspace/`
**Organization**: `BrainAV`
**Repositories**:
*   `.github`: Special organization repo, hosts the website and base setup (contains `AI-Dev_Guide.md`). *   `index.html`: Landing page with pivot notice and tech stack (Synced).

---

## 7. Vision: AI-Powered Site Builder (CMS Feature)

**Concept**: A section within the admin panel that allows the administrator to generate new site pages using AI prompts. This would be the core of a "self-administering" CMS.

### User Flow
1.  **Prompt Interface**: Admin navigates to "AI Site Builder" in the CMS. They are presented with a text area.
2.  **Prompt Example**: Admin types a prompt like, `"Create a new service page for 'Live Sound Engineering'. Include a section for services offered, a photo gallery, and a contact form."`
3.  **AI Generation**: The backend, using the Gemini API, generates the necessary PHP file, placeholder content, and suggests a page structure.
4.  **Staging Area**: The newly generated page (`live-sound-engineering/index.php`) is saved to a non-public `staging/` directory. It is not visible to the public.
5.  **Admin Review**: The admin is given a link to the staged page. They can review the layout and content.
6.  **Editing**: The admin can then edit the content directly (future feature) or download the file to tweak the code.
7.  **Publish**: Once satisfied, the admin clicks a "Publish" button, which moves the page from the `staging/` directory to its final location in the `public/` directory, making it live.

### Technical Considerations
- **Staging Directory**: A `public/staging/` directory that is protected from direct web access (e.g., via `.htaccess` or router rules).
- **File Generation**: The PHP backend will need permissions to create new files and directories.
- **Templating**: The AI would be prompted to use the existing `includes/header.php` and `includes/footer.php` for consistency.

---

*Status: Planning Phase*