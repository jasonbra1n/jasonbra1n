<?php
// Load application bootstrap
if (file_exists(__DIR__ . '/../src/bootstrap.php')) {
    require_once __DIR__ . '/../src/bootstrap.php';
}

$page_title = 'Blogs & Insights | ' . SITE_NAME;
$page_description = 'Read Jason Brain\'s thoughts on Music Production, DJing, Web Development, and Technology across two dedicated blogs.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../head.php'; ?>
</head>
<body>
  <?php include '../nav.html'; ?>

  <header>
    <div class="header-background"></div>
    <div class="header-gradient"></div>
    <canvas class="lights"></canvas>
    <div class="header-content">
      <h1 id="header-title">Blogs & Insights</h1>
      <p>Exploring the Intersection of Music and Technology</p>
    </div>
  </header>

  <div class="container">
    <section class="about">
      <h2>Two Worlds, One Mind</h2>
      <p class="intro-text">
        I maintain two distinct blogs to cover the breadth of my interests and expertise. Whether you are here for the beats or the bytes, there is something for you.
      </p>
    </section>

    <section class="venues">
      <a href="<?php echo defined('BLOG_MUSIC') ? BLOG_MUSIC : 'https://blog.jasonbrain.com/'; ?>" target="_blank" class="venue-card">
        <img src="../images/music-production-service_tn.webp" alt="Music & DJ Blog" loading="lazy">
        <p><strong>Music & DJing</strong><br>Event stories, production tips, and mixes</p>
      </a>
      <a href="<?php echo defined('BLOG_TECH') ? BLOG_TECH : 'https://devblog.jasonbrain.com/'; ?>" target="_blank" class="venue-card">
        <img src="../images/web-development-service_tn.webp" alt="Technology & Web Dev Blog" loading="lazy">
        <p><strong>Technology & Web Dev</strong><br>Tutorials, code snippets, and tech insights</p>
      </a>
    </section>
    
    <hr>

    <section class="contact">
        <h2>Stay Updated</h2>
        <p>Follow me on social media for the latest updates from both worlds.</p>
        <div class="contact-cta-container" style="text-align: center; padding: 2rem 0;">
            <a href="<?php echo defined('SOCIAL_X') ? SOCIAL_X : 'https://x.com/JasonBra1n'; ?>" target="_blank" class="cta-button">Follow on X (Twitter)</a>
        </div>
    </section>

  </div>

  <?php include '../footer.php'; ?>
  <script src="../script.js"></script>
</body>
</html>