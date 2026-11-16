<?php
/**
 * index.php — Overview / Dashboard
 * LAB 10 — PHP Workspace
 */
require_once 'includes/bootstrap.php';

$pageTitle = 'Overview';
$pageDesc  = 'LAB 10 — PHP Workspace';
require_once 'includes/header.php';
?>

<!-- ================================================================
     HERO STRIP
================================================================ -->
<div class="hero-strip">
    <div class="hero-text">
        <p class="lab-eyebrow">BTech CSE &mdash; Web Programming &mdash; Lab 10</p>
        <h2>LAB 10<br>PHP Workspace</h2>
        <p>Three practical server-side applications built with core PHP — sessions, date functions and form validation — running on a single cohesive platform.</p>
        <div class="hero-badges">
            <span class="hero-badge accent">PHP Sessions</span>
            <span class="hero-badge accent">date()</span>
            <span class="hero-badge accent">Form Validation</span>
            <span class="hero-badge">No Framework</span>
            <span class="hero-badge">Vanilla JS</span>
        </div>
    </div>
</div>

<!-- ================================================================
     APP CARDS
================================================================ -->
<div class="section-label">
    <span class="section-num">APPLICATIONS</span>
    <span class="section-title">Three PHP Applications</span>
</div>

<div class="app-grid">

    <!-- App 01 -->
    <a href="session.php" class="app-card blue-accent">
        <div class="app-card-top">
            <div class="card-icon blue">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
            <span class="app-card-num">APP 01</span>
        </div>
        <div>
            <h3>Session-Based Greeting</h3>
            <p>Enter your name, receive a personalised greeting, see your session start time, and log out to view your usage duration.</p>
        </div>
        <div class="app-card-cta">
            <span>Launch application</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
        </div>
    </a>

    <!-- App 02 -->
    <a href="datetime.php" class="app-card orange-accent">
        <div class="app-card-top">
            <div class="card-icon orange">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                </svg>
            </div>
            <span class="app-card-num">APP 02</span>
        </div>
        <div>
            <h3>Date, Time &amp; Day</h3>
            <p>Server-generated date, time and day using PHP's <code>date()</code> function with the Asia/Kolkata timezone. Refresh for the latest values.</p>
        </div>
        <div class="app-card-cta">
            <span>Launch application</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
        </div>
    </a>

    <!-- App 03 -->
    <a href="age-check.php" class="app-card green-accent">
        <div class="app-card-top">
            <div class="card-icon green">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
            </div>
            <span class="app-card-num">APP 03</span>
        </div>
        <div>
            <h3>Age-Based Access Checker</h3>
            <p>Submit your name and age. The application validates the input and determines whether you are authorised to access the site.</p>
        </div>
        <div class="app-card-cta">
            <span>Launch application</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
            </svg>
        </div>
    </a>

</div>

<!-- ================================================================
     QUICK TECH REFERENCE
================================================================ -->
<div class="divider"></div>

<div class="section-label">
    <span class="section-num">REFERENCE</span>
    <span class="section-title">Technical Stack</span>
</div>

<div class="stat-grid">
    <div class="stat-panel blue">
        <div class="stat-label">Language</div>
        <div class="stat-value" style="font-size:20px;font-family:var(--font-mono)">PHP 8+</div>
        <div class="stat-sub">Server-side scripting</div>
    </div>
    <div class="stat-panel orange">
        <div class="stat-label">Styling</div>
        <div class="stat-value" style="font-size:20px;font-family:var(--font-mono)">CSS3</div>
        <div class="stat-sub">Custom properties, Grid, Flex</div>
    </div>
    <div class="stat-panel green">
        <div class="stat-label">Scripting</div>
        <div class="stat-value" style="font-size:20px;font-family:var(--font-mono)">Vanilla JS</div>
        <div class="stat-sub">Sidebar toggle only</div>
    </div>
    <div class="stat-panel purple">
        <div class="stat-label">Session Store</div>
        <div class="stat-value" style="font-size:20px;font-family:var(--font-mono)">$_SESSION</div>
        <div class="stat-sub">Native PHP sessions</div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
