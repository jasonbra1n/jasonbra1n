<?php
// Load application bootstrap
if (file_exists(__DIR__ . '/../src/bootstrap.php')) {
    require_once __DIR__ . '/../src/bootstrap.php';
}

// Initialize variables for Web Dev Contact Form
$wd_name = $wd_email = $wd_project_type = $wd_message = "";
$wd_status_msg = "";
$wd_success = false;

// Check for Contact Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type']) && $_POST['form_type'] == 'web_dev_contact') {
    // Honeypot check
    if (!empty($_POST['honeypot'])) {
        die("Spam detected");
    }

    $wd_name = strip_tags(trim($_POST["name"]));
    $wd_email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $wd_project_type = strip_tags(trim($_POST["project-type"]));
    $wd_message = strip_tags(trim($_POST["message"]));

    if (empty($wd_name) || empty($wd_email) || empty($wd_message) || !filter_var($wd_email, FILTER_VALIDATE_EMAIL)) {
        $wd_status_msg = "Please fill out all required fields and provide a valid email address.";
    } else {
        $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
        $subject = "New Web Dev Inquiry from " . $wd_name;
        
        $email_content = "Name: $wd_name\n";
        $email_content .= "Email: $wd_email\n";
        $email_content .= "Project Type: $wd_project_type\n\n";
        $email_content .= "Project Details:\n$wd_message\n";

        $headers = "From: " . RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">\r\n";
        $headers .= "Reply-To: $wd_name <$wd_email>\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8";

        if (mail($recipient, $subject, $email_content, $headers)) {
            $wd_success = true;
        } else {
            $wd_status_msg = "There was a problem sending your message. Please try again.";
        }
    }
}

// Define page-specific metadata
$page_title = SITE_NAME . ' | Web Developer | AI-Powered Web Solutions';
$page_description = 'Professional web developer ' . SITE_NAME . ' - Custom websites, AI integration, e-commerce, and SEO for creative businesses. 30+ years of creative and technical experience.';
$page_keywords = 'web developer, AI web development, custom websites, e-commerce solutions, SEO services, creative business websites, ' . SITE_NAME;

// Define Schema.org JSON-LD
$schema_data = [
    "@context" => "https://schema.org",
    "@type" => "WebSite",
    "name" => SITE_NAME . " - Web Developer",
    "url" => SITE_URL . "/web-developer/",
    "author" => [
        "@type" => "Person",
        "name" => SITE_NAME,
        "url" => SITE_URL . "/"
    ],
    "description" => "Professional web development services specializing in AI-powered solutions, custom websites, and SEO for creative businesses."
];
$schema_json = json_encode($schema_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../head.php'; ?>
</head>
<body>
  <!-- Server-side include for navigation -->
  <?php include '../nav.html'; ?>

  <header>
    <div class="header-background"></div>
    <div class="header-gradient"></div>
    <canvas class="lights"></canvas>
    <div class="header-content">
      <h1 id="header-title">Jason Brain</h1>
      <p style="font-size: 2.5rem; font-weight: bold; margin: 0.5rem 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Web Developer</p>
      <p>AI-Powered & Creative Web Solutions</p>
      <button class="cta-button" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})">Start Your Project!</button>
    </div>
  </header>
  <div class="container">
    <section class="about">
      <h2>Meet Jason Brain - Your Creative Web Architect</h2>
      <div class="about-content-wrapper">
        <div class="about-image-container">
          <img src="../images/web-development-setup.webp" alt="Jason Brain - Professional Web Developer" 
               class="about-image">
        </div>
        <div class="about-text-content">
          <p class="intro-text">
            <strong>I don't just build websites – I architect digital experiences that connect with your audience.</strong>
          </p>
          <p>
            My journey into web development was a natural extension of my 30+ year career in music and entertainment. The same intuition that helps me read a crowd and know what song to play next now helps me understand user behavior and design websites that truly resonate.
          </p>
          <p>
            I merge creative insight with cutting-edge technology, including AI-powered tools, to build solutions that are not only functional but also engaging and intuitive. My background gives me a unique perspective on user experience – I know how to create a flow and guide an audience.
          </p>
          <p>
            My approach is collaborative: <em>Every website should be as unique as the business it represents.</em> I specialize in helping creative professionals and small businesses build a powerful online presence.
          </p>
          <div class="why-choose-box">
            <h4>Why Businesses Choose Jason Brain:</h4>
            <ul class="why-choose-list">
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Creative + Technical: A unique blend of artistic intuition and development expertise
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                AI-Enhanced Workflow: Leveraging modern AI for faster, smarter development
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                User-Centric Design: 30 years of reading crowds translates to understanding users
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Full-Stack Solutions: From concept and design to deployment and maintenance
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Small Business Focus: Specializing in sites for artists, musicians, and entrepreneurs
              </li>
            </ul>
          </div>
          <p class="about-quote-text">
            "I build websites that don't just look good – they feel right. It's about creating a connection."
          </p>
        </div>
      </div>
      <div class="investment-box">
        <h3>Investment in Your Digital Presence</h3>
        <p class="price-text">
          Custom web development services starting at <strong>$2,500</strong>
        </p>
        <p class="small-info-text">
          Because your business deserves a website that is as professional and unique as you are.<br>
          This includes consultation, custom design, development, and initial SEO setup.
        </p>
      </div>
    </section>

    <section class="venues">
      <h2>Development Services</h2>
      <a href="#contact" class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'}); return false;">
        <img src="../images/custom-websites.webp" alt="Custom website design and development" loading="lazy">
        <p>Custom Websites</p>
      </a>
      <a href="#contact" class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'}); return false;">
        <img src="../images/ai-integration.webp" alt="AI integration for web applications" loading="lazy">
        <p>AI Integration</p>
      </a>
      <a href="#contact" class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'}); return false;">
        <img src="../images/ecommerce.webp" alt="E-commerce and online store solutions" loading="lazy">
        <p>E-commerce</p>
      </a>
      <a href="#contact" class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'}); return false;">
        <img src="../images/seo.webp" alt="SEO and performance optimization" loading="lazy">
        <p>SEO & Optimization</p>
      </a>
    </section>
    <hr>
    <section class="venues">
      <h2>Project Showcase</h2>
      <a href="brainav-project.php" class="venue-card">
        <img src="../images/ai-integration.webp" alt="BrainAV Organization" loading="lazy">
        <p><strong>BrainAV</strong><br>Creative Tech Lab & AI Projects</p>
      </a>
      <a href="jasonbrain-project.php" class="venue-card">
        <img src="../images/project-main.webp" alt="jasonbrain.com Monorepo Project" loading="lazy">
        <p><strong>jasonbrain.com</strong><br>Full-Stack Monorepo (PHP)</p>
      </a>
      <a href="lab-project.php" class="venue-card">
        <img src="../images/web-development-setup.webp" alt="LAB: Digital Workshop SPA" loading="lazy">
        <p><strong>LAB: Digital Workshop</strong><br>Vanilla JS SPA / Modular Tools</p>
      </a>
      <a href="dj-brain-project.php" class="venue-card">
        <img src="../images/music-production-service_tn.webp" alt="DJ Brain Project" loading="lazy">
        <p><strong>DJ Brain</strong><br>AI-Powered Jukebox System</p>
      </a>
      <a href="ai-coproducer-project.php" class="venue-card">
        <img src="../images/ai-integration.webp" alt="AI Co-Producer Project" loading="lazy">
        <p><strong>AI Co-Producer</strong><br>AI Assistant for Ableton Live</p>
      </a>
    </section>
    <hr>
    <section class="blog">
      <h2>Web Dev Insights & FAQ</h2>
      <h3>Frequently Asked Questions</h3>
      <div class="faq-accordion">
        <div class="faq-item">
          <button class="faq-question">How does AI improve web development?</button>
          <div class="faq-answer">
            <p>AI accelerates the development process through code generation, automated testing, and intelligent recommendations. This allows me to focus more on the creative and strategic aspects of your project, delivering a higher quality product faster. I leverage advanced models like Gemini and Gemma in my daily workflow.</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question">What is 'Full-Stack' development?</button>
          <div class="faq-answer">
            <p>Full-stack development means I handle both the 'front-end' (what users see and interact with in their browser) and the 'back-end' (the server, database, and application logic). This comprehensive approach ensures a seamless, fully integrated product from start to finish.</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question">Why is SEO important from the start?</button>
          <div class="faq-answer">
            <p>Building a website with Search Engine Optimization (SEO) in mind from day one is crucial. It involves structuring the site correctly, optimizing for speed, using proper tags, and creating quality content. This foundational work makes it much easier for search engines like Google to find and rank your site, driving organic traffic to your business.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="packages">
      <h2>Web Development Packages</h2>
      <p class="intro-paragraph">
        Creative and technical expertise to build your ideal digital presence. Each package is a starting point and can be customized to your exact needs.
      </p>
      <div class="packages-grid">
        <div class="package-card">
          <div class="package-badge essential">
            STARTER
          </div>
          <h3>LaunchPad Site</h3>
          <div class="package-price">$2,500</div>
          <p class="package-description">A professional, multi-page informational website</p>
          <ul class="package-features-list">
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Up to 5 custom-designed pages
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Mobile-responsive design
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Contact form integration
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Basic SEO setup
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              1 hour of training
            </li>
          </ul>
        </div>
        <div class="package-card popular">
          <div class="package-badge popular">
            MOST POPULAR
          </div>
          <h3>Business Pro</h3>
          <div class="package-price">$5,000</div>
          <p class="package-description">An advanced site with e-commerce or booking</p>
          <ul class="package-features-list">
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              <strong>Everything in LaunchPad, plus:</strong>
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              E-commerce or booking system setup
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Up to 10 products/services setup
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Advanced SEO optimization
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Blog / content management system
            </li>
          </ul>
        </div>
        <div class="package-card">
          <div class="package-badge luxury">
            PREMIUM
          </div>
          <h3>AI-Powered Solution</h3>
          <div class="package-price">$10,000+</div>
          <p class="package-description">A fully custom web application with AI features</p>
          <ul class="package-features-list">
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              <strong>Everything in Business Pro, plus:</strong>
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Custom web application development
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              AI feature integration (e.g., chatbots, recommendation engines)
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              User accounts and database integration
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              API integrations with third-party services
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Ongoing support & maintenance plan
            </li>
          </ul>
        </div>
      </div>
      <div class="all-packages-info">
        <p class="main-text">
          <strong>All packages include:</strong> Initial consultation, custom design, development, testing, deployment, and my commitment to building a site that serves your business goals.
        </p>
        <p class="small-text">
          <em>Hosting and domain registration are separate. Monthly maintenance plans available starting at $150/month.</em>
        </p>
      </div>
    </section>

    <section class="contact" id="contact">
      <h2>Start Your Web Project</h2>
      
      <div class="contact-intro-box">
        <h3>Let's Build Your Digital Future</h3>
        <p>
          Ready to create a website that stands out? Fill out the form to discuss your project, and I'll get back to you within one business day to schedule a free consultation.
        </p>
      </div>

      <div class="contact-card">
        <div class="contact-form-container">
          <?php if ($wd_success): ?>
            <div style="background: #d4edda; color: #155724; padding: 2rem; border-radius: 10px; border: 1px solid #c3e6cb; text-align: center;">
              <h4 style="color: #155724; margin-bottom: 1rem;">Quote Request Sent!</h4>
              <p>Thank you for your inquiry. I'll review your project details and get back to you within one business day.</p>
            </div>
          <?php else: ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>#contact" method="POST" class="contact-form">
            <input type="hidden" name="form_type" value="web_dev_contact">
            <input type="text" name="honeypot" style="display: none;">
            <?php if (!empty($wd_status_msg)): ?>
              <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 10px; margin-bottom: 1rem; border: 1px solid #f5c6cb;">
                <?php echo $wd_status_msg; ?>
              </div>
            <?php endif; ?>
            <div class="form-group">
              <label for="name" class="form-label">Name</label>
              <input type="text" id="name" name="name" required placeholder="Your Name" class="form-input" value="<?php echo htmlspecialchars($wd_name); ?>">
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" required placeholder="Your Email" class="form-input" value="<?php echo htmlspecialchars($wd_email); ?>">
            </div>
            <div class="form-group">
              <label for="project-type" class="form-label">Project Type</label>
              <select id="project-type" name="project-type" class="form-input">
                <option value="">Select Project Type</option>
                <option value="starter" <?php if ($wd_project_type == "starter") echo "selected"; ?>>LaunchPad Site</option>
                <option value="business" <?php if ($wd_project_type == "business") echo "selected"; ?>>Business Pro</option>
                <option value="custom-ai" <?php if ($wd_project_type == "custom-ai") echo "selected"; ?>>AI-Powered Solution</option>
                <option value="other" <?php if ($wd_project_type == "other") echo "selected"; ?>>Other/Unsure</option>
              </select>
            </div>
            <div class="form-group">
              <label for="message" class="form-label">Project Details</label>
              <textarea id="message" name="message" required placeholder="Tell me about your business and what you're looking for in a website." class="form-textarea"><?php echo htmlspecialchars($wd_message); ?></textarea>
            </div>
            <button type="submit" class="form-submit-button">Get a Free Quote</button>
          </form>
          <?php endif; ?>
        </div>
        
        <div class="contact-map-container">
          <h4>My Tech Stack</h4>
          <div class="platforms-grid">
             <div class="platform-link">
              <div class="platform-icon">💻</div>
              <div class="platform-name">HTML, CSS, JS</div>
              <div class="platform-description">Core web technologies</div>
            </div>
             <div class="platform-link">
              <div class="platform-icon">🤖</div>
              <div class="platform-name">AI Assistants</div>
              <div class="platform-description">Gemini & Gemma Models</div>
            </div>
             <div class="platform-link">
              <div class="platform-icon">🐍</div>
              <div class="platform-name">Python</div>
              <div class="platform-description">For back-end & scripting</div>
            </div>
          </div>
          <div class="map-info-box">
            <p><strong class="map-info-strong">Based in:</strong> Haliburton, Ontario</p>
            <p><strong class="map-info-strong">Working:</strong> Remotely with clients worldwide</p>
            <p class="small-text">Creative solutions, no matter the location.</p>
          </div>
        </div>
      </div>
      
      <p class="contact-cta">Ready to elevate your online presence?<br><strong>Let's build something incredible together!</strong></p>
    </section>

  </div>
  
  <?php include '../footer.php'; ?>
  
  <script src="../script.js"></script>
</body>
</html>
