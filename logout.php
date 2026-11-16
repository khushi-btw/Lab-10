<?php
/**
 * logout.php — Application 01: Logout & Thank-You Page
 * LAB 10 — PHP Workspace
 *
 * Calculates session duration, destroys the session and shows a
 * thank-you message with the usage duration.
 */
require_once 'includes/bootstrap.php';

/* ------------------------------------------------------------------ */
/* Guard: redirect to session.php if no active session                  */
/* ------------------------------------------------------------------ */
if (empty($_SESSION['username'])) {
    redirect('session.php');
}

/* ------------------------------------------------------------------ */
/* Capture data BEFORE destroying the session                           */
/* ------------------------------------------------------------------ */
$username  = $_SESSION['username'];
$startTime = $_SESSION['start_time'];
$endTime   = time();
$duration  = max(0, $endTime - $startTime); // in seconds

$durationFormatted = format_duration($duration);
$formattedEnd      = date('d M Y, h:i:s A', $endTime);
$formattedStart    = date('d M Y, h:i:s A', $startTime);

/* ------------------------------------------------------------------ */
/* Destroy the session cleanly                                           */
/* ------------------------------------------------------------------ */
$_SESSION = [];
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}
session_destroy();

/* ------------------------------------------------------------------ */
/* Render                                                               */
/* ------------------------------------------------------------------ */
$pageTitle = 'Goodbye, ' . e($username);
$pageDesc  = 'Application 01 — Session Ended';

require_once 'includes/header.php';
?>

<div style="max-width:580px; margin:0 auto;">

    <div class="card goodbye-card">

        <!-- Icon -->
        <div class="goodbye-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
        </div>

        <!-- Heading -->
        <h2>Thank you, <?= e($username) ?>!</h2>
        <p>Your session has ended and all session data has been cleared from the server.</p>

        <!-- Duration badge -->
        <div class="duration-badge">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
            </svg>
            Session duration: <strong><?= e($durationFormatted) ?></strong>
        </div>

        <!-- Detail stat grid -->
        <div class="stat-grid" style="margin-top:0;text-align:left;">
            <div class="stat-panel blue">
                <div class="stat-label">Session Started</div>
                <div class="stat-value" style="font-size:14px;font-weight:600"><?= e($formattedStart) ?></div>
            </div>
            <div class="stat-panel orange">
                <div class="stat-label">Session Ended</div>
                <div class="stat-value" style="font-size:14px;font-weight:600"><?= e($formattedEnd) ?></div>
            </div>
            <div class="stat-panel green">
                <div class="stat-label">Total Duration</div>
                <div class="stat-value" style="font-size:18px"><?= e($durationFormatted) ?></div>
                <div class="stat-sub"><?= e($duration) ?> seconds total</div>
            </div>
        </div>

        <!-- CTA -->
        <div class="mt-32 flex gap-16" style="justify-content:center;flex-wrap:wrap;">
            <a href="session.php" class="btn btn-primary">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                    <polyline points="10 17 15 12 10 7"/>
                    <line x1="15" y1="12" x2="3" y2="12"/>
                </svg>
                Sign in again
            </a>
            <a href="index.php" class="btn btn-ghost">Back to Overview</a>
        </div>

    </div>

    <!-- Technical note -->
    <div class="alert alert-info mt-16">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        <div>
            <strong>Implementation note:</strong> Session was destroyed using <code>session_destroy()</code>. Duration calculated as <code>time() - $_SESSION['start_time']</code> = <strong><?= e($duration) ?> seconds</strong>.
        </div>
    </div>

</div>

<?php require_once 'includes/footer.php'; ?>
