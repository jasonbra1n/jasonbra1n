<?php
// This file is displayed when maintenance mode is active.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Maintenance | <?php echo defined('SITE_NAME') ? SITE_NAME : 'Our Site'; ?></title>
    <style>
        body { text-align: center; padding: 100px 20px; font-family: Arial, sans-serif; background: #f4f7fa; color: #2c3e50; }
        h1 { font-size: 2.5rem; color: #8146ff; }
        article { display: block; text-align: center; max-width: 650px; margin: 0 auto; }
        p { font-size: 1.1rem; line-height: 1.6; }
    </style>
</head>
<body>
    <article>
        <h1>We&rsquo;ll be back soon!</h1>
        <div>
            <p>Sorry for the inconvenience, but we&rsquo;re performing some maintenance at the moment. We&rsquo;ll be back online shortly!</p>
            <p>&mdash; The Team</p>
        </div>
    </article>
</body>
</html>