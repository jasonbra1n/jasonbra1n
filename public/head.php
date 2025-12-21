<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($page_title) ? $page_title : SITE_NAME . ' | ' . SITE_TAGLINE; ?></title>
<meta name="description" content="<?php echo isset($page_description) ? $page_description : SITE_DESCRIPTION; ?>">
<meta name="keywords" content="<?php echo isset($page_keywords) ? $page_keywords : SITE_KEYWORDS; ?>">
<meta name="author" content="<?php echo defined('SITE_AUTHOR') ? SITE_AUTHOR : SITE_NAME; ?>">
<link rel="icon" type="image/png" href="<?php echo SITE_URL; ?>/favicon.png">
<link rel="apple-touch-icon" href="<?php echo SITE_URL; ?>/favicon.png">

<?php if (defined('ENVIRONMENT') && ENVIRONMENT === 'production'): ?>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0633259514526906" crossorigin="anonymous"></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2RTGH4Z617"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-2RTGH4Z617');
</script>
<?php endif; ?>

<link rel="stylesheet" href="<?php echo SITE_URL; ?>/styles.css">
<?php if (isset($extra_head)) echo $extra_head; ?>
<?php if (isset($schema_json)): ?>
<script type="application/ld+json">
  <?php echo $schema_json; ?>
</script>
<?php endif; ?>