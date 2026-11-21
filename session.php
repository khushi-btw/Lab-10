<?php
require_once 'includes/bootstrap.php';
$error = '';
$nameInput = '';
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET' && isset($_SESSION['username'], $_SESSION['start_time'])) {
    redirect('greeting.php');
}
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $nameInput = trim((string) ($_POST['username'] ?? ''));
    if ($nameInput === '') {
        $error = 'Enter your name to continue.';
    } elseif (strlen($nameInput) > 320) {
        $error = 'Please keep your name under 80 characters.';
    } else {
        session_regenerate_id(true);
        $_SESSION['username'] = $nameInput;
        $_SESSION['start_time'] = time();
        redirect('greeting.php');
    }
}
$pageTitle = 'Start Session';
$pageDesc = 'Enter your name to get started.';
require_once 'includes/header.php';
?>
<section class="surface main-surface single-surface">
    <div class="form-emblem" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21v-2a8 8 0 0 1 16 0v2"/></svg></div>
    <?php if ($error !== ''): ?><p class="form-error" role="alert"><?= e($error) ?></p><?php endif; ?>
    <form method="post" action="session.php" class="form-stack">
        <label for="username">Name</label>
        <input id="username" name="username" type="text" maxlength="80" autocomplete="name" placeholder="Your name" value="<?= e($nameInput) ?>" required>
        <button class="button button-primary" type="submit">Start Session <span aria-hidden="true">→</span></button>
    </form>
</section>
<?php require_once 'includes/footer.php'; ?>
