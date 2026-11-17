<?php
/**
 * header.php — Shared HTML head + sidebar + topbar
 *
 * Expects:
 *   $pageTitle  (string)  — <title> and topbar heading
 *   $pageDesc   (string)  — optional short description shown in topbar
 */
$pageTitle = $pageTitle ?? 'LAB 10 — PHP Workspace';
$pageDesc  = $pageDesc  ?? '';
$currentPage = current_page();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?> | LAB 10</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- ================================================================
     SIDEBAR
================================================================ -->
<aside class="sidebar" id="sidebar">

    <!-- Brand -->
    <div class="sidebar-brand">
        <span class="brand-badge">LAB</span>
        <span class="brand-num">10</span>
        <span class="brand-sep"></span>
        <span class="brand-title">PHP Workspace</span>
    </div>

    <!-- Nav -->
    <nav class="sidebar-nav" aria-label="Primary navigation">
        <ul>
            <li>
                <a href="index.php" class="nav-link <?= $currentPage === 'index.php' ? 'active' : '' ?>">
                    <!-- Overview icon -->
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                        <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
                    </svg>
                    <span>Overview</span>
                </a>
            </li>
            <li>
                <a href="session.php" class="nav-link <?= in_array($currentPage, ['session.php', 'logout.php']) ? 'active' : '' ?>">
                    <!-- User icon -->
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span>Session App</span>
                    <span class="nav-num">01</span>
                </a>
            </li>
            <li>
                <a href="datetime.php" class="nav-link <?= $currentPage === 'datetime.php' ? 'active' : '' ?>">
                    <!-- Clock icon -->
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <span>Date &amp; Time</span>
                    <span class="nav-num">02</span>
                </a>
            </li>
            <li>
                <a href="age-check.php" class="nav-link <?= $currentPage === 'age-check.php' ? 'active' : '' ?>">
                    <!-- Shield icon -->
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                    <span>Age Checker</span>
                    <span class="nav-num">03</span>
                </a>
            </li>
        </ul>
    </nav>

</aside>

<!-- ================================================================
     MAIN WRAPPER
================================================================ -->
<div class="main-wrapper">

    <!-- TOP BAR -->
    <header class="topbar">
        <!-- Mobile hamburger -->
        <button class="hamburger" id="menuToggle" aria-label="Toggle navigation" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <div class="topbar-title">
            <h1><?= e($pageTitle) ?></h1>
            <?php if ($pageDesc): ?>
            <p class="topbar-desc"><?= e($pageDesc) ?></p>
            <?php endif; ?>
        </div>

        <!-- Session user badge -->
        <?php if (!empty($_SESSION['username'])): ?>
        <div class="topbar-user">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
            <span><?= e($_SESSION['username']) ?></span>
        </div>
        <?php endif; ?>
    </header>

    <!-- PAGE CONTENT starts here — footer.php closes .main-wrapper -->
    <main class="page-content">
