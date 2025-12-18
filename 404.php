<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - Page Not Found | Jason Brain</title>
  <meta name="description" content="The page you were looking for could not be found.">
  <meta name="author" content="Jason Brain">
  <link rel="icon" type="image/png" href="/favicon.png">
  <link rel="apple-touch-icon" href="/favicon.png">
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-2RTGH4Z617"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-2RTGH4Z617');
  </script>
  <link rel="stylesheet" href="/styles.css">
  <style>
    .error-container {
      text-align: center;
      padding: 4rem 2rem;
      min-height: 60vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .error-container h1 {
      font-size: 5rem;
      color: var(--color-accent-purple);
      margin-bottom: 0;
    }
  </style>
</head>
<body>
  <?php include 'nav.html'; ?>

  <div class="container">
    <div class="error-container">
      <h1>404</h1>
      <h2>Page Not Found</h2>
      <p>Sorry, the page you are looking for does not exist or has been moved.</p>
      <a href="/" class="cta-button" style="margin-top: 2rem;">Return to Homepage</a>
    </div>
  </div>

  <?php include 'footer.html'; ?>
  <script src="/script.js"></script>
</body>
</html>