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

## Automated tests

The contact-form validation (`src/contact_validation.php`) is tested directly, without a browser, by plain PHP tests in `tests/`:

```bash
php tests/run.php
```

The runner prints `PASS`/`FAIL` for each test and exits with code `1` if any assertion fails. Covered cases include empty Name, invalid Email, empty Message, valid input accepted, trimming, and the 100/2000-character length limits.

## Continuous Integration

GitHub Actions runs `.github/workflows/ci.yml` on every push to `main`, `feature/**` and `bugfix/**` branches and on every pull request to `main`. It uses a free `ubuntu-latest` runner:

1. checks out the code and sets up PHP 8.3,
2. runs `php -l` on **every** `.php` file; any syntax error fails the run,
3. runs `php tests/run.php`; any failing test fails the run.

Run the same syntax check locally:

```bash
find . -name "*.php" -not -path "./vendor/*" -exec php -l {} \;
```

## Workflow

- Every change starts from a Jira issue, e.g. `POS-17`.
- Branch names contain the issue key: `feature/POS-17-form-validation`, `bugfix/POS-35-mobile-overflow`.
- Commit messages start with the key: `POS-17: Add server-side email validation`.
- Work is merged into `main` only through a reviewed pull request with passing CI.

### Jira ↔ GitHub integration

The repository is connected to the Jira project through the free **GitHub for Atlassian** app. Any branch, commit or pull request that contains a `POS-` key appears automatically in that issue's **Development** panel in Jira (for example, POS-17 lists its branch, commits and PR #6).
