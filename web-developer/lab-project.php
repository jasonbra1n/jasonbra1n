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
  <title>LAB: Digital Workshop | Project Case Study | Jason Brain</title>
  <meta name="description" content="Case study of LAB: Digital Workshop - An open-source single-page application (SPA) built with Vanilla JavaScript, HTML5, and CSS3 by Jason Brain.">
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
    .pillar-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-top: 1rem; }
    .pillar-card { background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border-top: 4px solid var(--color-accent-purple); }
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
      <h1 id="header-title">LAB: Digital Workshop</h1>
      <p>An Open-Source Creative Sandbox & SPA</p>
      <div style="margin-top: 2rem;">
        <a href="https://lab.jasonbrain.com" target="_blank" class="cta-button">Launch Live App</a>
        <a href="https://github.com/jasonbra1n/lab.jasonbrain.com" target="_blank" class="cta-button" style="background: transparent; border: 2px solid var(--color-neutral-white); margin-left: 1rem;">View Source</a>
      </div>
    </div>
  </header>

  <div class="container">
    <section class="about">
      <h2>Project Overview</h2>
      <p class="intro-text">
        <strong>LAB: Digital Workshop</strong> is a creative sandbox featuring a growing collection of interactive tools designed to help users work, learn, rest, and play—all in one place.
      </p>
      <p>
        Built entirely with <strong>HTML5, CSS3, and Vanilla JavaScript</strong>, this Single-Page Application (SPA) demonstrates how to build complex, modular web applications without heavy frontend frameworks like React or Vue. It features a custom "glassmorphism" UI, dark/light mode accessibility, and a dynamic loading system.
      </p>
    </section>

    <section>
      <h2>Latest Update: v1.0.2 - "Frosted Glass"</h2>
      <div class="update-box">
        <p>A significant visual refresh was rolled out, implementing a sleek "glassmorphism" effect across the application for a more modern look and feel.</p>
        <p>This update enhances the user interface by adding depth and texture, consistent with contemporary design trends.</p>
      </div>
    </section>

    <section>
      <h2>Project Milestones</h2>
      <div class="milestone-item">
        <h3>Version 1.0.1: Theme Syncing & Creative Tools</h3>
        <div class="update-box" style="border-color: var(--color-accent-purple); background: #f8f4ff;">
            <p>This release focused on improving the user and developer experience by introducing automatic theme syncing for standalone tools and expanding the "Rest" pillar.</p>
            <ul>
                <li><strong>Theme Syncing:</strong> Standalone tools loaded in iframes now automatically sync with the main app's light/dark theme.</li>
                <li><strong>New "Cymascope" Tool:</strong> A sound visualizer that generates beautiful cymatic patterns was added.</li>
                <li><strong>Documentation Cleanup:</strong> Core developer docs were updated for clarity and discoverability.</li>
            </ul>
        </div>
      </div>

      <div class="milestone-item">
        <h3>Version 1.0.0: Initial Public Release</h3>
        <div class="update-box" style="border-color: var(--color-accent-cyan); background: #f0f8ff;">
            <p>The first stable version established the core architecture and feature set of the application.</p>
            <ul>
                <li><strong>Core Architecture:</strong> Built as a vanilla JS SPA with a hybrid tool-loading system (direct injection & iframe).</li>
                <li><strong>Massive Decoupling:</strong> Refactored numerous complex tools into their own repositories for modularity.</li>
                <li><strong>UI/UX Redesign:</strong> Implemented a mobile-first responsive design and CSS-only loading spinner.</li>
            </ul>
        </div>
      </div>
    </section>

    <section>
      <h2>Architecture & Engineering</h2>
      <div class="architecture-box">
        <h3>Hybrid Dual-Loading System</h3>
        <p>To balance performance with extensibility, the application uses a unique dual-loading strategy:</p>
        <ul>
          <li><strong>Local Tools (Direct Injection):</strong> Lightweight tools (like calculators) are fetched and injected directly into the DOM for instant interactivity.</li>
          <li><strong>Standalone Tools (Iframe Embedding):</strong> Complex tools are sandboxed within iframes, preventing CSS/JS conflicts and allowing for independent deployment.</li>
        </ul>
      </div>
      
      <h3>The 5 Pillars</h3>
      <div class="pillar-grid">
        <div class="pillar-card">
          <h4>🔧 Factory (Work)</h4>
          <p>Productivity utilities like Image to WebP Converters and Subwoofer Design calculators.</p>
        </div>
        <div class="pillar-card">
          <h4>📚 Classroom (Learn)</h4>
          <p>Educational tools including Astronomy data, Life Path calculators, and Gematria.</p>
        </div>
        <div class="pillar-card">
          <h4>🌿 Retreat (Rest)</h4>
          <p>Mindfulness tools such as Binaural Beats generators and Cymatic visualizations.</p>
        </div>
        <div class="pillar-card">
          <h4>🎮 Arcade (Play)</h4>
          <p>Interactive experiences like the Radio Stream Player and Retro CD Player emulator.</p>
        </div>
        <div class="pillar-card">
          <h4>🧠 Info</h4>
          <p>Project documentation, architecture details, and external resources.</p>
        </div>
      </div>
    </section>

    <section>
      <h2>Tech Stack</h2>
      <div class="tech-stack-grid">
        <div class="tech-item"><strong>HTML5</strong><br>Semantic Structure</div>
        <div class="tech-item"><strong>CSS3</strong><br>Variables & Glassmorphism</div>
        <div class="tech-item"><strong>JavaScript</strong><br>ES6+ (No Frameworks)</div>
        <div class="tech-item"><strong>SPA Routing</strong><br>Hash-based Navigation</div>
        <div class="tech-item"><strong>GitHub Pages</strong><br>CI/CD & Hosting</div>
      </div>
    </section>

    <hr>

    <section class="contact">
      <h2>Interested in Custom Web Solutions?</h2>
      <p>I build tailored web applications using the same principles of performance and modularity.</p>
      <a href="index.php#contact" class="cta-button">Get a Quote</a>
    </section>
  </div>

  <?php include '../footer.html'; ?>
  <script src="../script.js"></script>
</body>
</html>