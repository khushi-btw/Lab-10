# Lab 10: PHP Applications

Three independent PHP applications with a shared, responsive dark plum, pink, and lavender interface. The project uses core PHP, HTML, and CSS without a framework or external runtime dependencies.

**Repository:** [khushi-btw/Lab-10](https://github.com/khushi-btw/Lab-10)

## Applications

1. **Session greeting** (`session.php`, `logout.php`) - Submit a name to start a PHP session. The greeting page shows the saved name and session start time. Logging out displays the elapsed duration and destroys the session.
2. **Date and time** (`datetime.php`) - PHP generates and displays the current date, time, and weekday using the configured timezone. Reload the page for a fresh server-side snapshot.
3. **Age-based access** (`age-check.php`) - Server-side validation checks a name and whole-number age. Visitors under 18 receive the not-authorized message; visitors aged 18 or above are welcomed.

## Run locally

### PHP built-in server

Install PHP 8 or newer, open a terminal in the project directory, and run:

```sh
php -S localhost:8000
```

Open <http://localhost:8000> in your browser.

### XAMPP

Copy the project folder into XAMPP's `htdocs` directory, start Apache from the XAMPP Control Panel, and open <http://localhost/lab10-php-web-applications/>.

## Project structure

- `index.php` - landing page with links to all three applications
- `session.php`, `logout.php` - session greeting and logout summary
- `datetime.php` - current date, time, and weekday
- `age-check.php` - age-based access check
- `includes/` - PHP bootstrap, shared navigation, and page footer
- `assets/css/style.css` - responsive visual design
- `assets/js/script.js` - retained legacy helper; the redesigned pages do not depend on it

The project timezone is configured in `includes/bootstrap.php`. Change it there if you need a different local timezone.
