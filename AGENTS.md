# Repository Guidelines

## Project Structure & Module Organization
- Marketing pages live at root (`index.html`, `about.html`, `pricing.html`, `contact.html`, etc.) and share nav/footer partials in `partials/`.
- `assets/` stores images; `styles.css` and `script.js` drive styling and interactivity (theme toggle, nav behavior).
- Campaign-specific landers in `campaigns/`; policy content in `legal/`; reference examples in `samples/`.
- Backend mail handler sits in `backend/` with `config.php`, `contact.php`, `utils.php`, `.htaccess`, and `vendor/` for PHPMailer.

## Build, Test, and Development Commands
- Restore PHP deps from `backend/`: `composer install`.
- Local serve static files: `php -S localhost:8080` (from repo root). Point forms to `/backend/contact.php`.
- Quick backend exercise: `curl -X POST http://localhost:8080/backend/contact.php -H "Origin: https://nexlink.website" -d "formType=contact&firstName=Test&lastName=User&email=test@example.com&serviceType=General&urgency=low&message=Hello"`.
- No bundler/minifier; keep assets plain CSS/JS unless adding tooling is discussed first.

## Coding Style & Naming Conventions
- HTML/CSS: 2-space indent; keep utility-class patterns consistent with existing partials; prefer semantic tags and accessible aria labels.
- JS: ES6 modules not used; keep functions camelCase, avoid globals leaking outside `script.js`, handle null checks for query selectors.
- PHP: 4-space indent, strict comparisons, early returns; reuse helpers in `utils.php`; keep `NEXLINK_BACKEND` guard at the top of entrypoints.

## Testing Guidelines
- No automated suite yet; add unit tests if expanding backend (PHPUnit acceptable). Minimum manual checks: load key pages, toggle theme, test nav hover menus, verify responsive layout.
- Backend: send both contact and support payloads; confirm 403 on disallowed origins, 400 on missing fields, 200 on valid data; watch `debug.log` when diagnosing.
- When changing validation rules, align `SUPPORT_FORM_FIELDS`/`CONTACT_FORM_FIELDS` and `MAX_MESSAGE_LENGTH` in `config.php`.

## Commit & Pull Request Guidelines
- Commit messages: concise, imperative summaries similar to existing history ("Remove legal link across pages", "Script & contact backend updates"). Keep to one focused topic per commit.
- PRs: describe scope, risk, and manual test steps; attach before/after screenshots for UI edits; link related issues or campaign briefs; call out CORS, SMTP, or config changes explicitly.

## Security & Configuration Tips
- Do not commit real SMTP credentials; prefer environment overrides or local `config.php` patches ignored by git.
- Update `ALLOWED_ORIGINS` when adding domains; avoid logging PII in production logs; keep `.htaccess` protections intact when moving the backend.
