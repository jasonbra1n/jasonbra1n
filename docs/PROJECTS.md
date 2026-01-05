# Project Showcase

This document provides a more detailed overview of the key projects developed and maintained by Jason Brain (jasonbra1n). These projects are also highlighted in the main [profile README](../README.md).

---

## 1. jasonbrain.com (Portfolio & CMS)

- **Links**: [Live Site](https://jasonbrain.com) | [Case Study](https://jasonbrain.com/web-developer/jasonbrain-project.php)
- **Repository**: This repository (`jasonbra1n/jasonbra1n`) serves as the public-facing hub. The backend CMS is developed in the private `BrainAV/core-cms` repository.
- **Description**: The personal portfolio website for Jason Brain, which also serves as the foundation for a custom-built Content Management System (CMS). The site showcases a blend of creative services and technical projects.

### Key Features & Architecture
- **Architecture**: The original site was built on a component-based PHP structure, utilizing server-side includes for modularity and maintainability. This architecture has since evolved into a more robust MVC (Model-View-Controller) pattern in the private `core-cms` repository.
- **Security**: Features self-hosted contact forms protected by a honeypot spam filter. All sensitive credentials (like database and API keys) are managed outside the web root in a `config.php` file, which is excluded from version control.
- **Performance**: Implements modern frontend performance techniques, including lazy-loading for off-screen images and an iframe facade pattern ("click-to-load") for heavy media players to optimize Core Web Vitals and initial page load times.
- **CMS**: The "jasonbra1n CMS" is a custom-built admin dashboard that allows for management of site settings (e.g., maintenance mode toggles, API keys), system diagnostics, and dynamic page content.

---

## 2. LAB: Digital Workshop

- **Links**: Live Site | Case Study
- **Repository**: (Currently private, may be open-sourced in the future)
- **Description**: An open-source creative sandbox and digital toolkit. It's designed as a single-page application to house a collection of useful web-based tools and experiments.

### Key Features & Architecture
- **Architecture**: A pure Single-Page Application (SPA) with a unique hybrid dual-loading system. Tools can be loaded either via direct DOM injection or through sandboxed iframes, providing flexibility and security.
- **Technology**: Built with pure, modern web technologies: HTML5, CSS3, and Vanilla JavaScript (ES6+), with no external frameworks or libraries.
- **UI/UX**: Features a "Glassmorphism" user interface with a modular toolset organized into five pillars: Work, Learn, Rest, Play, and Info. It also includes user-configurable dark and light modes for accessibility.

---

## 3. DJ Brain (AI DJ Co-Pilot)

- **Links**: Repository
- **Organization**: BrainAV
- **Description**: The flagship product of BrainAV, "The DJ Brain" is a "self-hosted" AI DJ Co-Pilot. It's designed to intelligently manage music queues for events, parties, and venues, acting as a smart assistant for a human DJ or running autonomously.

### Key Features & Architecture
- **Concept**: The system analyzes a music library and uses AI to make context-aware decisions, such as filling gaps in a playlist, transitioning between genres, and maintaining a specific energy level, all while allowing a human to "bring their own music" (BYOM).
- **Architecture**: A Dockerized stack ensures portability and easy deployment. It consists of a PHP Slim API for handling requests, a Python-based AI engine for the core logic, and a lightweight Vanilla JS frontend for the user interface.
- **Features**: Core features include multi-room audio support, BYOM (Bring Your Own Music) library integration, and intelligent, automated music selection.
- **Development Environment**: This project is being developed exclusively within Google's "Antigravity" coding environment, leveraging Gemini Code Assist for a Human-AI collaborative development process.

---

## 4. AI Co-Producer

- **Links**: Repository | Case Study
- **Organization**: BrainAV
- **Description**: An open-source AI assistant designed to integrate with Ableton Live. It functions as an "Executive Producer" inside the Digital Audio Workstation (DAW), allowing musicians to use natural language to compose, arrange, and generate musical ideas.

### Key Features & Architecture
- **Concept**: The AI Co-Producer listens to natural language commands (e.g., "create a four-bar drum loop with a house feel" or "write a sad chord progression in C minor") and translates them into actions within Ableton Live.
- **Technology**: The system uses a Python bridge to communicate with the DAW via the AbletonOSC protocol. It can leverage both local (Ollama) and cloud-based (Gemini) Large Language Models for inference, providing flexibility in processing power and privacy.