<?php
// Load application bootstrap
if (file_exists(__DIR__ . '/../src/bootstrap.php')) {
    require_once __DIR__ . '/../src/bootstrap.php';
}

$page_title = 'AI Co-Producer | Project Case Study | ' . SITE_NAME;
$page_description = 'Case study of BRAIN AV: AI Co-Producer, an open-source AI assistant for Ableton Live that uses natural language to compose music.';
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
    .roadmap-list { list-style: none; padding: 0; }
    .roadmap-item { margin-bottom: 1rem; padding-left: 2rem; position: relative; }
    .roadmap-item::before { content: '→'; position: absolute; left: 0; color: var(--color-accent-purple); font-weight: bold; }
    .milestone-item { margin-bottom: 2rem; }
    .milestone-item h3 { color: var(--color-primary-bg); margin-bottom: 0.5rem; font-size: 1.3rem; }
  </style>
</head>
<body>
  <?php include '../nav.html'; ?>

  <header>
    <div class="header-background"></div>
    <div class="header-gradient"></div>
    <canvas class="lights"></canvas>
    <div class="header-content">
      <h1 id="header-title">BRAIN AV: AI Co-Producer</h1>
      <p>An Open-Source AI Assistant for Ableton Live</p>
      <div style="margin-top: 2rem;">
        <a href="https://github.com/BrainAV/ai-coproducer" target="_blank" class="cta-button">View Repository on GitHub</a>
      </div>
    </div>
  </header>

  <div class="container">
    <section class="about">
      <h2>The Vision: From Commander to Conductor</h2>
      <p class="intro-text">
        <strong>BRAIN AV: AI Co-Producer</strong> is an open-source, multi-platform AI assistant designed to act as your "Executive Producer" within Ableton Live.
      </p>
      <p>
        It bridges the gap between Large Language Models (LLMs) and your Digital Audio Workstation (DAW), allowing you to conduct a song from initial spark to final arrangement using natural language. Unlike traditional MIDI generators that just "make a loop," this tool understands your project's state and assists with high-level creative direction.
      </p>
    </section>

    <section>
      <h2>Key Features</h2>
      <div class="feature-grid">
        <div class="feature-card">
          <h4>🎼 Generative Composition</h4>
          <p>Create MIDI melodies, chord progressions, and drum patterns from simple text prompts.</p>
        </div>
        <div class="feature-card">
          <h4>🎹 Sound Design Recipes</h4>
          <p>Ask the AI to guide you through synth parameters to create specific sounds with Ableton's native devices.</p>
        </div>
        <div class="feature-card">
          <h4>🗺️ Arrangement Orchestration</h4>
          <p>Map out entire song structures (Intro, Verse, Drop, Outro) and let the AI build the arrangement scaffolding.</p>
        </div>
        <div class="feature-card">
          <h4>🌐 Cross-Platform</h4>
          <p>The core Python bridge runs on Windows, Linux, and macOS, with controller apps planned for Android and hardware.</p>
        </div>
      </div>
    </section>

    <section>
      <h2>Technical Architecture</h2>
      <div class="architecture-box">
        <h3>Open & Accessible by Design</h3>
        <p>The architecture is designed to be open and avoid proprietary lock-ins like Max for Live.</p>
        <ul>
          <li><strong>Interface:</strong> A Python-based OSC (Open Sound Control) bridge acts as the central nervous system.</li>
          <li><strong>Connectivity:</strong> Utilizes the open-source <a href="https://github.com/ideoforms/AbletonOSC" target="_blank">AbletonOSC</a> project to communicate directly with Ableton Live.</li>
          <li><strong>The "Brain":</strong> Supports both Cloud-based LLMs (like Gemini and Claude) and local inference via Ollama for offline use.</li>
        </ul>
      </div>
    </section>

    <section>
      <h2>Project Roadmap</h2>
      <div class="milestone-item">
        <h3>Phase 1: Core Bridge & MIDI Generation</h3>
        <ul class="roadmap-list">
          <li class="roadmap-item">Develop the core Python/OSC bridge.</li>
          <li class="roadmap-item">Implement basic text-to-MIDI generation for melodies and chords.</li>
        </ul>
      </div>
      
      <div class="milestone-item">
        <h3>Phase 2: Controller Apps & Voice Control</h3>
        <ul class="roadmap-list">
          <li class="roadmap-item">Create an Android app to act as a "Voice-to-Command" controller.</li>
          <li class="roadmap-item">Develop hardware images for Raspberry Pi 5 & Jetson Nano for dedicated "brain" units.</li>
        </ul>
      </div>
    </section>

    <hr>

    <section class="contact">
      <h2>Interested in AI-Powered Music Tools?</h2>
      <p>Follow the BrainAV organization on GitHub to track the development of this and other creative AI projects.</p>
      <a href="https://github.com/BrainAV" target="_blank" class="cta-button">Follow BrainAV on GitHub</a>
    </section>
  </div>

  <?php include '../footer.php'; ?>
  <script src="../script.js"></script>
</body>
</html>