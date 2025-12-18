<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resume | Jason Brain - Creative Professional & Technologist</title>
  <meta name="description" content="Resume of Jason Brain: Creative Professional and Technologist. Leveraging a background in Systems Analysis and Programming for multimedia and event innovation.">
  <meta name="author" content="Jason Brain">
  <link rel="icon" type="image/png" href="../favicon.png">
  <link rel="apple-touch-icon" href="../favicon.png">
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-2RTGH4Z617"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-2RTGH4Z617');
  </script>
  <link rel="stylesheet" href="../styles.css">
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfilePage",
      "mainEntity": {
        "@type": "Person",
        "name": "Jason Brain",
        "url": "https://jasonbrain.com/resume/",
        "jobTitle": "Creative Professional",
        "alumniOf": "Fleming College",
        "knowsAbout": ["Computer Programming", "Systems Analysis", "Project Management", "Hardware Assembly"]
      }
    }
  </script>
  <style>
    /* Resume Specific Styles */
    .resume-header-block { 
      display: flex; 
      justify-content: space-between; 
      align-items: flex-end; 
      margin-bottom: 3rem; 
      border-bottom: 3px solid var(--color-accent-purple); 
      padding-bottom: 1.5rem; 
      text-align: left;
    }
    .header-left { flex: 1; }
    .header-right { text-align: right; display: flex; flex-direction: column; align-items: flex-end; gap: 0.5rem; }
    
    .resume-header-block h1 { font-size: 3.5rem; color: var(--color-primary-bg); margin-bottom: 0.2rem; line-height: 1; }
    .resume-header-block .subtitle { font-size: 1.3rem; color: var(--color-text-medium); font-weight: 600; margin-bottom: 0.5rem; }
    .resume-header-block .contact-info { font-size: 1rem; color: var(--color-text-dark); }
    .resume-header-block .contact-info a { color: var(--color-accent-purple); text-decoration: none; font-weight: bold; margin-left: 1rem; }
    
    .resume-section { margin-bottom: 3rem; }
    .resume-section-title { 
      font-size: 1.8rem; 
      color: var(--color-primary-bg); 
      border-left: 5px solid var(--color-accent-coral); 
      padding-left: 1rem; 
      margin-bottom: 1.5rem; 
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    .resume-item { margin-bottom: 2rem; page-break-inside: avoid; }
    .resume-item h3 { font-size: 1.4rem; margin-bottom: 0.2rem; color: var(--color-text-dark); }
    .resume-item .meta { font-style: italic; color: var(--color-text-medium); display: block; margin-bottom: 0.8rem; font-weight: 500; }
    .resume-item ul { list-style-type: none; padding-left: 0; }
    .resume-item li { 
      margin-bottom: 0.5rem; 
      padding-left: 1.5rem; 
      position: relative; 
      line-height: 1.6;
    }
    .resume-item li::before {
      content: "•";
      color: var(--color-accent-purple);
      font-weight: bold;
      position: absolute;
      left: 0;
    }

    .skills-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 1rem; }
    .skill-tag { 
      background: var(--color-neutral-light-gray); 
      border: 1px solid #e0e0e0; 
      padding: 0.8rem; 
      text-align: center; 
      border-radius: 8px; 
      font-weight: 600; 
      color: var(--color-primary-bg); 
      transition: transform 0.2s, border-color 0.2s;
    }
    .skill-tag:hover {
      transform: translateY(-2px);
      border-color: var(--color-accent-purple);
    }

    @media print {
      .top-nav, footer, .cta-button, .no-print { display: none !important; }
      .container { box-shadow: none; margin: 0; padding: 0; max-width: 100%; border: none; }
      body { background: white; color: black; }
      a { text-decoration: none; color: black; }
      .resume-header-block { border-bottom-color: #000; }
      .resume-section-title { border-left-color: #000; color: #000; }
      .skill-tag { border: 1px solid #ccc; color: #000; }
      .resume-item li::before { color: #000; }
      .header-right { text-align: right !important; }
    }
    
    @media (max-width: 768px) {
      .resume-header-block { flex-direction: column; align-items: flex-start; gap: 1.5rem; }
      .header-right { text-align: left; align-items: flex-start; width: 100%; }
      .resume-header-block .contact-info a { margin-left: 0; margin-right: 1rem; display: inline-block; }
    }
  </style>
</head>
<body>
  <div class="no-print">
    <?php include '../nav.html'; ?>
  </div>

  <div class="container">
    <div class="resume-header-block">
      <div class="header-left">
        <h1>Jason Brain</h1>
        <div class="subtitle">Creative Professional • Multimedia Producer • Technologist</div>
        <div class="contact-info">
          Haliburton, Ontario
        </div>
      </div>
      <div class="header-right">
        <div class="contact-info">
          <a href="https://jasonbrain.com">jasonbrain.com</a>
          <a href="/contact/">Contact Me</a>
        </div>
        <div class="no-print">
          <button onclick="window.print()" class="cta-button" style="font-size: 0.8rem; padding: 0.4rem 1rem;">Print / Save PDF</button>
        </div>
      </div>
    </div>

    <section class="resume-section">
      <h2 class="resume-section-title">Professional Profile</h2>
      <p style="line-height: 1.8; font-size: 1.1rem;">
        Dynamic <strong>Creative Professional</strong> with a strong technical foundation. I leverage my <strong>3-year diploma in Computer Programming & Systems Analysis</strong> and decades of entrepreneurial experience to deliver innovative multimedia, web, and event solutions.
      </p>
      <p style="line-height: 1.8; font-size: 1.1rem; margin-top: 1rem;">
        I bridge the gap between art and engineering. My technical background (MCP, Hardware Specialist) allows me to build, customize, and optimize the tools I use, while my creative experience drives the vision. Seeking employment where I can apply this unique hybrid skillset to creative production, technical direction, or multimedia project management.
      </p>
    </section>

    <section class="resume-section">
      <h2 class="resume-section-title">Education & Certifications</h2>
      
      <div class="resume-item">
        <h3>Computer Programmer & Systems Analyst</h3>
        <span class="meta">Fleming College | 3-Year Diploma Program</span>
        <ul>
          <li><strong>Graduated with Honors.</strong></li>
          <li><strong>Director of Student Representation:</strong> Elected to Student Council to advocate for the student body and manage organizational governance.</li>
          <li>Comprehensive training in the Software Development Lifecycle (SDLC), database design, and systems analysis.</li>
          <li>Specialized in Object-Oriented Programming (OOP) and enterprise application development.</li>
        </ul>
      </div>

      <div class="resume-item">
        <h3>Project Management (Business & Information Technologies)</h3>
        <span class="meta">Global Knowledge / Nexient Learning</span>
        <ul>
          <li>Mastered methodologies for managing IT projects, resource allocation, and timeline management.</li>
          <li>Focused on risk management, business requirement analysis, and stakeholder communication.</li>
        </ul>
      </div>

      <div class="resume-item">
        <h3>Microsoft Certified Professional (MCP)</h3>
        <span class="meta">Microsoft Certification</span>
        <ul>
          <li>Validated expertise in Microsoft systems, server administration, and technical troubleshooting.</li>
        </ul>
      </div>
    </section>

    <section class="resume-section">
      <h2 class="resume-section-title">Technical Skills</h2>
      <div class="resume-item">
        <h3>Creative & Production Tech</h3>
        <div class="skills-grid">
          <div class="skill-tag">Resolume Arena</div>
          <div class="skill-tag">Ableton Live</div>
          <div class="skill-tag">Serato DJ Pro</div>
          <div class="skill-tag">3D Printing / CAD</div>
          <div class="skill-tag">Laser Engraving</div>
        </div>
      </div>
      <div class="resume-item">
        <h3>Web & Software Development</h3>
        <div class="skills-grid">
          <div class="skill-tag">PHP / MySQL</div>
          <div class="skill-tag">JavaScript (ES6+)</div>
          <div class="skill-tag">HTML5 / CSS3</div>
          <div class="skill-tag">Python</div>
          <div class="skill-tag">Git / GitHub</div>
        </div>
      </div>
      <div class="resume-item">
        <h3>Hardware & Systems Integration</h3>
        <div class="skills-grid">
          <div class="skill-tag">Hardware Assembly</div>
          <div class="skill-tag">Klipper / Fluidd</div>
          <div class="skill-tag">IoT / Arduino / ESP32</div>
          <div class="skill-tag">Home Assistant</div>
          <div class="skill-tag">Systems Analysis</div>
        </div>
      </div>
    </section>

    <section class="resume-section">
      <h2 class="resume-section-title">Professional Experience</h2>
      
      <div class="resume-item">
        <h3>Owner / Operator & Lead Technologist</h3>
        <span class="meta">Jason Brain Productions | 2009 - Present</span>
        <p><em>Transitioned from corporate IT to entrepreneurship after a referral from a former Student Council President launched a successful 15-year career in event production and web development.</em></p>
        <ul>
          <li><strong>Continuous Technical Evolution:</strong> Maintained cutting-edge proficiency, evolving from early web tools to modern workflows using <strong>VS Code, GitHub, and AI assistants (Gemini)</strong>.</li>
          <li><strong>Creative Technology:</strong> Expert user of complex audio-visual software including <strong>Resolume Arena</strong> (Projection Mapping), <strong>Ableton Live</strong>, and <strong>Serato DJ Pro</strong>.</li>
          <li><strong>Business Management:</strong> Successfully executed thousands of time-critical events (weddings, corporate functions) based on a reputation built from a referral by a former Student Council President.</li>
          <li><strong>Web Development:</strong> Designed, hosted, and maintained websites for clients and personal projects, adapting to changing web standards over 15 years.</li>
        </ul>
      </div>

      <div class="resume-item">
        <h3>Systems Administrator</h3>
        <span class="meta">Telnet Communications</span>
        <ul>
          <li>Managed ISP and Telco infrastructure in a high-pressure, fast-paced environment.</li>
          <li>Responsible for system uptime, troubleshooting complex network issues, and server administration during a period of rapid organizational change.</li>
        </ul>
      </div>

      <div class="resume-item">
        <h3>Information Systems Manager & Special Projects</h3>
        <span class="meta">Great Blue Heron Casino</span>
        <ul>
          <li>Managed the Information Systems Department, overseeing critical gaming and business infrastructure.</li>
          <li>Led special technical projects to improve operational efficiency and security in a highly regulated environment.</li>
        </ul>
      </div>

      <div class="resume-item">
        <h3>Bilingual Technical Support Specialist (Apple Care)</h3>
        <span class="meta">Minacs</span>
        <ul>
          <li>Provided bilingual (English/French) hardware and software support for Apple products.</li>
          <li>Diagnosed and resolved complex technical issues for end-users with high customer satisfaction ratings.</li>
        </ul>
      </div>

      <div class="resume-item">
        <h3>Early Career & Education Funding</h3>
        <span class="meta">General Motors | Canadian Tire | Campus DJ</span>
        <ul>
          <li><strong>General Motors:</strong> Worked on the truck assembly line during college summers, developing a strong work ethic and understanding of manufacturing processes.</li>
          <li><strong>Canadian Tire:</strong> Parts Counter service, developing inventory management skills and customer service fundamentals.</li>
          <li><strong>Campus & Pub DJ:</strong> Resident DJ at college pubs and local bars in Peterborough while completing diploma with Honors.</li>
        </ul>
      </div>
    </section>

    <section class="resume-section">
      <h2 class="resume-section-title">Applied Technology & Hardware Projects</h2>
      
      <div class="resume-item">
        <h3>3D Printing & Additive Manufacturing</h3>
        <span class="meta">Independent Project | 2020 - Present</span>
        <ul>
          <li><strong>Systems Integration:</strong> Integrated Raspberry Pi microcontrollers with Creality Ender 3/CR printers to run <strong>Klipper</strong> firmware and <strong>Fluidd</strong> interface, enabling high-precision printing and remote management.</li>
          <li><strong>Design & Fabrication:</strong> 3D modeling using <strong>Tinkercad</strong> and print preparation with <strong>Ultimaker Cura</strong>. Experience with PLA, TPU, and engineering materials (PETG, ASA).</li>
          <li><strong>R&D:</strong> Currently integrating and testing 10W diode laser engraving systems.</li>
        </ul>
      </div>
    </section>
    
    <div class="no-print" style="text-align: center; margin-top: 4rem; border-top: 1px solid #eee; padding-top: 2rem;">
      <p>References available upon request.</p>
      <a href="/contact/" class="cta-button">Contact Me for Interviews</a>
    </div>

  </div>

  <div class="no-print">
    <?php include '../footer.html'; ?>
  </div>
  <script src="../script.js"></script>
</body>
</html>