<?php
/**
 * session.php — Application 01: Session-Based Greeting & Logout
 * LAB 10 — PHP Workspace
 *
 * Flow:
 *   GET  (no session) → show name-entry form
 *   POST             → store name & start time in session, redirect to greeting
 *   GET  (session)   → show personalised greeting + logout button
 */
require_once 'includes/bootstrap.php';

/* ------------------------------------------------------------------ */
/* 1. Handle POST — name submission                                     */
/* ------------------------------------------------------------------ */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $name = trim($_POST['username']);

    if ($name === '') {
        $formError = 'Please enter your name before continuing.';
    } else {
        // Store in session and record session start time
        $_SESSION['username']   = $name;
        $_SESSION['start_time'] = time();

        // Redirect to self (GET) to show greeting
        redirect('session.php');
    }
}

/* ------------------------------------------------------------------ */
/* 2. Decide which view to show                                         */
/* ------------------------------------------------------------------ */
$hasSession = !empty($_SESSION['username']);

$pageTitle = $hasSession ? 'Welcome, ' . e($_SESSION['username']) : 'Session Application';
$pageDesc  = 'Application 01 — PHP Sessions';

require_once 'includes/header.php';

/* ------------------------------------------------------------------ */
/* 3a. GREETING VIEW (session active)                                   */
/* ------------------------------------------------------------------ */
if ($hasSession):
    $startTime    = $_SESSION['start_time'];
    $formattedStart = date('d M Y, h:i:s A', $startTime);
?>

<!-- Greeting hero -->
<div class="greeting-hero">
    <p class="greeting-eyebrow">Application 01 &mdash; PHP Sessions</p>
    <h2>Hello, <span class="name-highlight"><?= e($_SESSION['username']) ?></span>!</h2>
    <div class="meta-row">
        <span class="meta-item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
            </svg>
            Session started at <strong style="color:#e2e8f0;margin-left:4px"><?= e($formattedStart) ?></strong>
        </span>
    </div>
</div>

<!-- Session info card -->
<div class="card mb-24">
    <div class="card-header">
        <div class="card-icon blue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
        </div>
        <div>
            <div class="card-num">APPLICATION 01</div>
            <div class="card-title">Your Active Session</div>
            <div class="card-desc">Your session is running. The data below is retrieved from <code>$_SESSION</code>.</div>
        </div>
    </div>

    <div class="stat-grid">
        <div class="stat-panel blue">
            <div class="stat-label">Logged in as</div>
            <div class="stat-value" style="font-size:20px"><?= e($_SESSION['username']) ?></div>
            <div class="stat-sub">Stored in $_SESSION['username']</div>
        </div>
        <div class="stat-panel orange">
            <div class="stat-label">Session started</div>
            <div class="stat-value" style="font-size:16px"><?= e($formattedStart) ?></div>
            <div class="stat-sub">Stored in $_SESSION['start_time']</div>
        </div>
        <div class="stat-panel green">
            <div class="stat-label">Session ID</div>
            <div class="stat-value" style="font-size:12px;font-family:var(--font-mono);word-break:break-all"><?= e(substr(session_id(), 0, 24)) ?>…</div>
            <div class="stat-sub">PHP session identifier</div>
        </div>
    </div>

    <!-- Logout -->
    <div class="logout-section">
        <a href="logout.php" class="btn btn-danger">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                <polyline points="16 17 21 12 16 7"/>
                <line x1="21" y1="12" x2="9" y2="12"/>
            </svg>
            Log Out
        </a>
    </div>
</div>

<?php
/* ------------------------------------------------------------------ */
/* 3b. LOGIN FORM VIEW (no active session)                              */
/* ------------------------------------------------------------------ */
else:
?>

<div class="section-label">
    <span class="section-num">APP 01</span>
    <span class="section-title">Session-Based Greeting</span>
</div>
<p class="section-subtitle">Enter your name below. PHP will store it in a session and redirect you to a personalised greeting page.</p>

<div style="max-width:520px">

    <!-- Error alert -->
    <?php if (!empty($formError)): ?>
    <div class="alert alert-error mb-16">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        <span><?= e($formError) ?></span>
    </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <div class="card-icon blue">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
            <div>
                <div class="card-num">APPLICATION 01</div>
                <div class="card-title">Enter Your Name</div>
                <div class="card-desc">A PHP session will be started on submission.</div>
            </div>
        </div>

        <form method="POST" action="session.php" novalidate>
            <div class="form-group">
                <label class="form-label" for="username">Your Name</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    class="form-input"
                    placeholder="e.g. Madhur"
                    value="<?= isset($_POST['username']) ? e(trim($_POST['username'])) : '' ?>"
                    required
                    autocomplete="given-name"
                    autofocus
                >
                <p class="form-hint">This value will be stored in <code>$_SESSION['username']</code>.</p>
            </div>
            <button type="submit" class="btn btn-primary w-full">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>
                Start Session &amp; Continue
            </button>
        </form>
    </div>

    <!-- How it works note -->
    <div class="alert alert-info mt-16">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        <div>
            <strong>How this works:</strong> PHP stores your name and <code>time()</code> in the session on the server. No JavaScript or localStorage is involved.
        </div>
    </div>

</div>

<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>
