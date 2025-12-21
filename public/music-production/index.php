<?php
// Load application bootstrap
if (file_exists(__DIR__ . '/../src/bootstrap.php')) {
    require_once __DIR__ . '/../src/bootstrap.php';
}

// Initialize variables for Music Production Contact Form
$mp_name = $mp_email = $mp_project_type = $mp_message = "";
$mp_status_msg = "";
$mp_success = false;

// Check for Contact Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type']) && $_POST['form_type'] == 'music_production_contact') {
    // Honeypot check
    if (!empty($_POST['honeypot'])) {
        die("Spam detected");
    }

    $mp_name = strip_tags(trim($_POST["name"]));
    $mp_email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mp_project_type = strip_tags(trim($_POST["project-type"]));
    $mp_message = strip_tags(trim($_POST["message"]));

    if (empty($mp_name) || empty($mp_email) || empty($mp_message) || !filter_var($mp_email, FILTER_VALIDATE_EMAIL)) {
        $mp_status_msg = "Please fill out all required fields and provide a valid email address.";
    } else {
        $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
        $subject = "New Music Production Inquiry from " . $mp_name;
        
        $email_content = "Name: $mp_name\n";
        $email_content .= "Email: $mp_email\n";
        $email_content .= "Project Type: $mp_project_type\n\n";
        $email_content .= "Project Details:\n$mp_message\n";

        $headers = "From: " . RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">\r\n";
        $headers .= "Reply-To: $mp_name <$mp_email>\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8";

        if (mail($recipient, $subject, $email_content, $headers)) {
            $mp_success = true;
        } else {
            $mp_status_msg = "There was a problem sending your message. Please try again.";
        }
    }
}

// Define page-specific metadata
$page_title = SITE_NAME . ' | Music Producer | Beats, Remixes & Original Productions';
$page_description = 'Professional music producer ' . SITE_NAME . ' (ΙΑΣΩΝ) - Custom beats, remixes, acapella extraction, megamix production. 30+ years experience across all genres.';
$page_keywords = 'music producer, beat maker, remix producer, acapella extraction, megamix, custom beats, music production services, ' . SITE_NAME . ', IASON';

// Define Schema.org JSON-LD
$schema_data = [
    "@context" => "https://schema.org",
    "@type" => "Service",
    "serviceType" => "Music Production",
    "name" => SITE_NAME . " - Music Producer",
    "alternateName" => "ΙΑΣΩΝ",
    "url" => SITE_URL . "/music-production/",
    "sameAs" => [
        SOCIAL_X,
        SOCIAL_TIKTOK,
        SOCIAL_MIXCLOUD,
        SOCIAL_SOUNDCLOUD,
        SOCIAL_HEARTHIS
    ],
    "provider" => [
        "@type" => "Person",
        "name" => SITE_NAME,
        "url" => SITE_URL . "/"
    ],
    "genre" => ["Electronic", "House", "Dancehall", "Rock", "Trance"],
    "description" => "Professional music producer specializing in beats, remixes, acapella extraction, and original productions across all genres."
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
      <h1 id="header-title">Music Producer</h1>
      <p style="font-size: 1.8rem; font-weight: bold; margin: 0.5rem 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Custom Beats, Remixes & Original Productions</p>
      <p>30+ Years Crafting Sounds Across Every Genre</p>
      <button class="cta-button" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})">Start Your Project!</button>
    </div>
  </header>
  <div class="container">
    <section class="about">
      <h2>Meet Jason Brain (ΙΑΣΩΝ) - Your Sound Architect</h2>
      <div class="about-content-wrapper">
        <div class="about-image-container">
          <img src="images/jason-studio.jpg" alt="Jason Brain - Professional Music Producer in his studio" 
               class="about-image">
        </div>
        <div class="about-text-content">
          <p class="intro-text">
            <strong>I don't just make beats – I architect sonic experiences that move souls and bodies.</strong>
          </p>
          <p>
            My musical journey started in public school, spinning records at dance events across Ontario before I even hit college. This early passion evolved through my college years as a pub DJ, then expanded to bars, restaurants, and nightclubs in Peterborough, Oshawa, and Toronto.
          </p>
          <p>
            From those legendary nights closing Lindsay's York Tavern to producing rock tracks for King and Oakes, I've spent 30+ years understanding what makes people move. My studio became the natural evolution – where genres collide, boundaries dissolve, and musical visions become reality.
          </p>
          <p>
            Now I focus on creating immersive music and soundscapes, from healing frequency trance as ΙΑΣΩΝ to professional productions for artists worldwide. My approach is intuitive: <em>Every project deserves a sound as unique as your artistic vision.</em> I bring three decades of experience reading crowds, understanding energy, and crafting sounds that connect with souls.
          </p>
          <div class="why-choose-box">
            <h4>Why Artists Choose Jason Brain:</h4>
            <ul class="why-choose-list">
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Genre Fluency: From trance to dancehall to rock - I speak all musical languages
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Advanced Tools: Ableton Live, Resolume, custom acapella extraction techniques
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Proven Track Record: Produced for bands, created viral dance mixes, crafted uplifting trance
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Quick Turnaround: Professional results without the wait
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Custom Everything: Beats, remixes, megamixes, acapellas - tailored to your needs
              </li>
            </ul>
          </div>
          <p class="about-quote-text">
            "From 423Hz healing frequencies to pounding club anthems - I craft the sounds that move your audience."
          </p>
        </div>
      </div>
      <div class="investment-box">
        <h3>Investment in Your Sound</h3>
        <p class="price-text">
          Professional music production services starting at <strong>$200</strong>
        </p>
        <p class="small-info-text">
          Because your music deserves more than generic loops.<br>
          This includes professional mixing, mastering, and my personal attention to every detail.
        </p>
      </div>
      <div class="mix-player">
        <h3>Featured Productions: Showcasing Musical Range</h3>
        <!-- REMix 1: EDM REMIX Production -->
        <div class="mix-item">
          <h4 class="mix-item-title">Jason Brain – Call On Me (Jason's 2025 R3tarded Valerie Remix)</h4>
          <div class="iframe-placeholder" data-src="https://app.hearthis.at/embed/12690061/transparent_black/?hcolor=&color=&style=2&block_size=2&block_space=1&background=1&waveform=0&cover=0&autoplay=0&css=" style="height: 150px;">
            <div class="iframe-placeholder-content">
              <div class="play-button"></div>
              <p>Load "Call On Me" Remix</p>
            </div>
          </div>
          <p class="mix-description">Eric Prydz x Steve Winwood ( Jason's 2025 R3tarded Valerie Remix ) <a href="https://hearthis.at/iason/valerie-12-beta/" target="_blank" class="mixcloud-link">Play on HearThis.at</a></p>
        </div>

            <!-- Sexual Healing Remix -->
        <div class="mix-item">
          <h4 class="mix-item-title">Max-A-Million - Sexual Healing (2017 Love Me Down Remix Remake)</h4>
          <p class="mix-note" style="font-size: 0.75em; color: #666; margin-top: 4px;">
    <em>
      Complete digital reconstruction of my first remix from 1996 with my high school pals (credited as The Slash Brothers). 
      20+ years later, I recreated the "lost" remix from scratch as the 2017 digital remake by Jason Brain.
    </em>
          </p>
          <div class="iframe-placeholder" data-src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/992903764&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true" style="height: 150px;">
            <div class="iframe-placeholder-content">
              <div class="play-button"></div>
              <p>Load "Sexual Healing" Remix</p>
            </div>
          </div>
          <p class="mix-description">An exclusive remix showcasing a modern take on a classic. <a href="https://soundcloud.com/jason-brain/sexual-healing-2017-love-me-down-remix-remake" target="_blank" class="mixcloud-link">Play on SoundCloud</a></p>
          
        </div>
        
        <!-- Mix 1: Original Trance Production -->
        <div class="mix-item">
          <h4 class="mix-item-title">ΙΑΣΩΝ - "Bow Bow" (Original Trance Production - 423Hz Tuned)</h4>
          <div class="iframe-placeholder" data-src="https://app.hearthis.at/embed/10484381/transparent_black/?hcolor=&color=&style=2&block_size=2&block_space=1&background=1&waveform=0&cover=0&autoplay=0&css=" style="height: 150px;">
            <div class="iframe-placeholder-content">
              <div class="play-button"></div>
              <p>Load "Bow Bow" (Original)</p>
            </div>
          </div>
          <p class="mix-description">Uplifting trance production tuned to healing 423Hz frequency. <a href="https://soundcloud.com/jason-brain" target="_blank" class="mixcloud-link">More on SoundCloud</a></p>
        </div>


        <!-- Mix 3: Another Rock Production -->
        <div class="mix-item">
          <h4 class="mix-item-title">King and Oakes - "Empty Box" (Rock Production)</h4>
          <div class="iframe-placeholder" data-src="https://app.hearthis.at/embed/3715226/transparent_black/?hcolor=&color=&style=1&block_size=2&block_space=1&background=1&waveform=0&cover=0&autoplay=0&css=" style="height: 150px;">
            <div class="iframe-placeholder-content">
              <div class="play-button"></div>
              <p>Load "Empty Box"</p>
            </div>
          </div>
          <p class="mix-description">Another example of full rock production with professional mixing and mastering.</p>
        </div>

        <!-- Mix 4: Melodic House Mix -->
        <div class="mix-item">
          <h4 class="mix-item-title">ΙΑΣΩΝ - 4x4.2: Heirloom (Melodic House Mix)</h4>
          <div class="iframe-placeholder" data-src="https://app.hearthis.at/embed/11056567/transparent_black/?hcolor=&color=&style=2&block_size=2&block_space=1&background=1&waveform=0&cover=0&autoplay=0&css=" style="height: 150px;">
            <div class="iframe-placeholder-content">
              <div class="play-button"></div>
              <p>Load "Heirloom" Mix</p>
            </div>
          </div>
          <p class="mix-description">Sophisticated melodic house production and mixing. <a href="https://www.mixcloud.com/jasonbra1n/" target="_blank" class="mixcloud-link">Full collection on Mixcloud</a></p>
        </div>

        <div class="mix-summary-box">
          <p>
            <strong class="mix-summary-strong">From healing frequency trance to rock productions to melodic house</strong> - this is what three decades of genre mastery sounds like. 
            Your next project will be crafted with the same attention to sonic detail.
          </p>
        </div>
      </div>
      
      <!-- Extended Background Section -->
      <div class="extended-background-box">
        <h3>Three Decades of Musical Evolution</h3>
        <p>
          My journey in music and entertainment spans over thirty years, beginning with spinning records at public school dance events across Ontario. This early passion carried me through college as a pub DJ, then into the vibrant nightlife scenes of Peterborough, Oshawa, and Toronto.
        </p>
        <p>
          Those formative years in bars, restaurants, and nightclubs taught me to read crowds instinctively – a skill that now informs every production decision I make. From packed dance floors to intimate acoustic sessions, I've learned that great music isn't just about technical perfection; it's about creating moments that resonate.
        </p>
        <p>
          Today, my focus has evolved into creating immersive music and soundscapes that incorporate cutting-edge technology. I specialize in productions that blend music with visuals, projection mapping, and healing frequencies. When I'm not in the studio, I channel my technical expertise into web development, supporting artists and small businesses with their digital presence.
        </p>
        <p class="closing-statement">
          <strong>Thank you for visiting my space.</strong> Whether you're looking for a custom beat, a professional remix, or a complete original production, I'm here to bring your musical vision to life with three decades of passion and expertise.
        </p>
      </div>
      
    </section>

    <section class="venues">
      <h2>Production Services</h2>
      <div class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">
        <img src="images/beat-making.jpg" alt="Custom beat production in Ableton Live" loading="lazy">
        <p>Custom Beats</p>
      </div>
      <div class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">
        <img src="images/remix-studio.jpg" alt="Professional remix production setup" loading="lazy">
        <p>Remixes</p>
      </div>
      <div class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">
        <img src="images/acapella-extraction.jpg" alt="Acapella extraction tools and software" loading="lazy">
        <p>Acapella Extraction</p>
      </div>
      <div class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">
        <img src="images/megamix-production.jpg" alt="Megamix production for dance routines" loading="lazy">
        <p>Megamix Production</p>
      </div>
    </section>
    <hr>
    <section class="gallery">
      <h2>Studio & Production Gallery</h2>
      <img src="images/studio-wide.jpg" alt="Jason Brain's music production studio setup" loading="lazy">
      <img src="images/ableton-session.jpg" alt="Ableton Live session showing beat production" loading="lazy">
      <img src="images/mixing-console.jpg" alt="Professional mixing console in use" loading="lazy">
    </section>
    <hr>
    <section class="blog">
      <h2>Music Production Tips & Insights</h2>
      <h3>Frequently Asked Questions</h3>
      <div class="faq-accordion">
        <div class="faq-item">
          <button class="faq-question">What Makes a Great Custom Beat?</button>
          <div class="faq-answer">
            <p>A great custom beat starts with understanding your artistic vision and target audience. With 30+ years of experience across genres, I craft beats that complement your style while pushing creative boundaries. Every beat includes professional mixing and stems for maximum flexibility.</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question">How Do You Extract Clean Acapellas?</button>
          <div class="faq-answer">
            <p>Using advanced spectral editing tools and proprietary techniques developed over decades of production work, I can extract clean acapellas from most mixed tracks. Perfect for remixes, mashups, or creating new arrangements. Results vary by source material quality.</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question">What's Involved in Professional Remix Production?</button>
          <div class="faq-answer">
            <p>Professional remixes involve complete reconstruction of the original track's elements, adding new instrumentation, updating the arrangement, and creating a fresh sonic identity while respecting the original's essence. I work across all genres from trance to rock to dancehall.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Fund the Vibes Section -->
    <section class="fund-vibes-section">
      <div class="fund-vibes-bg-pattern"></div>
      <div class="fund-vibes-content">
        <div class="fund-vibes-badge">
          <span class="emoji">🎵</span>
          <span class="text">FUND THE VIBES</span>
          <span class="emoji-right">🎧</span>
        </div>
        
        <h2>
          Love the Music? Show Some Love!
        </h2>
        
        <p class="intro-paragraph">
          If you've been vibing to my productions or had your project elevated by my work, 
          your support helps me keep creating innovative sounds and pushing musical boundaries! ✨
        </p>

        <div class="fund-vibes-grid">
          <div class="fund-vibes-grid-item">
            <div class="emoji">🎶</div>
            <div class="title">Support New Music</div>
            <div class="description">Help fund original productions & releases</div>
          </div>
          <div class="fund-vibes-grid-item">
            <div class="emoji">🎤</div>
            <div class="title">Upgrade Studio Gear</div>
            <div class="description">Better tools = better productions for everyone</div>
          </div>
          <div class="fund-vibes-grid-item">
            <div class="emoji">💫</div>
            <div class="title">Show Appreciation</div>
            <div class="description">Your way of saying "thanks for the sonic magic!"</div>
          </div>
          <div class="fund-vibes-grid-item">
            <div class="emoji">🎉</div>
            <div class="title">Enable Experimentation</div>
            <div class="description">Support creative risks & genre-bending projects</div>
          </div>
        </div>

        <div class="paypal-box">
          <p>
            Every contribution, big or small, helps keep the creative process flowing and the sonic boundaries expanding! 🎛️🔊
          </p>
          
          <a href="https://www.paypal.com/paypalme/jasonbrain" target="_blank" rel="noopener noreferrer" 
             class="paypal-button">
            <span class="icon-left">💳</span>
            Fund the Vibes via PayPal
            <span class="icon-right">🎵</span>
          </a>
        </div>

        <div class="fund-vibes-footer-box">
          <p>
            <strong class="fund-vibes-footer-strong">💖 From the bottom of my heart:</strong> Whether you tip $5 or $50, every contribution is deeply appreciated 
            and goes directly toward creating more innovative music and expanding my sonic palette!
          </p>
        </div>
      </div>
    </section>
    <hr>
    <section class="packages">
      <h2>Music Production Packages</h2>
      <p class="intro-paragraph">
        Three decades of experience crafting sounds across every genre. Each package includes professional mixing, mastering, and my personal attention to your artistic vision.
      </p>
      <div class="packages-grid">
        <div class="package-card">
          <div class="package-badge essential">
            ESSENTIAL
          </div>
          <h3>Beat Production</h3>
          <div class="package-price">$200</div>
          <p class="package-description">Custom beat tailored to your style</p>
          <ul class="package-features-list">
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Custom beat in your chosen genre
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Professional mixing & mastering
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Stereo mixdown + individual stems
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Up to 3 revisions included
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Commercial usage rights
            </li>
          </ul>
        </div>
        <div class="package-card popular">
          <div class="package-badge popular">
            MOST POPULAR
          </div>
          <h3>Remix Production</h3>
          <div class="package-price">$500</div>
          <p class="package-description">Complete professional remix of your track</p>
          <ul class="package-features-list">
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              <strong>Everything in Beat Production, plus:</strong>
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Complete track reconstruction
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              New instrumentation & arrangement
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Genre transformation if desired
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Radio edit + extended versions
            </li>
          </ul>
        </div>
        <div class="package-card">
          <div class="package-badge luxury">
            PREMIUM
          </div>
          <h3>Full Production</h3>
          <div class="package-price">$1,200</div>
          <p class="package-description">Complete original song production</p>
          <ul class="package-features-list">
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              <strong>Everything in Remix Production, plus:</strong>
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Original composition & arrangement
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Multiple mix versions
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Vocal tuning & processing
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Unlimited revisions until perfect
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Full commercial rights included
            </li>
          </ul>
        </div>
      </div>
      <div class="all-packages-info">
        <p class="main-text">
          <strong>All packages include:</strong> Initial consultation, professional mixing/mastering, 
          and my 30+ years of experience crafting sounds that move people.
        </p>
        <p class="small-text">
          <em>Add-ons available: Acapella extraction ($150), Megamix production ($300), Instrumental versions ($100)</em>
        </p>
      </div>
    </section>

    <section class="contact" id="contact">
      <h2>Start Your Music Production Project</h2>
      
      <!-- Full-width intro section -->
      <div class="contact-intro-box">
        <h3>Let's Create Something Amazing</h3>
        <p>
          Ready to bring your musical vision to life? Fill out the form to discuss your project, and I'll respond within one business day with ideas and next steps.
        </p>
      </div>

      <!-- Two-column form and platforms section -->
      <div class="contact-card">
        <div class="contact-form-container">
          <?php if ($mp_success): ?>
            <div style="background: #d4edda; color: #155724; padding: 2rem; border-radius: 10px; border: 1px solid #c3e6cb; text-align: center;">
              <h4 style="color: #155724; margin-bottom: 1rem;">Message Sent!</h4>
              <p>Thank you for your inquiry. I'll review your project details and get back to you within one business day.</p>
            </div>
          <?php else: ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>#contact" method="POST" class="contact-form">
            <input type="hidden" name="form_type" value="music_production_contact">
            <input type="text" name="honeypot" style="display: none;">
            <?php if (!empty($mp_status_msg)): ?>
              <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 10px; margin-bottom: 1rem; border: 1px solid #f5c6cb;">
                <?php echo $mp_status_msg; ?>
              </div>
            <?php endif; ?>
            <div class="form-group">
              <label for="name" class="form-label">Name</label>
              <input type="text" id="name" name="name" required placeholder="Your Name" class="form-input" value="<?php echo htmlspecialchars($mp_name); ?>">
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" required placeholder="Your Email" class="form-input" value="<?php echo htmlspecialchars($mp_email); ?>">
            </div>
            <div class="form-group">
              <label for="project-type" class="form-label">Project Type</label>
              <select id="project-type" name="project-type" class="form-input">
                <option value="">Select Project Type</option>
                <option value="beat-production" <?php if ($mp_project_type == "beat-production") echo "selected"; ?>>Custom Beat Production</option>
                <option value="remix" <?php if ($mp_project_type == "remix") echo "selected"; ?>>Remix Production</option>
                <option value="full-production" <?php if ($mp_project_type == "full-production") echo "selected"; ?>>Full Original Production</option>
                <option value="acapella-extraction" <?php if ($mp_project_type == "acapella-extraction") echo "selected"; ?>>Acapella Extraction</option>
                <option value="megamix" <?php if ($mp_project_type == "megamix") echo "selected"; ?>>Megamix for Dance Routine</option>
                <option value="other" <?php if ($mp_project_type == "other") echo "selected"; ?>>Other/Multiple Services</option>
              </select>
            </div>
            <div class="form-group">
              <label for="message" class="form-label">Project Details</label>
              <textarea id="message" name="message" required placeholder="Tell me about your project! Include genre, style references, timeline, and any specific requirements." class="form-textarea"><?php echo htmlspecialchars($mp_message); ?></textarea>
            </div>
            <button type="submit" class="form-submit-button">Start My Project</button>
          </form>
          <?php endif; ?>
        </div>
        
        <div class="contact-map-container">
          <h4>Find My Music</h4>
          <div class="platforms-grid">
            <a href="https://www.mixcloud.com/jasonbra1n/" target="_blank" class="platform-link">
              <div class="platform-icon">🎧</div>
              <div class="platform-name">Mixcloud</div>
              <div class="platform-description">DJ Mixes & Sets</div>
            </a>
            <a href="https://soundcloud.com/jason-brain" target="_blank" class="platform-link">
              <div class="platform-icon">☁️</div>
              <div class="platform-name">SoundCloud</div>
              <div class="platform-description">Original Productions</div>
            </a>
            <a href="https://hearthis.at/iason/" target="_blank" class="platform-link">
              <div class="platform-icon">❤️</div>
              <div class="platform-name">HearThis.at</div>
              <div class="platform-description">ΙΑΣΩΝ Releases</div>
            </a>
          </div>
          <div class="map-info-box">
            <p><strong class="map-info-strong">Based in:</strong> Haliburton, Ontario</p>
            <p><strong class="map-info-strong">Working:</strong> Worldwide (Remote)</p>
            <p class="small-text">Professional remote collaboration</p>
          </div>
        </div>
      </div>
      
      <p class="contact-cta">Ready to elevate your sound?<br><strong>Let's create something legendary together!</strong></p>
    </section>
    <hr>
    
    <!-- Studio & Tools Section -->
    <section class="visual-production-section">
      <div class="visual-bg-pattern"></div>
      <div class="visual-content">
        <h2>
          Professional Studio & Tools
        </h2>
        <p class="intro-paragraph">
          Cutting-edge technology meets three decades of musical intuition
        </p>
        <div class="visual-grid">
          <div class="visual-image-container">
            <img src="../images/king-oakes-production_tn.webp"
                 alt="Jason Brain's Ableton Live production session"
                 class="visual-image">
            <div class="visual-image-badge">
              Ableton Live • Professional Production
            </div>
          </div>
          <div class="visual-features-content">
            <h3>
              Professional Production Suite
            </h3>
            <div class="sub-section">
              <h4>What This Means for Your Project:</h4>
              <ul class="visual-features-list">
                <li class="visual-feature-item">
                  <span class="bullet">◆</span>
                  <div>
                    <strong>Ableton Live Suite:</strong> Industry-standard DAW with unlimited creative possibilities
                  </div>
                </li>
                <li class="visual-feature-item">
                  <span class="bullet">◆</span>
                  <div>
                    <strong>Advanced Sampling:</strong> Custom sample libraries and proprietary sound design
                  </div>
                </li>
                <li class="visual-feature-item">
                  <span class="bullet">◆</span>
                  <div>
                    <strong>Spectral Editing:</strong> Precise acapella extraction and audio manipulation
                  </div>
                </li>
                <li class="visual-feature-item">
                  <span class="bullet">◆</span>
                  <div>
                    <strong>Professional Mixing:</strong> Studio-quality processing and mastering chain
                  </div>
                </li>
                <li class="visual-feature-item">
                  <span class="bullet">◆</span>
                  <div>
                    <strong>Genre Flexibility:</strong> Tools and techniques for any musical style
                  </div>
                </li>
              </ul>
            </div>
            <div class="visual-quote-box">
              <p>
                "From extracting perfect acapellas to crafting healing frequency trance at 423Hz, 
                I use cutting-edge tools combined with three decades of musical intuition to bring your vision to life."
              </p>
            </div>
          </div>
        </div>
        <div class="equipment-capabilities-box">
          <h4>
            Studio Capabilities & Specialties
          </h4>
          <div class="capabilities-grid">
            <div class="capability-item">
              <div class="title">Beat Production</div>
              <div class="description">Custom beats in any genre with professional stems</div>
            </div>
            <div class="capability-item">
              <div class="title">Remix Engineering</div>
              <div class="description">Complete track reconstruction and reimagining</div>
            </div>
            <div class="capability-item">
              <div class="title">Acapella Extraction</div>
              <div class="description">Clean vocal isolation using advanced spectral tools</div>
            </div>
            <div class="capability-item">
              <div class="title">Megamix Creation</div>
              <div class="description">Seamless dance routine mixes with precise timing</div>
            </div>
            <div class="capability-item">
              <div class="title">Original Composition</div>
              <div class="description">Full song production from concept to master</div>
            </div>
            <div class="capability-item">
              <div class="title">Healing Frequencies</div>
              <div class="description">Specialized tuning including 423Hz and other therapeutic frequencies</div>
            </div>
          </div>
        </div>
        <div class="visual-add-on-box">
          <h4>Express Service</h4>
          <div class="price">+50% Rush Fee</div>
          <p>
            Need it fast? Express turnaround available for urgent projects. Contact me to discuss timeline and feasibility.
          </p>
          <p class="small-italic">
            *Standard turnaround: Beats (3-5 days), Remixes (1-2 weeks), Full Productions (2-4 weeks)
          </p>
        </div>
      </div>
    </section>
    <!-- Testimonials Section -->
    <section class="testimonials">
      <h2>What Artists & Clients Say</h2>
      <p class="intro-paragraph">
        Real feedback from musicians, dancers, and creative collaborators
      </p>
      
      <!-- Featured Work -->
      <div class="trusted-vendors-box">
        <h4>Featured Collaborations</h4>
        <p>
          "From producing rock bands like King and Oakes to creating healing frequency trance as ΙΑΣΩΝ, 
          I've proven that genre boundaries are just suggestions. Every project gets the same passion and precision."
        </p>
        <p class="small-italic">
          King and Oakes • International DJ collaborations • Dance routine choreographers • Independent artists worldwide
        </p>
      </div>

      <!-- Testimonials Grid -->
      <div class="testimonials-grid">
        <div class="testimonial-card">
          <div class="testimonial-quote">
            <p>"Jason's production work on our tracks was absolutely incredible. He understood our rock sound immediately and elevated it beyond what we imagined possible. 'Sundays' and 'Empty Box' wouldn't be the same without his touch."</p>
          </div>
          <div class="testimonial-author">
            <strong>King and Oakes</strong>
            <span class="testimonial-location">Rock Band</span>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-quote">
            <p>"The acapella extraction Jason did for our remix project was flawless. I've worked with many producers, but his technique for isolating vocals is next level. Professional results every time."</p>
          </div>
          <div class="testimonial-author">
            <strong>DJ Martinez</strong>
            <span class="testimonial-location">Electronic Music Producer</span>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-quote">
            <p>"Jason created a custom megamix for our dance team that was absolutely perfect. Every transition was seamless, and the energy progression kept our routine dynamic from start to finish."</p>
          </div>
          <div class="testimonial-author">
            <strong>Sarah Chen</strong>
            <span class="testimonial-location">Dance Team Choreographer</span>
          </div>
        </div>

        <div class="testimonial-card vendor-testimonial">
          <div class="testimonial-quote">
            <p>"I've hired Jason for multiple beat productions, and he consistently delivers exactly what I'm looking for. His understanding of different genres and ability to create unique sounds is unmatched."</p>
          </div>
          <div class="testimonial-author">
            <strong>Marcus Thompson</strong>
            <span class="testimonial-location">Hip-Hop Artist</span>
          </div>
        </div>

        <div class="testimonial-card vendor-testimonial">
          <div class="testimonial-quote">
            <p>"The healing frequency work Jason does as ΙΑΣΩΝ is truly special. 'Bow Bow' at 423Hz has become a staple in my meditation sessions. It's music that genuinely heals."</p>
          </div>
          <div class="testimonial-author">
            <strong>Dr. Lisa Rodriguez</strong>
            <span class="testimonial-location">Sound Therapy Practitioner</span>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-quote">
            <p>"Jason's remix work is phenomenal. He took our original track and transformed it into something completely fresh while respecting the core essence. The turnaround time was incredible too!"</p>
          </div>
          <div class="testimonial-author">
            <strong>The Midnight Collective</strong>
            <span class="testimonial-location">Electronic Duo</span>
          </div>
        </div>
      </div>

      <!-- Call-to-Action -->
      <div class="testimonials-cta-box">
        <h4>Ready to Join the Success Stories?</h4>
        <p>Let's create music that moves people and elevates your artistic vision.</p>
        <button class="testimonials-cta-button" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})">
          Start Your Project
        </button>
      </div>
    </section>
  </div> <!-- Close container div HERE -->
  
  <?php include '../footer.php'; ?>
  
  <script src="../script.js"></script>
</body>
</html>
