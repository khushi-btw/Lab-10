<?php
/**
 * bootstrap.php — Shared initialization and helper functions
 * Loaded on every page; sets up sessions, timezone and helpers.
 */

// -----------------------------------------------------------------
// 1. Timezone
// -----------------------------------------------------------------
date_default_timezone_set('Asia/Kolkata');

// -----------------------------------------------------------------
// 2. Session
// -----------------------------------------------------------------
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// -----------------------------------------------------------------
// 3. Helpers
// -----------------------------------------------------------------

/**
 * Escape a value for safe HTML output.
 */
function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Redirect to a URL and exit.
 */
function redirect(string $url): never {
    header('Location: ' . $url);
    exit;
}

/** Return the current page filename so navigation can mark it active. */
function current_page(): string {
    return basename($_SERVER['PHP_SELF']);
}

/** Format a duration in words. */
function format_duration(int $seconds): string {
    $mins = intdiv($seconds, 60);
    $secs = $seconds % 60;
    $parts = [];
    if ($mins > 0) {
        $parts[] = $mins . ' minute' . ($mins === 1 ? '' : 's');
    }
    if ($secs > 0 || $mins === 0) {
        $parts[] = $secs . ' second' . ($secs === 1 ? '' : 's');
    }
    return count($parts) > 1 ? implode(' and ', $parts) : $parts[0];
}
