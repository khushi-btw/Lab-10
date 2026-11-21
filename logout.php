<?php
require_once 'includes/bootstrap.php';
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST' || !isset($_SESSION['username'], $_SESSION['start_time'])) {
    redirect('session.php');
}
$username = (string) $_SESSION['username'];
$start = (int) $_SESSION['start_time'];
$end = time();
$duration = max(0, $end - $start);
$durationText = format_duration($duration);
$_SESSION = [];
if (ini_get('session.use_cookies')) {
    $cookie = session_get_cookie_params();
    setcookie(session_name(), '', ['expires' => time() - 42000, 'path' => $cookie['path'], 'domain' => $cookie['domain'], 'secure' => $cookie['secure'], 'httponly' => $cookie['httponly'], 'samesite' => $cookie['samesite'] ?? 'Lax']);
}
session_destroy();
$pageTitle = 'Thank You, ' . $username . '!';
require_once 'includes/header.php';
?>
<section class="surface goodbye-surface">
    <span class="success-mark" aria-hidden="true">✓</span>
    <p class="goodbye-copy">Your session lasted</p>
    <p class="duration-value"><?= e($durationText) ?></p>
    <a class="button button-primary" href="session.php">Start again <span aria-hidden="true">→</span></a>
</section>
<?php require_once 'includes/footer.php'; ?>
