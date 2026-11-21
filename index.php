<?php
require_once 'includes/bootstrap.php';
$pageTitle = 'Choose an application';
$pageDesc = 'Pick a tool to continue.';
require_once 'includes/header.php';
?>
<section class="app-grid" aria-label="Applications">
    <article class="app-card">
        <div class="app-icon icon-pink" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M4 21v-2a8 8 0 0 1 16 0v2"/></svg></div>
        <h2>Session Application</h2>
        <p class="card-copy">Say hello and keep track of your visit.</p>
        <a class="button button-primary" href="session.php">Start session <span aria-hidden="true">→</span></a>
    </article>
    <article class="app-card">
        <div class="app-icon icon-lavender" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></div>
        <h2>Date &amp; Time</h2>
        <p class="card-copy">See today's date, time and day at a glance.</p>
        <a class="button button-primary" href="datetime.php">View date &amp; time <span aria-hidden="true">→</span></a>
    </article>
    <article class="app-card">
        <div class="app-icon icon-rose" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-4"/></svg></div>
        <h2>Age Verification</h2>
        <p class="card-copy">Check eligibility with a name and age.</p>
        <a class="button button-primary" href="age-check.php">Check age <span aria-hidden="true">→</span></a>
    </article>
</section>
<?php require_once 'includes/footer.php'; ?>
