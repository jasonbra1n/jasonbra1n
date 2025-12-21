<?php
// Load application bootstrap
if (file_exists(__DIR__ . '/../src/bootstrap.php')) {
    require_once __DIR__ . '/../src/bootstrap.php';
}

// Initialize variables for Corporate Contact Form
$c_name = $c_company = $c_email = $c_date = $c_message = "";
$c_status_msg = "";
$c_success = false;

// Check for Contact Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type']) && $_POST['form_type'] == 'corporate_contact') {
    // Honeypot check
    if (!empty($_POST['honeypot'])) {
        die("Spam detected");
    }

    $c_name = strip_tags(trim($_POST["name"]));
    $c_company = strip_tags(trim($_POST["company"]));
    $c_email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $c_date = strip_tags(trim($_POST["event-date"]));
    $c_message = strip_tags(trim($_POST["message"]));

    if (empty($c_name) || empty($c_company) || empty($c_email) || empty($c_message) || !filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
        $c_status_msg = "Please fill out all required fields and provide a valid email address.";
    } else {
        $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
        $subject = "New Corporate Event Inquiry from " . $c_company;
        
        $email_content = "Contact Name: $c_name\n";
        $email_content .= "Company: $c_company\n";
        $email_content .= "Email: $c_email\n";
        $email_content .= "Event Date: $c_date\n\n";
        $email_content .= "Event Details:\n$c_message\n";

        $headers = "From: " . RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">\r\n";
        $headers .= "Reply-To: $c_name <$c_email>\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8";

        if (mail($recipient, $subject, $email_content, $headers)) {
            $c_success = true;
        } else {
            $c_status_msg = "There was a problem sending your message. Please try again.";
        }
    }
}

// Define page-specific metadata
$page_title = 'Corporate Event DJ & AV | Haliburton & Northern Retreats | ' . SITE_NAME;
$page_description = 'Professional Corporate DJ and AV services for Northern Retreats in Haliburton, Minden, and Kawartha Lakes. ' . SITE_NAME . ' offers 30+ years of experience for off-site conferences and team building.';
$page_keywords = 'Corporate DJ Haliburton, Northern Retreat AV, Corporate Retreat DJ, Minden Corporate Events, Kawartha Lakes AV, ' . SITE_NAME . ', team building DJ';

// Define Schema.org JSON-LD
$schema_data = [
    "@context" => "https://schema.org",
    "@type" => "Service",
    "serviceType" => "Corporate Event Services",
    "name" => SITE_NAME . " Corporate DJ & AV",
    "url" => SITE_URL . "/corporate-events/",
    "provider" => [
        "@type" => "Person",
        "name" => SITE_NAME,
        "url" => SITE_URL . "/"
    ],
    "description" => "Professional DJ and AV services for corporate retreats and events in Haliburton and Northern Ontario."
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
      <h1 id="header-title">Corporate Event DJ & AV</h1>
      <p style="font-size: 2rem; font-weight: bold; margin: 0.5rem 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Haliburton & Northern Retreats</p>
      <p>Bringing Professional City-Quality Production to the Serenity of the North</p>
      <button class="cta-button" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})">Get a Quote!</button>
    </div>
  </header>
  <div class="container">
    <section class="about">
      <h2>Meet Jason Brain - Your Corporate Event Partner</h2>
      <div class="about-content-wrapper">
        <div class="about-image-container">
          <img src="../images/corporate-events-service.jpg" alt="Jason Brain - Professional Corporate DJ" 
               class="about-image">
        </div>
        <div class="about-text-content">
          <p class="intro-text">
            <strong>I don't just play music – I provide seamless audio-visual solutions that elevate your corporate retreat.</strong>
          </p>
          <p>
            With over 30 years of experience in event production, I specialize in bringing high-end audio-visual solutions to corporate retreats and off-site events in the Haliburton and Kawartha Lakes region. Whether you are hosting a leadership summit at a lakeside resort or a team-building weekend in the woods, I ensure your brand is presented flawlessly.
          </p>
          <p>
            My approach is built on precision and planning. I work closely with event planners and venue coordinators to ensure the audio, visual, and musical elements align perfectly with your event's goals, creating a seamless experience that allows your team to focus on connection and strategy.
          </p>
          <p>
            My approach is simple: <em>Your event's success is my top priority.</em> I provide not just a service, but a partnership, ensuring a flawless execution from start to finish.
          </p>
          <div class="why-choose-box">
            <h4>Why Companies Choose Jason Brain:</h4>
            <ul class="why-choose-list">
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                30+ Years of Experience: Unmatched reliability and professionalism
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Full AV Production: Sound, lighting, projection, and microphones
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Brand-Appropriate Music: Curated playlists that match your company's image
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Northern Specialist: Expert knowledge of local venues and logistics
              </li>
              <li class="why-choose-list-item">
                <span class="checkmark">✓</span>
                Discreet & Professional: A polished presence that complements your event
              </li>
            </ul>
          </div>
          <p class="about-quote-text">
            "The same precision I use in the studio is applied to every corporate event, ensuring a flawless experience."
          </p>
        </div>
      </div>
      <div class="investment-box">
        <h3>Investment in Your Event's Success</h3>
        <p class="price-text">
          Corporate event packages starting at <strong>$1,800</strong>
        </p>
        <p class="small-info-text">
          Because your brand deserves a flawless, professional presentation.<br>
          This includes professional sound system, wireless mics, and basic lighting for up to 4 hours.
        </p>
      </div>
    </section>

    <section class="venues">
      <h2>Event Types</h2>
      <a href="#contact" class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'}); return false;">
        <img src="../images/conference.webp" alt="DJ for a corporate conference" loading="lazy">
        <p>Conferences & Seminars</p>
      </a>
      <a href="#contact" class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'}); return false;">
        <img src="../images/holiday-party.webp" alt="DJ for a company holiday party" loading="lazy">
        <p>Holiday Parties</p>
      </a>
      <a href="#contact" class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'}); return false;">
        <img src="../images/product-launch.webp" alt="AV for a product launch event" loading="lazy">
        <p>Team Building</p>
      </a>
      <a href="#contact" class="venue-card" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'}); return false;">
        <img src="../images/gala.webp" alt="DJ for a corporate gala or awards night" loading="lazy">
        <p>Retreats & Summits</p>
      </a>
    </section>
    <hr>
    <section class="gallery">
      <h2>Past Corporate Events</h2>
      <img src="../images/event-setup-1.webp" alt="Corporate event DJ setup with uplighting" loading="lazy">
      <img src="../images/event-setup-2.webp" alt="AV setup for a corporate presentation" loading="lazy">
      <img src="../images/event-setup-3.webp" alt="DJ playing at a corporate networking event" loading="lazy">
    </section>
    <hr>
    <section class="blog">
      <h2>Corporate Event Insights</h2>
      <h3>Frequently Asked Questions</h3>
      <div class="faq-accordion">
        <div class="faq-item">
          <button class="faq-question">What AV services do you provide?</button>
          <div class="faq-answer">
            <p>I provide a comprehensive suite of AV services including professional sound systems (PA), wireless handheld and lavalier microphones, stage and atmospheric lighting, projectors and screens, and projection mapping for custom branding and visuals. I can handle the full technical production for most small to medium-sized events.</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question">How do you select music for a corporate event?</button>
          <div class="faq-answer">
            <p>Music selection is a collaborative process. I consult with you to understand the event's tone, audience demographics, and your brand's image. I can provide anything from unobtrusive background music for networking to upbeat, energetic playlists for a celebration. All music is clean, radio-edited, and professionally appropriate.</p>
          </div>
        </div>
        <div class="faq-item">
          <button class="faq-question">Can you incorporate our company's branding?</button>
          <div class="faq-answer">
            <p>Absolutely. I can use projection mapping to display your company logo, custom graphics, or brand colors throughout the venue. Lighting can also be customized to match your brand's color palette, creating a cohesive and immersive brand experience for your guests.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="packages">
      <h2>Corporate Event Packages</h2>
      <p class="intro-paragraph">
        Reliable, professional, and scalable solutions for your corporate events. All packages are customizable to fit your specific needs.
      </p>
      <div class="packages-grid">
        <div class="package-card">
          <div class="package-badge essential">
            ESSENTIALS
          </div>
          <h3>Sound & Ambience</h3>
          <div class="package-price">$1,800</div>
          <p class="package-description">4 hours • Perfect for networking events or simple presentations</p>
          <ul class="package-features-list">
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Professional sound system for up to 150 guests
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Two wireless microphones (handheld or lavalier)
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Curated background music playlist
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Basic ambient uplighting
            </li>
          </ul>
        </div>
        <div class="package-card popular">
          <div class="package-badge popular">
            MOST POPULAR
          </div>
          <h3>Presentation & Party</h3>
          <div class="package-price">$3,500</div>
          <p class="package-description">6 hours • Ideal for holiday parties or awards nights</p>
          <ul class="package-features-list">
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              <strong>Everything in Sound & Ambience, plus:</strong>
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Enhanced sound system for up to 300 guests
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Professional DJ performance for celebration portion
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Intelligent dance floor lighting & effects
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Projector and screen for presentations
            </li>
          </ul>
        </div>
        <div class="package-card">
          <div class="package-badge luxury">
            FULL PRODUCTION
          </div>
          <h3>Brand Immersion</h3>
          <div class="package-price">$6,000+</div>
          <p class="package-description">Full Day • For product launches or major conferences</p>
          <ul class="package-features-list">
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              <strong>Everything in Presentation & Party, plus:</strong>
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Full-day technical support (up to 10 hours)
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Custom projection mapping with company branding
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Multiple lighting zones and advanced visual effects
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              Multi-speaker sound setup for large venues
            </li>
            <li class="package-feature-item">
              <span class="checkmark">✓</span>
              On-site consultation and venue walkthrough
            </li>
          </ul>
        </div>
      </div>
      <div class="all-packages-info">
        <p class="main-text">
          <strong>All packages include:</strong> Pre-event consultation, all necessary equipment, professional setup/teardown, and my 30+ years of event production experience.
        </p>
        <p class="small-text">
          <em>Travel included within the Haliburton region. Travel fees may apply for events in Muskoka or further afield. All prices are subject to HST.</em>
        </p>
      </div>
    </section>

    <section class="contact" id="contact">
      <h2>Book Your Corporate Event</h2>
      
      <div class="contact-intro-box">
        <h3>Let's Plan a Flawless Event</h3>
        <p>
          Ready to ensure your next corporate event is a success? Fill out the form with your event details, and I will provide a detailed quote within one business day.
        </p>
      </div>

      <div class="contact-card">
        <div class="contact-form-container">
          <?php if ($c_success): ?>
            <div style="background: #d4edda; color: #155724; padding: 2rem; border-radius: 10px; border: 1px solid #c3e6cb; text-align: center;">
              <h4 style="color: #155724; margin-bottom: 1rem;">Quote Request Sent!</h4>
              <p>Thank you for your inquiry. I will review your event details and provide a quote within one business day.</p>
            </div>
          <?php else: ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>#contact" method="POST" class="contact-form">
            <input type="hidden" name="form_type" value="corporate_contact">
            <input type="text" name="honeypot" style="display: none;">
            <?php if (!empty($c_status_msg)): ?>
              <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 10px; margin-bottom: 1rem; border: 1px solid #f5c6cb;">
                <?php echo $c_status_msg; ?>
              </div>
            <?php endif; ?>
            <div class="form-group">
              <label for="name" class="form-label">Contact Name</label>
              <input type="text" id="name" name="name" required placeholder="Your Name" class="form-input" value="<?php echo htmlspecialchars($c_name); ?>">
            </div>
             <div class="form-group">
              <label for="company" class="form-label">Company Name</label>
              <input type="text" id="company" name="company" required placeholder="Your Company" class="form-input" value="<?php echo htmlspecialchars($c_company); ?>">
            </div>
            <div class="form-group">
              <label for="email" class="form-label">Email</label>
              <input type="email" id="email" name="email" required placeholder="Your Email" class="form-input" value="<?php echo htmlspecialchars($c_email); ?>">
            </div>
            <div class="form-group">
              <label for="event-date" class="form-label">Event Date</label>
              <input type="date" id="event-date" name="event-date" required class="form-input" value="<?php echo htmlspecialchars($c_date); ?>">
            </div>
            <div class="form-group">
              <label for="message" class="form-label">Event Details</label>
              <textarea id="message" name="message" required placeholder="Tell me about your event: type, venue, number of guests, and required services." class="form-textarea"><?php echo htmlspecialchars($c_message); ?></textarea>
            </div>
            <button type="submit" class="form-submit-button">Request a Quote</button>
          </form>
          <?php endif; ?>
        </div>
        
        <div class="contact-map-container">
          <h4>Service Area</h4>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d184000.0000000001!2d-78.7!3d44.85!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cd5bdfd63c1a0f1%3A0x7a10b4e6b9e1b7e1!2sHaliburton%2C%20ON!5e0!3m2!1sen!2sca!4v9999999999999!5m2!1sen!2sca" width="100%" height="300" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <div class="map-info-box">
            <p><strong class="map-info-strong">Based in:</strong> Haliburton, Ontario</p>
            <p><strong class="map-info-strong">Serving:</strong> Minden, Kawartha Lakes & Muskoka</p>
            <p class="small-text">Your partner in northern event production.</p>
          </div>
        </div>
      </div>
      
      <p class="contact-cta">Ready to elevate your corporate event?<br><strong>Contact me today for a professional consultation!</strong></p>
    </section>

  </div>
  
  <?php include '../footer.php'; ?>

  <script src="../script.js"></script>
</body>
</html>
