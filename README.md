# QuickPOS – Landing Page

A responsive, PHP-based marketing landing page for **QuickPOS**, a fictional Point of Sale (POS) system for small shops and restaurants.
Built for the CS4002 Fundamentals of Software Project Management semester project (FAST-NUCES, Chiniot-Faisalabad Campus).

> The deliverable is a landing page, not a complete POS application.

## Group

| | |
|---|---|
| **Group ID** | _[Group ID]_ |
| **Amna Sajjad** | 22F-3347 |
| **Ayesha Liaqat** | 22F-3400 |

- **Jira project:** QuickPOS (key `POS`): https://amnasajjadashraf.atlassian.net/jira/software/projects/POS/boards/2
- **Repository:** https://github.com/amnasajjad-786/QuickPOS

## Technologies

- PHP 8 (server-side rendering and contact-form validation, no database)
- HTML5, CSS3 (custom design system, no template) and a little vanilla JavaScript
- Jira Software (Scrum), GitHub (branches, pull requests, reviews) and GitHub Actions (CI)

## Run locally

Requirements: PHP 8.0 or newer.

```bash
git clone https://github.com/amnasajjad-786/QuickPOS.git
cd QuickPOS
php -S localhost:8000 -t public
```

Then open http://localhost:8000 in a browser.

## Workflow

- Every change starts from a Jira issue, e.g. `POS-17`.
- Branch names contain the issue key: `feature/POS-17-form-validation`, `bugfix/POS-35-mobile-overflow`.
- Commit messages start with the key: `POS-17: Add server-side email validation`.
- Work is merged into `main` only through a reviewed pull request with passing CI.
