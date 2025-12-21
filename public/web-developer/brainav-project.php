<?php
// Load application bootstrap
if (file_exists(__DIR__ . '/../src/bootstrap.php')) {
    require_once __DIR__ . '/../src/bootstrap.php';
}

$page_title = 'BrainAV | Creative Technology Lab | ' . SITE_NAME;
$page_description = 'Case study of BrainAV - A creative technology lab and GitHub organization focused on AI-driven audio/visual innovation.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../head.php'; ?>
  <style>
    .tech-stack-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; margin: 2rem 0; }
    .tech-item { background: var(--color-neutral-light-gray); padding: 1rem; border-radius: 10px; text-align: center; border: 1px solid #ddd; }
    .architecture-box { background: #f0f8ff; padding: 2rem; border-radius: 15px; border-left: 5px solid var(--color-accent-cyan); margin: 2rem 0; }
    .feature-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-top: 1rem; }
    .feature-card { background: white; padding: 1.5rem; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border-top: 4px solid var(--color-accent-purple); }
    .project-link-card { display: block; background: var(--color-neutral-white); border: 2px solid #eee; border-radius: 10px; padding: 1.5rem; text-decoration: none; color: inherit; transition: transform 0.2s, border-color 0.2s; }
    .project-link-card:hover { transform: translateY(-3px); border-color: var(--color-accent-purple); }
    .project-link-card h4 { color: var(--color-primary-bg); margin-bottom: 0.5rem; }
  </style>
</head>
<body>
  <?php include '../nav.html'; ?>

  <header>
    <div class="header-background"></div>
    <div class="header-gradient"></div>
    <canvas class="lights"></canvas>
    <div class="header-content">
      <h1 id="header-title">BrainAV</h1>
      <p>Creative Technology & AI Innovation Lab</p>
      <div style="margin-top: 2rem;">
        <a href="https://github.com/BrainAV" target="_blank" class="cta-button">View Organization</a>
      </div>
    </div>
  </header>

  <div class="container">
    <section class="about">
      <h2>The Lab</h2>
      <p class="intro-text">
        <strong>BrainAV</strong> is the dedicated research and development arm of my creative practice. It serves as the home for open-source tools, AI experiments, and audio-visual innovations.
      </p>
      <p>
        While <strong>JasonBrain.com</strong> represents my professional services and portfolio, <strong>BrainAV</strong> represents the products and technology I build. It is a GitHub Organization focused on bridging the gap between entertainment and artificial intelligence.
      </p>
    </section>

    <section>
      <h2>Flagship Projects</h2>
      <div class="feature-grid">
        <a href="dj-brain-project.php" class="project-link-card">
          <h4>🧠 The DJ Brain</h4>
          <p>A self-hosted, AI-powered jukebox system that manages music queues intelligently for parties and venues.</p>
          <span style="color: var(--color-accent-coral); font-size: 0.9rem; font-weight: bold;">View Case Study &rarr;</span>
        </a>
        <a href="ai-coproducer-project.php" class="project-link-card">
          <h4>🎹 AI Co-Producer</h4>
          <p>An AI assistant for Ableton Live that acts as an "Executive Producer," composing and arranging via natural language.</p>
          <span style="color: var(--color-accent-coral); font-size: 0.9rem; font-weight: bold;">View Case Study &rarr;</span>
        </a>
      </div>
    </section>

    <section>
      <h2>Mission & Focus</h2>
      <div class="architecture-box">
        <h3>Innovation Pillars</h3>
        <ul>
          <li><strong>Open Source:</strong> Building tools that empower the creative community.</li>
          <li><strong>AI Integration:</strong> Leveraging LLMs (Gemini, Claude, Llama) to enhance creative workflows.</li>
          <li><strong>Hardware/Software Fusion:</strong> Integrating code with physical world interfaces (Raspberry Pi, DMX, MIDI).</li>
        </ul>
      </div>
    </section>

    <section>
      <h2>Tech Stack</h2>
      <div class="tech-stack-grid">
        <div class="tech-item"><strong>Python</strong><br>Core Logic & AI</div>
        <div class="tech-item"><strong>Docker</strong><br>Containerization</div>
        <div class="tech-item"><strong>PHP</strong><br>Web Interfaces</div>
        <div class="tech-item"><strong>Gemini API</strong><br>Intelligence</div>
        <div class="tech-item"><strong>AbletonOSC</strong><br>DAW Control</div>
      </div>
    </section>

    <hr>

    <section class="contact">
      <h2>Collaborate with BrainAV</h2>
      <p>Interested in contributing to open-source creative technology?</p>
      <a href="https://github.com/BrainAV" target="_blank" class="cta-button">Join us on GitHub</a>
    </section>
  </div>

  <?php include '../footer.php'; ?>
  <script src="../script.js"></script>
</body>
</html>