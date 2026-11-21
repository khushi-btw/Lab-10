<?php
require_once 'includes/bootstrap.php';
if (!isset($_SESSION['username'], $_SESSION['start_time'])) {
    redirect('session.php');
}
$username = (string) $_SESSION['username'];
$pageTitle = 'Hello, ' . $username . '!';
$showSessionStart = true;
require_once 'includes/header.php';
?>
<section class="surface main-surface single-surface greeting-surface">
    <div class="welcome-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v3m0 12v3m9-9h-3M6 12H3m15.36-6.36-2.12 2.12M7.76 16.24l-2.12 2.12m12.72 0-2.12-2.12M7.76 7.76 5.64 5.64"/><circle cx="12" cy="12" r="4"/></svg></div>
    <p>We're glad you're here.</p>
    <form method="post" action="logout.php" class="logout-form"><button class="button button-outline" type="submit">Logout <span aria-hidden="true">↗</span></button></form>
</section>
<?php require_once 'includes/footer.php'; ?>
