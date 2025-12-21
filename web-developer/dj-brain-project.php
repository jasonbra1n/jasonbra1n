<?php
// Load application bootstrap
if (file_exists(__DIR__ . '/../src/bootstrap.php')) {
    require_once __DIR__ . '/../src/bootstrap.php';
}

$page_title = 'DJ Brain | Project Case Study | ' . SITE_NAME;
$page_description = 'Case study of DJ Brain - An open-source, self-hosted, AI-powered jukebox system built with Docker, PHP, Python, and Mopidy.';
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
    .code-block { background: #2d2d2d; color: #ccc; padding: 1.5rem; border-radius: 10px; overflow-x: auto; font-family: monospace; margin: 1rem 0; font-size: 0.9rem; }
    .roadmap-list { list-style: none; padding: 0; }
    .roadmap-item { margin-bottom: 1rem; padding-left: 2rem; position: relative; }
    .roadmap-item::before { content: '→'; position: absolute; left: 0; color: var(--color-accent-purple); font-weight: bold; }
    .roadmap-item.done::before { content: '✓'; color: green; }
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
      <h1 id="header-title">DJ Brain</h1>
      <p>Open-Source AI-Powered Jukebox System</p>
      <div style="margin-top: 2rem;">
        <a href="https://github.com/BrainAV/The-DJ-Brain" target="_blank" class="cta-button">View Repository</a>
      </div>
    </div>
  </header>

  <div class="container">
    <section class="about">
      <h2>Project Goal</h2>
      <p class="intro-text">
        <strong>DJ Brain</strong> is an open-source, self-hosted, AI-managed digital jukebox system.
      </p>
      <p>
        Acting as an AI DJ Co-Pilot, it empowers DIY enthusiasts and venue operators to run their own jukebox using a private music library. The system manages a request queue and incorporates a contextual <strong>AI DJ</strong> to ensure the music never stops, intelligently filling gaps based on the current vibe.
      </p>
    </section>

    <section>
      <div class="architecture-box" style="background: #e6f4ff; border-left-color: var(--color-accent-purple);">
        <h3>Development Environment</h3>
        <p>This project is being developed exclusively using Google's "Antigravity" coding application in a Human-AI collaborative workflow with Gemini Code Assist, showcasing modern development practices.</p>
      </div>
    </section>

    <section>
      <h2>Key Features</h2>
      <div class="feature-grid">
        <div class="feature-card">
          <h4>🏠 Self-Hosted</h4>
          <p>Run it on your own hardware (Raspberry Pi 4B, mini-PC, NAS) with Docker.</p>
        </div>
        <div class="feature-card">
          <h4>📂 BYOM (Bring Your Own Music)</h4>
          <p>Works with your local music library, giving you full control over your media.</p>
        </div>
        <div class="feature-card">
          <h4>🤖 Intelligent Queue</h4>
          <p>An AI core intelligently selects music to fill gaps, keeping the vibe going based on BPM and mood.</p>
        </div>
        <div class="feature-card">
          <h4>🔊 Multi-Room Audio</h4>
          <p>Send music to different network audio players (e.g., Raspberry Pi running Squeezelite).</p>
        </div>
      </div>
    </section>

    <section>
      <h2>Architecture & Tech Stack</h2>
      <div class="architecture-box">
        <h3>Dockerized Microservices</h3>
        <p>The system is built as a set of containerized services orchestrated via Docker Compose:</p>
        <ul>
          <li><strong>Music Server:</strong> Mopidy (Centralized playback & JSON-RPC API)</li>
          <li><strong>Database:</strong> MariaDB (Persistent storage for requests and history)</li>
          <li><strong>Backend:</strong> PHP / Slim Framework (API handling)</li>
          <li><strong>Frontend:</strong> Vanilla JavaScript/HTML/CSS (Touch-friendly interface)</li>
          <li><strong>AI Engine:</strong> Python (The "Brain" for queue monitoring)</li>
        </ul>
      </div>

      <h3>Docker Compose Blueprint</h3>
      <div class="code-block">
<pre>version: "3.7"
services:
  mopidy:
    image: rawdlite/mopidy
    ports: ["6680:6680", "6600:6600"]
    volumes:
      - ${MUSIC_PATH}:/data/music:ro
  mariadb:
    image: mariadb:latest
    environment:
      - MYSQL_ROOT_PASSWORD=${DB_ROOT_PASSWORD}
      - MYSQL_DATABASE=${DB_DATABASE}
  php_backend:
    image: php:8.2-apache
    depends_on: [mopidy, mariadb]</pre>
      </div>
    </section>

    <section>
      <h2>Project Roadmap</h2>
      <div class="milestone-item">
        <h3>Phase 0: Documentation & Scaffolding (Completed)</h3>
        <ul class="roadmap-list">
          <li class="roadmap-item done">Project Definition & Architecture Overview</li>
          <li class="roadmap-item done">User Manual & Configuration Scaffolding</li>
          <li class="roadmap-item done">Docker Blueprint Refinement</li>
        </ul>
      </div>
      
      <div class="milestone-item">
        <h3>Phase 1: Foundation (In Progress)</h3>
        <ul class="roadmap-list">
          <li class="roadmap-item">Mopidy Setup & Database Schema Definition</li>
          <li class="roadmap-item">PHP Jukebox Backend (MVP API)</li>
          <li class="roadmap-item">Basic Frontend (Search & Request UI)</li>
        </ul>
      </div>
    </section>

    <hr>

    <section class="contact">
      <h2>Interested in AI Audio Systems?</h2>
      <p>I build custom solutions at the intersection of music and technology.</p>
      <a href="index.php#contact" class="cta-button">Get in Touch</a>
    </section>
  </div>

  <?php include '../footer.php'; ?>
  <script src="../script.js"></script>
</body>
</html>