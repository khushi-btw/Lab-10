<?php
$pageTitle = $pageTitle ?? 'Lab 10';
$pageDesc = $pageDesc ?? '';
$currentPage = current_page();
$navItems = [
    'index.php' => ['Home', '01'],
    'session.php' => ['Session', '02'],
    'datetime.php' => ['Date & time', '03'],
    'age-check.php' => ['Age access', '04'],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#071b2b">
    <title><?= e($pageTitle) ?> · Lab 10</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <a class="brand" href="index.php" aria-label="Lab 10 home"><span class="brand-mark">L<span>10</span></span><span>Fieldnotes <small>PHP applications</small></span></a>
    <nav class="nav" aria-label="Main navigation">
        <?php foreach ($navItems as $href => [$label, $number]): ?>
            <a href="<?= e($href) ?>" class="<?= $currentPage === $href ? 'active' : '' ?>"><span><?= e($number) ?></span><?= e($label) ?></a>
        <?php endforeach; ?>
    </nav>
</header>
<main class="container">
    <div class="page-heading">
        <div><p class="eyebrow">WEB PROGRAMMING <span>·</span> LAB 10</p><h1><?= e($pageTitle) ?></h1><?php if ($pageDesc !== ''): ?><p class="lead"><?= e($pageDesc) ?></p><?php endif; ?></div>
        <?php if (!empty($_SESSION['username']) && isset($_SESSION['start_time'])): ?><div class="session-chip"><span class="pulse"></span><span>SESSION STARTED<strong><?= e(date('d M Y · h:i:s A', (int) $_SESSION['start_time'])) ?></strong></span></div><?php endif; ?>
    </div>
