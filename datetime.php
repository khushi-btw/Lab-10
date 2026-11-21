<?php
require_once 'includes/bootstrap.php';
$now = time();
$currentDate = date('d F Y', $now);
$currentTime = date('h:i:s A', $now);
$currentDay = date('l', $now);
$pageTitle = 'Current Date & Time';
$pageDesc = 'A clear snapshot of today.';
require_once 'includes/header.php';
?>
<section class="time-stage">
    <article class="time-card date-card"><div class="time-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="3"/><path d="M16 3v4M8 3v4M3 10h18"/></svg></div><p>Current Date</p><strong><?= e($currentDate) ?></strong></article>
    <article class="time-card clock-card"><div class="time-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg></div><p>Current Time</p><strong><?= e($currentTime) ?></strong></article>
    <article class="time-card day-card"><div class="time-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v2m0 14v2M3 12h2m14 0h2M5.64 5.64l1.42 1.42m9.88 9.88 1.42 1.42m0-12.72-1.42 1.42m-9.88 9.88-1.42 1.42"/><circle cx="12" cy="12" r="5"/></svg></div><p>Current Day</p><strong><?= e($currentDay) ?></strong></article>
</section>
<?php require_once 'includes/footer.php'; ?>
