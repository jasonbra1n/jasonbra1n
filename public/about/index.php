<?php
// Load application bootstrap
if (file_exists(__DIR__ . '/../src/bootstrap.php')) {
    require_once __DIR__ . '/../src/bootstrap.php';
}

// Define page-specific metadata
$page_title = 'About | ' . SITE_NAME . ' - Creative Professional & Technologist';
$page_description = 'Jason Brain is a Creative Professional with a deep technical background (Fleming College). Bridging the gap between art, music, and technology.';

// Define Schema.org JSON-LD
$schema_data = [
    "@context" => "https://schema.org",
    "@type" => "ProfilePage",
    "mainEntity" => [
        "@type" => "Person",
        "name" => SITE_NAME,
        "alternateName" => "ΙΑΣΩΝ",
        "url" => SITE_URL . "/",
        "jobTitle" => "Creative Professional",
        "description" => "Creative Professional and Technologist with a background in Systems Analysis and Multimedia Production.",
        "alumniOf" => [
            "@type" => "CollegeOrUniversity",
            "name" => "Fleming College"
        ]
    ]
];
$schema_json = json_encode($schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../head.php'; ?>
</head>
<body>
  <?php include '../nav.html'; ?>

  <header class="about-header">
    <div class="header-background"></div>
    <div class="header-gradient"></div>
    <canvas class="lights"></canvas>

    <div class="header-content-wrapper">
      <div class="about-image-column">
          <img src="../images/jason-profile-800.webp" 
               srcset="../images/jason-profile-480.webp 480w, ../images/jason-profile-800.webp 800w, ../images/jason-profile-1200.webp 1200w"
               sizes="(max-width: 768px) 100vw, 400px"
               alt="Jason Brain - Creative Technologist" 
               class="about-image" width="400"  loading="lazy">
          <div style="margin-top: 2rem; text-align: center;">
            <a href="/resume/" class="cta-button">View Professional Resume</a>
          </div>
      </div>
      
      <div class="about-text-column">
        <div class="why-choose-box" style="margin-top: 0; padding: 2rem;">
          <h1 style="font-size: 2.5rem; margin-bottom: 1rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">About Jason Brain</h1>
          <p class="intro-text">
            <strong>Location:</strong> Haliburton, Ontario (Open to Remote &amp; Hybrid)<br>
            <strong>Focus:</strong> Creative Technology, Web Development, AI Integration
          </p>
          <p>
            I am a Creative Technologist with a formal background in <strong>Systems Analysis</strong> (Fleming College) and over 30 years of experience in media production. I bridge the gap between technical requirements and creative vision.
          </p>
            <h4 style="margin-top: 1.5rem;">Core Competencies &amp; Expertise:</h4>
            <ul class="why-choose-list">
              <li class="why-choose-list-item" style="align-items: flex-start;">
                <span class="checkmark" style="margin-top: 0.2rem;">✓</span>
                <div>
                  <strong style="display: block; margin-bottom: 0.2rem;">Systems Analysis</strong>
                  Fleming College Alumni trained in software design, database management, and ITIL protocols.
                </div>
              </li>
              <li class="why-choose-list-item" style="align-items: flex-start;">
                <span class="checkmark" style="margin-top: 0.2rem;">✓</span>
                <div>
                  <strong style="display: block; margin-bottom: 0.2rem;">Web Development &amp; AI</strong>
                  Building custom, performance-focused applications using PHP, JS, and Python.
                </div>
              </li>
              <li class="why-choose-list-item" style="align-items: flex-start;">
                <span class="checkmark" style="margin-top: 0.2rem;">✓</span>
                <div>
                  <strong style="display: block; margin-bottom: 0.2rem;">Production Leadership</strong>
                  Decades of experience managing live events and complex audio-visual systems.
                </div>
              </li>
              <li class="why-choose-list-item" style="align-items: flex-start;">
                <span class="checkmark" style="margin-top: 0.2rem;">✓</span>
                <div>
                  <strong style="display: block; margin-bottom: 0.2rem;">Hardware Integration</strong>
                  Deep understanding of AV systems and physical computing
                </div>
              </li>
            </ul>
        </div>
      </div>
    </div>
  </header>

  <?php include '../footer.php'; ?>
  <script src="../script.js"></script>
</body>
</html>