const canvas = document.querySelector('.lights');
const ctx = canvas.getContext('2d');
const header = document.querySelector('header');
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

function lerp(a, b, t) { return a + (b - a) * t; }

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

window.addEventListener('resize', () => {
  canvas.width = header.clientWidth;
  canvas.height = header.clientHeight;
});

canvas.width = header.clientWidth;
canvas.height = header.clientHeight;
animate();

const scrollToTopBtn = document.querySelector('.scroll-to-top');
window.addEventListener('scroll', () => {
  if (window.scrollY > 100) scrollToTopBtn.style.display = 'block';
  else scrollToTopBtn.style.display = 'none';
});
scrollToTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

function selectPackage(selectedElement) {
  const packageCards = document.querySelectorAll('.package-card');
  packageCards.forEach(card => {
    card.classList.remove('popular');
  });
  selectedElement.classList.add('popular');
}

// Hamburger Menu
const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.nav-menu');

hamburger.addEventListener('click', () => {
  navMenu.classList.toggle('active');
});

// Navbar scroll behavior
let lastScrollTop = 0;
const topNav = document.querySelector('.top-nav');

window.addEventListener('scroll', () => {
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  if (scrollTop > lastScrollTop) {
    // Downscroll
    topNav.style.top = '-100px';
  } else {
    // Upscroll
    topNav.style.top = '0';
  }
  lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
});