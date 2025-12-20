<?php
// --- CONFIGURATION ---
// Load configuration from the root directory.
if (file_exists(__DIR__ . '/../config.php')) {
    require_once __DIR__ . '/../config.php';
} else {
    // Fallback for safety, though it should not be used in production.
    die('Configuration file not found. Please copy config-sample.php to config.php and fill in your details.');
}

// Initialize variables to hold form data and error messages
$name = $email = $phone = $service_interest = $message = "";
$form_message = "";
$form_message_class = "";
$form_submitted_successfully = false;

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST['honeypot'])) { // Check for honeypot
    // --- FORM SANITIZATION & VALIDATION ---
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $service_interest = strip_tags(trim($_POST["service-interest"]));
    $message = strip_tags(trim($_POST["message"]));

    // Basic validation
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set error message if validation fails
        $form_message = "Please fill out all required fields and provide a valid email address.";
        $form_message_class = "form-error";
    } else {
        // --- EMAIL SENDING LOGIC ---
        $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";

        // Subject of the email
        $subject = "New Contact Form Submission from jasonbrain.com";
        if (!empty($service_interest)) {
            $subject .= " - Interest: " . ucfirst(str_replace('-', ' ', $service_interest));
        }

        // Email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n";
        if (!empty($phone)) {
            $email_content .= "Phone: $phone\n";
        }
        if (!empty($service_interest)) {
            $email_content .= "Service Interest: " . ucfirst(str_replace('-', ' ', $service_interest)) . "\n";
        }
        $email_content .= "\nMessage:\n$message\n";

        // Email headers - More secure and better for deliverability
        $email_headers = "From: " . RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">\r\n";
        $email_headers .= "Reply-To: $name <$email>\r\n";
        $email_headers .= "Content-Type: text/plain; charset=utf-8";

        // Send the email
        // The mail() function's success depends on your server's configuration.
        // For local development with XAMPP/MAMP, you may need to configure sendmail.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Success: Set flag to true to show the thank you message
            $form_submitted_successfully = true;
        } else {
            // Failure
            $form_message = "Oops! Something went wrong and your message could not be sent. Please try again later.";
            $form_message_class = "form-error";
        }
    }
}

// Define page-specific metadata
$page_title = 'Contact | ' . SITE_NAME . ' - Creative Professional';
$page_description = 'Get in touch with Jason Brain for wedding DJ services, music production, web development, or corporate events.';

// Define Schema.org JSON-LD
$schema_data = [
    "@context" => "https://schema.org",
    "@type" => "ContactPage",
    "name" => "Contact " . SITE_NAME,
    "url" => SITE_URL . "/contact/",
    "mainEntityOfPage" => [
        "@type" => "WebPage",
        "@id" => SITE_URL . "/contact/"
    ],
    "description" => "Contact Jason Brain for professional inquiries about music production, DJ services, web development, and creative projects."
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
    <section class="contact" id="contact">
      <h2>Let's Create Something Amazing Together</h2>
      
      <div class="contact-intro-box">
        <h3>Ready to Start Your Project?</h3>
        <p>
          Whether you need a wedding DJ, music production, web development, or corporate event services, 
          I'm here to bring your vision to life. Fill out the form below to get started.
        </p>
      </div>

      <div class="contact-card">
        <?php if ($form_submitted_successfully): ?>
          <div class="form-success-container" style="text-align: center; padding: 3rem 1rem;">
            <div style="font-size: 4rem; color: var(--color-accent-purple);">✓</div>
            <h3 style="margin-top: 1rem;">Thank You!</h3>
            <p style="font-size: 1.1rem; margin-bottom: 2rem;">
              Your message has been sent successfully. I will get back to you shortly.
            </p>
            <a href="/" class="cta-button">Return to Homepage</a>
          </div>
        <?php else: ?>
          <div class="contact-form-container">
            <!-- The action attribute points to this page itself to process the form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contact-form">
              
              <?php if (!empty($form_message)): ?>
                <div class="form-message <?php echo $form_message_class; ?>">
                  <?php echo $form_message; ?>
                </div>
              <?php endif; ?>

              <!-- Honeypot field for spam protection -->
              <input type="text" name="honeypot" style="display:none">

              <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" required placeholder="Your Name" class="form-input" value="<?php echo htmlspecialchars($name); ?>">
              </div>
              <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" required placeholder="Your Email" class="form-input" value="<?php echo htmlspecialchars($email); ?>">
              </div>
              <div class="form-group">
                <label for="phone" class="form-label">Phone Number (Optional)</label>
                <input type="tel" id="phone" name="phone" placeholder="Your Phone Number" class="form-input" value="<?php echo htmlspecialchars($phone); ?>">
              </div>
              <div class="form-group">
                <label for="service-interest" class="form-label">Service Interest</label>
                <select id="service-interest" name="service-interest" class="form-input">
                  <option value="" <?php if ($service_interest == "") echo "selected"; ?>>Select Primary Interest</option>
                  <option value="wedding-dj" <?php if ($service_interest == "wedding-dj") echo "selected"; ?>>Wedding DJ Services</option>
                  <option value="music-production" <?php if ($service_interest == "music-production") echo "selected"; ?>>Music Production</option>
                  <option value="web-development" <?php if ($service_interest == "web-development") echo "selected"; ?>>Web Development</option>
                  <option value="corporate-events" <?php if ($service_interest == "corporate-events") echo "selected"; ?>>Corporate Events</option>
                  <option value="employment" <?php if ($service_interest == "employment") echo "selected"; ?>>Employment / Hiring Inquiry</option>
                  <option value="multiple" <?php if ($service_interest == "multiple") echo "selected"; ?>>Multiple Services</option>
                </select>
              </div>
              <div class="form-group">
                <label for="message" class="form-label">Project Details</label>
                <textarea id="message" name="message" required placeholder="Tell me about your project or event!" class="form-textarea"><?php echo htmlspecialchars($message); ?></textarea>
              </div>
              <button type="submit" class="form-submit-button">Send Message</button>
            </form>
          </div>
        <?php endif; ?>
      </div>
    </section>
  </div>

  <?php include '../footer.html'; ?>
  <script src="../script.js"></script>
</body>
</html>