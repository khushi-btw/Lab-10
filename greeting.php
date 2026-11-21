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
    <form method="post" action="logout.php" class="logout-form"><button class="button button-outline" type="submit">Logout <span aria-hidden="true">↗</span></button></form>
</section>
<?php require_once 'includes/footer.php'; ?>
