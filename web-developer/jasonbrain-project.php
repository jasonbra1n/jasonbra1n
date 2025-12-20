<?php
// --- CONFIGURATION ---
if (file_exists(__DIR__ . '/../config.php')) {
    require_once __DIR__ . '/../config.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>jasonbrain.com | Project Case Study | Jason Brain</title>
  <meta name="description" content="Case study of jasonbrain.com - A custom-built, performance-optimized PHP application showcasing full-stack development skills.">
  <meta name="author" content="Jason Brain">
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-2RTGH4Z617"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-2RTGH4Z617');
  </script>
  <link rel="stylesheet" href="../styles.css">
  <style>
    .tech-stack-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; margin: 2rem 0; }
    .tech-item { background: var(--color-neutral-light-gray); padding: 1rem; border-radius: 10px; text-align: center; border: 1px solid #ddd; }
    .architecture-box { background: #f0f8ff; padding: 2rem; border-radius: 15px; border-left: 5px solid var(--color-accent-cyan); margin: 2rem 0; }
    .feature-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-top: 1rem; }
    .feature-card { background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border-top: 4px solid var(--color-accent-purple); }
    .update-box { background: #fff5f3; padding: 2rem; border-radius: 15px; border-left: 5px solid var(--color-accent-coral); margin: 1rem 0 2rem 0; }
    .milestone-item { margin-bottom: 2rem; }
    .milestone-item h3 { color: var(--color-primary-bg); margin-bottom: 1rem; font-size: 1.5rem; }
    .milestone-item ul { list-style-position: inside; padding-left: 1rem; margin-top: 1rem; }
    .milestone-item li { margin-bottom: 0.5rem; }
  </style>
</head>
<body>
  <?php include '../nav.html'; ?>

  <header>
    <div class="header-background"></div>
    <div class="header-gradient"></div>
    <canvas class="lights"></canvas>
    <div class="header-content">
      <h1 id="header-title">jasonbrain.com</h1>
      <p>Full-Stack PHP Monorepo & Portfolio</p>
      <div style="margin-top: 2rem;">
        <a href="https://github.com/jasonbra1n/jasonbra1n" target="_blank" class="cta-button">View Source on GitHub</a>
      </div>
    </div>
  </header>

  <div class="container">
    <section class="about">
      <h2>Project Overview</h2>
      <p class="intro-text">
        <strong>jasonbrain.com</strong> is more than just a portfolio; it is a custom-built, performance-optimized PHP application designed to demonstrate full-stack development capabilities without relying on heavy frameworks or CMS bloat.
      </p>
      <p>
        The project serves as a central hub for my multi-disciplinary work, integrating music production, event services, and web development into a cohesive digital experience. It prioritizes speed, security, and maintainability.
      </p>
    </section>

    <section>
      <h2>Latest Update: v1.4.1 - Security Hardening</h2>
      <div class="update-box">
        <p>This milestone focused on removing third-party dependencies and enhancing site security by converting all contact forms to a self-hosted PHP solution.</p>
        <ul>
          <li>Implemented a secure, self-hosted PHP mailer script across all service pages.</li>
          <li>Decoupled credentials using a `config.php` file, which is excluded from version control.</li>
          <li>Added honeypot fields for spam protection and standardized input sanitization.</li>
        </ul>
      </div>
    </section>

    <section>
      <h2>Project Milestones</h2>
      <div class="milestone-item">
        <h3>v1.4.0: Professional Rebranding</h3>
        <div class="update-box" style="border-color: var(--color-accent-purple); background: #f8f4ff;">
            <p>Shifted the site's narrative to "Creative Technologist" by adding a professional resume and rewriting key content to bridge creative and technical expertise.</p>
        </div>
      </div>
      <div class="milestone-item">
        <h3>v1.3.0: Performance & Accessibility</h3>
        <div class="update-box" style="border-color: var(--color-accent-cyan); background: #f0f8ff;">
            <p>Implemented the "click-to-load" iframe facade pattern to improve Core Web Vitals and refactored interactive elements for better keyboard accessibility.</p>
        </div>
      </div>
      <div class="milestone-item">
        <h3>v1.2.0: PHP Architecture Migration</h3>
        <div class="update-box" style="border-color: var(--color-accent-purple); background: #f8f4ff;">
            <p>Converted the entire site from static HTML with JavaScript loaders to a dynamic PHP application using server-side includes for components like navigation and footers.</p>
        </div>
      </div>
    </section>

    <section>
      <h2>Architecture & Engineering</h2>
      <div class="architecture-box">
        <h3>Component-Based PHP Architecture</h3>
        <p>To ensure maintainability and scalability, the site utilizes a modular structure:</p>
        <ul>
          <li><strong>Server-Side Includes:</strong> Core components like navigation and footers are managed centrally and injected via PHP, ensuring consistency across all pages.</li>
          <li><strong>Centralized Assets:</strong> CSS and JavaScript are consolidated in the root to reduce HTTP requests and simplify caching strategies.</li>
          <li><strong>Configuration Management:</strong> Sensitive data is decoupled using a `config.php` file, adhering to security best practices.</li>
        </ul>
      </div>
      
      <h3>Key Technical Features</h3>
      <div class="feature-grid">
        <div class="feature-card">
          <h4>🔒 Security First</h4>
          <p>Self-hosted contact forms with honeypot protection and strict input sanitization. No third-party form dependencies.</p>
        </div>
        <div class="feature-card">
          <h4>⚡ Performance</h4>
          <p>Implements the "Facade Pattern" for lazy-loading heavy media iframes (Spotify, HearThis.at), significantly boosting Core Web Vitals.</p>
        </div>
        <div class="feature-card">
          <h4>🎨 Modern UI/UX</h4>
          <p>Responsive design using CSS variables for theming, BEM-like naming conventions, and custom canvas animations.</p>
        </div>
        <div class="feature-card">
          <h4>🔍 SEO Optimized</h4>
          <p>Semantic HTML5, structured data (JSON-LD) for rich results, and a dynamic sitemap.</p>
        </div>
      </div>
    </section>

    <section>
      <h2>Tech Stack</h2>
      <div class="tech-stack-grid">
        <div class="tech-item"><strong>PHP 8.4</strong><br>Backend Logic</div>
        <div class="tech-item"><strong>HTML5</strong><br>Semantic Structure</div>
        <div class="tech-item"><strong>CSS3</strong><br>Custom Styling</div>
        <div class="tech-item"><strong>JavaScript</strong><br>ES6+ Interactivity</div>
        <div class="tech-item"><strong>Git</strong><br>Version Control</div>
      </div>
    </section>

    <hr>

    <section class="contact">
      <h2>Interested in Custom Web Solutions?</h2>
      <p>I build tailored web applications using these same principles of performance and security.</p>
      <a href="index.php#contact" class="cta-button">Get a Quote</a>
    </section>
  </div>

  <?php include '../footer.html'; ?>
  <script src="../script.js"></script>
</body>
</html>