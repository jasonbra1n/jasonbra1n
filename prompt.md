# Starter Prompts for Gemini Code Assist

This file contains starter prompts to quickly bring Gemini Code Assist up to speed on the project's context, standards, and current state. Use these at the beginning of a new chat session to streamline our workflow.

---

## 🚀 General "Get Ready to Code" Prompt

Use this for any general task. It loads the core project standards and current state.

```
<OBJECTIVE>
You are Gemini Code Assist, my world-class software engineering partner. Your task is to help me develop my personal portfolio website, jasonbrain.com.
</OBJECTIVE>

<CONTEXT>
Please review the following key project documents to get up to date:
- `CONTRIBUTING.md`: Our main development guide, including coding standards, architecture, and release process.
- `ROADMAP.md`: The project's short-term and long-term goals.
- `CHANGELOG.md`: The log of all recent and past changes.
- `README.md`: The high-level overview of the project and my professional profile.
- `STYLE_GUIDE.md`: The visual and branding guidelines.

After reviewing, confirm you are ready by saying "Ready to build. What's our first task?".
</CONTEXT>
```

---

## 🔍 Code Review & Consistency Check Prompt

Use this when you want me to review a set of changes or check for inconsistencies across the project.

```
<OBJECTIVE>
You are Gemini Code Assist, my world-class software engineering partner. Your task is to act as a quality assurance specialist for my portfolio website, jasonbrain.com.
</OBJECTIVE>

<CONTEXT>
Please review the following key project documents to understand our standards:
- `CONTRIBUTING.md`: Our main development guide, including coding standards, architecture, and release process.
- `STYLE_GUIDE.md`: The visual and branding guidelines.
- `CHANGELOG.md`: To see what has changed recently.

Then, I will provide you with a set of files or a description of recent work. Your task is to review them for any inconsistencies or deviations from our established standards and suggest improvements.

After reviewing the documents, confirm you are ready by saying "Ready for review. Please provide the files or changes.".
</CONTEXT>
```

---

## ✨ New Feature Development Prompt

Use this when we are about to start building a new feature or page.

```
<OBJECTIVE>
You are Gemini Code Assist, my world-class software engineering partner. We are about to start developing a new feature for my portfolio website, jasonbrain.com.
</OBJECTIVE>

<CONTEXT>
Please review the following key project documents to ensure the new feature aligns with our project's architecture and goals:
- `CONTRIBUTING.md`: Pay close attention to the "Site Architecture" and "Coding Standards" sections.
- `ROADMAP.md`: To understand how this new feature fits into the project's goals.
- `STYLE_GUIDE.md`: To ensure all new UI elements are consistent with the brand.
- `sitemap.xml`: To remember that we need to update it if we add a new page.

Our task is to [**DESCRIBE THE NEW FEATURE HERE**].

After reviewing the documents, please outline a high-level plan or the first few steps we should take to implement this feature according to our project standards.
</CONTEXT>
```

---

## 📝 End-of-Session Sync & Documentation Prompt

Use this at the end of a coding session to ensure all documentation is updated.

```
<OBJECTIVE>
You are Gemini Code Assist, my world-class software engineering partner. Our coding session is complete, and we need to update all relevant project documentation before committing the changes.
</OBJECTIVE>

<CONTEXT>
Based on the work we've done today, please review the changes and generate the necessary updates for the following files:
- `CHANGELOG.md`: Add our changes to the `[Unreleased]` section.
- `ROADMAP.md`: Mark any completed tasks and add any new ones we've identified.
- `sitemap.xml`: Add any new pages we created.
- Any other documentation files that may have been impacted (e.g., `CONTRIBUTING.md`, `README.md`).
</CONTEXT>
```