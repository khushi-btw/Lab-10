<?php
require_once 'includes/bootstrap.php';
$pageTitle = 'Choose an application';
require_once 'includes/header.php';
?>
<section class="app-grid" aria-label="Applications">
    <a class="app-card" href="session.php"><div class="card-top"><span class="card-arrow" aria-hidden="true">↗</span></div><div class="app-symbol symbol-user" aria-hidden="true">↗</div><h3>Session</h3><div class="card-bottom"><span>Open</span><span>Start <b aria-hidden="true">→</b></span></div></a>
    <a class="app-card" href="datetime.php"><div class="card-top"><span class="card-arrow" aria-hidden="true">↗</span></div><div class="app-symbol symbol-clock" aria-hidden="true">◷</div><h3>Date &amp; Time</h3><div class="card-bottom"><span>Open</span><span>View <b aria-hidden="true">→</b></span></div></a>
    <a class="app-card" href="age-check.php"><div class="card-top"><span class="card-arrow" aria-hidden="true">↗</span></div><div class="app-symbol symbol-check" aria-hidden="true">⌁</div><h3>Age Access</h3><div class="card-bottom"><span>Open</span><span>Check <b aria-hidden="true">→</b></span></div></a>
</section>
<?php require_once 'includes/footer.php'; ?>
