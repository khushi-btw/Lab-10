# LAB 10 — PHP Web Applications

> **BTech CSE | Web Programming | Lab 10**
>
> Three practical PHP applications built on a single cohesive platform with a custom design system.

---

## Applications

| # | Application | File |
|---|-------------|------|
| 01 | Session-Based Greeting & Logout | `session.php`, `logout.php` |
| 02 | Current Date, Time & Day | `datetime.php` |
| 03 | Age-Based Access Checker | `age-check.php` |

---

## Project Structure

```
lab10-php-web-applications/
│
├── index.php           ← Dashboard / Overview
├── session.php         ← App 01 – Session greeting (form + greeting view)
├── logout.php          ← App 01 – Logout & thank-you page
├── datetime.php        ← App 02 – Date, time & day
├── age-check.php       ← App 03 – Age-based access checker
├── health.php          ← Health-check endpoint (for Render/Docker)
│
├── includes/
│   ├── bootstrap.php   ← Session start, timezone, helper functions
│   ├── header.php      ← Shared HTML head, sidebar, topbar
│   └── footer.php      ← Closing tags, JS include
│
├── assets/
│   ├── css/style.css   ← Full custom design system (no Bootstrap/Tailwind)
│   └── js/script.js    ← Vanilla JS (sidebar toggle, minor UX only)
│
├── Dockerfile          ← PHP 8.2 + Apache image for Render deployment
├── docker/
│   └── entrypoint.sh   ← Sets Apache to listen on $PORT (Render requirement)
├── render.yaml         ← Render Blueprint (Docker web service, free plan)
└── .gitignore
```

---

## Running Locally

### Option A — PHP built-in server

```bash
# Requires PHP 8+ on your PATH
cd lab10-php-web-applications
php -S localhost:8000
```

Open <http://localhost:8000>

### Option B — Docker

```bash
docker build -t lab10-php .
docker run -p 8000:8080 -e PORT=8080 lab10-php
```

Open <http://localhost:8000>

---

## Deployment (Render)

1. Push this repository to GitHub.
2. Go to [render.com](https://render.com) → **New → Blueprint**.
3. Connect your GitHub repository.
4. Render reads `render.yaml` and creates the service automatically.
5. Wait for the build to complete; your app will be live at the provided URL.

The `health.php` endpoint (`/health.php`) is used by Render as the health-check URL.

---

## Technical Notes

- **PHP sessions** (`$_SESSION`) store the username and start timestamp in App 01.
- **`date()`** with `Asia/Kolkata` timezone generates all values in App 02.
- **Input validation** uses `ctype_digit()` and `trim()` — no database needed.
- **HTML escaping** uses `htmlspecialchars()` via the `e()` helper in `bootstrap.php`.
- **No frameworks** — PHP, HTML5, CSS3 and vanilla JS only.

---

## Author

BTech CSE Student | Web Programming Lab | 2026
