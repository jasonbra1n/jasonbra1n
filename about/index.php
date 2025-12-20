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

  <div class="container">
    <section class="about" id="about">
      <h2>Where Creativity Meets Technical Precision</h2>
      <div class="about-content-wrapper">
        <div class="about-image-container">
          <img src="../images/jason-profile_tn.webp" alt="Jason Brain - Creative Professional" 
               class="about-image" loading="lazy">
        </div>
        <div class="about-text-content">
          <p class="intro-text">
            <strong>I am a Creative Professional who speaks the language of machines.</strong>
          </p>
          <p>
            My journey isn't a pivot away from technology, but a fusion of it. With a formal education in <strong>Computer Programming and Systems Analysis</strong> (Fleming College), I possess a deep understanding of the hardware and software that powers modern creativity.
          </p>
          <p>
            I don't just use creative tools; I build, modify, and optimize them. Whether it's scripting custom automations for a light show, coding a bespoke website, or 3D printing custom parts for a production rig, my technical background empowers my artistic vision.
          </p>
          <p>
            Today, I offer a unique blend of services where "Systems Analyst" discipline meets "DJ" intuition. I am looking for employment that values this versatile, problem-solving mindset—bringing technical rigor to creative projects.
          </p>
          <div class="why-choose-box">
            <h4>The "Jason Brain" Advantage:</h4>
            <ul class="why-choose-list">
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                <strong>Formal Education:</strong> Fleming College Alumni & Microsoft Certified
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                <strong>Technical Creative:</strong> An artist with the discipline of a programmer
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                <strong>Project Management:</strong> Trained to deliver projects on time and within scope
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                <strong>Mature Perspective:</strong> Decades of real-world professional work experience
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                <strong>Hardware & Systems Integration:</strong> Deep understanding of the physical systems that power software
              </li>
            </ul>
          </div>
          <div style="margin-top: 2rem; text-align: center;">
            <a href="/resume/" class="cta-button">View Professional Resume</a>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include '../footer.php'; ?>
  <script src="../script.js"></script>
</body>
</html>