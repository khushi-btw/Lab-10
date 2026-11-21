<?php
$pageTitle = $pageTitle ?? 'Home';
$pageDesc = $pageDesc ?? '';
$currentPage = current_page();
$currentPage = $currentPage === 'greeting.php' ? 'session.php' : $currentPage;
$showSessionStart = $showSessionStart ?? false;
$navItems = [
    'index.php' => 'Home',
    'session.php' => 'Session',
    'datetime.php' => 'Date & Time',
    'age-check.php' => 'Age Access',
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#130d1d">
    <title><?= e($pageTitle) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="header-inner">
        <a class="brand" href="index.php" aria-label="Home"><span class="brand-mark" aria-hidden="true">✿</span></a>
        <nav class="nav" aria-label="Main navigation">
            <?php foreach ($navItems as $href => $label): ?>
                <a href="<?= e($href) ?>" class="<?= $currentPage === $href ? 'active' : '' ?>"><?= e($label) ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>
<main class="container">
    <div class="page-heading">
        <div>
            <h1><?= e($pageTitle) ?></h1>
            <?php if ($pageDesc !== ''): ?><p class="lead"><?= e($pageDesc) ?></p><?php endif; ?>
        </div>
        <?php if ($showSessionStart && isset($_SESSION['start_time'])): ?>
            <div class="session-chip"><span class="pulse" aria-hidden="true"></span><span>SESSION STARTED<strong><?= e(date('d M Y · h:i:s A', (int) $_SESSION['start_time'])) ?></strong></span></div>
        <?php endif; ?>
    </div>
