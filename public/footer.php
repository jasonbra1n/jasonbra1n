<footer>
  <p>© <span id="copyright-year"></span> <?php echo defined('SITE_NAME') ? SITE_NAME : 'Jason Brain'; ?> | <?php echo defined('SITE_TAGLINE') ? SITE_TAGLINE : 'Creative Professional'; ?></p>
  <p class="footer-italic-text">
    ΙΑΣΩΝ is the Greek origin of Jason, meaning healer. Jason Brain brings healing and joy through creative expression.
  </p>
  <?php if (defined('SOCIAL_GITHUB')): ?>
    <p style="margin-top: 0.5rem;"><a href="<?php echo SOCIAL_GITHUB; ?>" target="_blank" rel="noopener noreferrer" style="color: inherit;">GitHub Profile</a></p>
  <?php endif; ?>
  <div style="margin-top: 1.5rem;">
    <a href="https://deepmind.google/technologies/gemini/" target="_blank" rel="noopener noreferrer" title="Developed with Google Gemini">
      <img src="https://img.shields.io/badge/Developed%20with-Gemini-8146FF?style=for-the-badge&logo=google-gemini&logoColor=white" alt="Developed with Gemini" width="140" height="28" style="height: 28px; width: auto;">
    </a>
  </div>
</footer>

<button class="scroll-to-top" aria-label="Scroll to top">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
    <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z"/>
  </svg>
</button>