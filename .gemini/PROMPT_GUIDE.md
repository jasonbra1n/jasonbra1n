# Starter Prompts for Gemini Code Assist

This file contains starter prompts to quickly bring Gemini Code Assist up to speed on the project's context, standards, and current state. Use these at the beginning of a new chat session to streamline our workflow.

---

## ⚡ Quick Sync Prompt

Use this one-liner to quickly load context at the start of a session.

```
Please read all the project context files (`.gemini/prompt.md`, `.github/ROADMAP.md`, `.github/CONTRIBUTING.md`, etc.) to get in sync with the current state of the project.
```

---

## 2. Feature Development & Ideation

*Use these for adding new features or working on existing ones.*

- "Let's implement the '[Feature Name]' feature from the roadmap."
- "I have an idea for a new feature: '[Brief feature description]'. Please add it as a '[To Do]' item to the roadmap."

---

## 3. Bug Fixes

*Use these to report and fix bugs.*

- "I've found a bug: [Describe the bug, including steps to reproduce]. Please add it to the roadmap as a high-priority fix, and then let's start working on it."
- "Let's work on fixing the '[Bug Name]' bug from the roadmap."

---

## 4. Documentation & Housekeeping

*Use these for keeping project documentation up to date.*

- "Please update the `CHANGELOG.md` to reflect the recent changes we've made."
- "Review the `README.md` for correctness, clarity, and to ensure all links are working."
- "Let's review all the documentation files (`.github/*`, `README.md`) to ensure they are consistent and up-to-date."

---

## 5. Release & Deployment

*Use these prompts to version and release the project.*

- "Let's release version vX.X.X. Please update the `CHANGELOG.md` by moving the `[Unreleased]` items to a new `[vX.X.X] - YYYY-MM-DD` section and creating a new empty `[Unreleased]` section."