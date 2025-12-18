/**
 * Attaches event listeners to the navigation elements (hamburger, dropdowns, smooth scroll).
 * This needs to be called after the navigation is dynamically loaded.
 */
function initializeNavEventListeners(rootPath) {
  // Hamburger Menu
  const hamburger = document.querySelector('.hamburger');
  const navMenu = document.querySelector('.nav-menu');

  if (hamburger && navMenu) {
    hamburger.addEventListener('click', () => {
      navMenu.classList.toggle('active');
    });
  }

  // Smooth scrolling for nav menu
  document.querySelectorAll('.nav-menu a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      
      // Check for internal anchor links
      if (href.startsWith('/#') && href.length > 2) {
        e.preventDefault();
        const targetId = href.substring(href.indexOf('#'));
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          targetElement.scrollIntoView({ behavior: 'smooth' });
        }
      }
      // Close hamburger menu on link click
      if (navMenu.classList.contains('active')) {
        navMenu.classList.remove('active');
      }
    });
  });

  // Navbar scroll behavior
  let lastScrollTop = 0;
  const topNav = document.querySelector('.top-nav');
  if (topNav) {
    window.addEventListener('scroll', () => {
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      if (scrollTop > lastScrollTop && scrollTop > topNav.offsetHeight) {
        // Downscroll
        topNav.style.top = '-100px';
      } else {
        // Upscroll
        topNav.style.top = '0';
      }
      lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
    });
  } 
}

// Function to handle package selection
function selectPackage(selectedElement) {
  const packageCards = document.querySelectorAll('.package-card');
  packageCards.forEach(card => {
    card.classList.remove('popular'); // Remove 'popular' class from all cards
  });
  selectedElement.classList.add('popular'); // Add 'popular' class to the clicked card
}

// Dynamic Copyright Year
const copyrightYear = document.getElementById('copyright-year');
if (copyrightYear) copyrightYear.textContent = new Date().getFullYear();


// Main script execution after the DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  
  // Dynamic Copyright Year
  const copyrightYearEl = document.getElementById('copyright-year');
  if (copyrightYearEl) copyrightYearEl.textContent = new Date().getFullYear();

  // Add accessible event listeners for package selection and other clickable cards
  const clickableCards = document.querySelectorAll('.package-card, .venue-card');
  if (clickableCards.length > 0) {
    clickableCards.forEach(card => {
      // Make the card focusable and announce it as a button
      card.setAttribute('role', 'button');
      card.setAttribute('tabindex', '0');

      // Add keyboard interaction for 'Enter' and 'Space'
      card.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
          event.preventDefault(); // Prevent space from scrolling the page
          card.click(); // Trigger the existing click behavior
        }
      });
    });
  }
  // Attach event listener specifically for package selection logic
  document.querySelectorAll('.package-card').forEach(card => card.addEventListener('click', () => selectPackage(card)));

  // Iframe lazy-loading
  const placeholders = document.querySelectorAll('.iframe-placeholder');
  placeholders.forEach(placeholder => {
    placeholder.addEventListener('click', () => {
      const iframe = document.createElement('iframe');
      iframe.src = placeholder.dataset.src;
      iframe.setAttribute('frameborder', '0');
      iframe.setAttribute('allowtransparency', 'true');
      iframe.setAttribute('allow', 'autoplay');
      iframe.width = '100%';
      iframe.height = '150';
      iframe.style.borderRadius = '10px';
      placeholder.parentNode.replaceChild(iframe, placeholder);
    });
  });

  // Scroll to Top Button
  const scrollToTopBtn = document.querySelector('.scroll-to-top');
  if (scrollToTopBtn) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 100) {
        scrollToTopBtn.classList.add('visible');
      } else {
        scrollToTopBtn.classList.remove('visible');
      }
    });
    scrollToTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
  }

  // Header Canvas Animation (only if canvas exists)
  const canvas = document.querySelector('.lights');
  const header = document.querySelector('header');
  if (canvas && header) {
    const ctx = canvas.getContext('2d');
    const ctaButton = document.querySelector('.cta-button');

    let centerX = header.clientWidth * (0.2 + Math.random() * 0.6);
    let centerY = header.clientHeight * (0.2 + Math.random() * 0.6);
    let targetX = centerX;
    let targetY = centerY;

    const lights = [];
    const ripples = [];
    const stars = [];
    const colors = ['#ff0000', '#00ff00', '#0000ff', '#ff00ff', '#00ffff', '#ffff00'];
    for (let i = 0; i < 50; i++) {
      const radius = Math.random() * header.clientWidth;
      const angle = Math.random() * Math.PI * 2;
      const speed = (Math.random() * 0.002 + 0.001) * (Math.random() < 0.5 ? 1 : -1);
      lights.push({ radius, angle, color: colors[Math.floor(Math.random() * colors.length)], opacity: Math.random() * 0.5 + 0.3, speed, trail: [] });
    }
    for (let i = 0; i < 100; i++) {
      stars.push({ x: Math.random() * header.clientWidth, y: Math.random() * header.clientHeight, size: Math.random() * 2 + 1, opacity: Math.random() * 0.6 + 0.2 });
    }

    function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.fillStyle = 'rgba(255, 255, 255, 0.1)';
      ctx.fillRect(0, 0, canvas.width, canvas.height);

      stars.forEach(star => {
        const twinkle = (Math.sin(Date.now() * 0.001 + star.x + star.y) + 1) / 2;
        const starOpacity = star.opacity * twinkle;
        ctx.beginPath(); ctx.arc(star.x, star.y, star.size, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(255, 255, 255, ' + starOpacity + ')'; ctx.fill();
      });

      ripples.forEach((ripple, index) => {
        ripple.radius += 2;
        ripple.opacity -= 0.002;
        const maxRadius = Math.sqrt(header.clientWidth * header.clientWidth + header.clientHeight * header.clientHeight);
        if (ripple.opacity <= 0 || ripple.radius > maxRadius) { ripples.splice(index, 1); return; }
        ctx.beginPath(); ctx.arc(ripple.x, ripple.y, ripple.radius, 0, Math.PI * 2);
        ctx.strokeStyle = 'rgba(255, 255, 255, ' + ripple.opacity + ')'; ctx.lineWidth = 2;
        ctx.globalAlpha = ripple.opacity; ctx.stroke();
      });

      const dx = targetX - centerX;
      const dy = targetY - centerY;
      const distance = Math.sqrt(dx * dx + dy * dy);
      const maxSpeed = 2;
      if (distance > 0) {
        const speed = Math.min(maxSpeed, distance * 0.05);
        centerX += (dx / distance) * speed;
        centerY += (dy / distance) * speed;
      }

      lights.forEach(light => {
        light.angle += light.speed;
        const x = centerX + light.radius * Math.cos(light.angle);
        const y = centerY + light.radius * Math.sin(light.angle);
        light.trail.push({ x, y }); if (light.trail.length > 10) light.trail.shift();

        for (let i = 0; i < light.trail.length; i++) {
          const pos = light.trail[i];
          const trailOpacity = i / (light.trail.length - 1) * light.opacity;
          ctx.beginPath(); ctx.arc(pos.x, pos.y, 3, 0, Math.PI * 2);
          ctx.fillStyle = light.color; ctx.globalAlpha = trailOpacity; ctx.fill();
        }

        ctx.beginPath(); ctx.arc(x, y, 3, 0, Math.PI * 2);
        ctx.fillStyle = light.color; ctx.globalAlpha = light.opacity; ctx.fill();
        light.opacity += Math.sin(Date.now() * light.speed / 1000) * 0.02;
        if (light.opacity < 0.3) light.opacity = 0.3; if (light.opacity > 0.8) light.opacity = 0.8;
      });

      ctx.globalAlpha = 1;
      requestAnimationFrame(animate);
    }

    header.addEventListener('mousemove', (event) => {
      const rect = header.getBoundingClientRect();
      targetX = event.clientX - rect.left;
      targetY = event.clientY - rect.top;
    });

    header.addEventListener('mousedown', (event) => {
      const rect = header.getBoundingClientRect();
      const x = event.clientX - rect.left;
      const y = event.clientY - rect.top;
      // Only trigger ripple if not clicking the button
      if (ctaButton && !ctaButton.contains(event.target)) {
        ripples.push({ x, y, radius: 10, opacity: 1 });
      }
    });

    header.addEventListener('touchstart', (event) => {
      // Do not prevent default to allow button taps
      const touch = event.touches[0];
      const rect = header.getBoundingClientRect();
      const x = touch.clientX - rect.left;
      const y = touch.clientY - rect.top;
      // Only trigger ripple if not tapping the button
      if (ctaButton && !ctaButton.contains(event.target)) {
        ripples.push({ x, y, radius: 10, opacity: 1 });
      }
    });

    canvas.width = header.clientWidth;
    canvas.height = header.clientHeight;
    animate();
  }
});
