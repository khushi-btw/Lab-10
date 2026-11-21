<?php
require_once 'includes/bootstrap.php';
$now = time();
$currentDate = date('d F Y', $now);
$currentTime = date('h:i:s A', $now);
$currentDay = date('l', $now);
$pageTitle = 'Current Date & Time';
require_once 'includes/header.php';
?>
<section class="time-stage">
    <div class="time-overline">Current Time</div>
    <div class="time-readout"><?= e($currentTime) ?></div>
    <div class="time-details">
        <div><span>Current Date</span><strong><?= e($currentDate) ?></strong></div>
        <div><span>Current Day</span><strong><?= e($currentDay) ?></strong></div>
    </div>
</section>
<?php require_once 'includes/footer.php'; ?>
