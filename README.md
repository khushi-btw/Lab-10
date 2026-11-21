# Lab 10 — PHP Applications

A small PHP workspace with three independent applications and a responsive navy and teal interface. It uses core PHP, HTML and CSS, with no framework or external runtime dependency.

## Applications

1. **Session greeting** (`session.php`, `logout.php`) — submits a name into a PHP session, displays the greeting and session start time, then reports the elapsed duration and destroys the session on logout.
2. **Date and time** (`datetime.php`) — renders the current date, time and weekday from PHP's `date()` function. Refresh the page for a new server generated snapshot.
3. **Age access** (`age-check.php`) — validates a name and whole number age on the server, then welcomes visitors aged 18 or above and displays the not authorized message to younger visitors.

## Run locally

### PHP built-in server

Install PHP 8 or newer, open a terminal in this directory, and run:

```sh
php -S localhost:8000
```

Then visit <http://localhost:8000>.

### XAMPP

Copy this project folder into XAMPP's `htdocs` directory, start Apache in the XAMPP Control Panel, and open <http://localhost/lab10-php-web-applications/>.

## Structure

- `index.php` — landing page and application links
- `session.php`, `logout.php` — session greeting and logout duration
- `datetime.php` — server date and time
- `age-check.php` — server validated age check
- `includes/` — shared bootstrap, navigation and page footer
- `assets/css/style.css` — responsive visual system
- `assets/js/script.js` — legacy helper file (not required by the redesigned pages)

PHP's timezone is set in `includes/bootstrap.php`. Set it to your local timezone if needed.
