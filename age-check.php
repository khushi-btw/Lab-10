<?php
/**
 * age-check.php — Application 03: Age-Based Access Checker
 * LAB 10 — PHP Workspace
 *
 * GET  → show the form
 * POST → validate inputs and display the result
 */
require_once 'includes/bootstrap.php';

$pageTitle = 'Age Checker';
$pageDesc  = 'Application 03 — Age-Based Access Control';

/* ------------------------------------------------------------------ */
/* Process form submission                                              */
/* ------------------------------------------------------------------ */
$result     = null;   // 'authorized' | 'denied' | 'error'
$resultMsg  = '';
$nameVal    = '';
$ageVal     = '';
$errors     = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nameRaw = trim($_POST['name']  ?? '');
    $ageRaw  = trim($_POST['age']   ?? '');

    /* -- Validate name -- */
    if ($nameRaw === '') {
        $errors['name'] = 'Name is required.';
    }

    /* -- Validate age -- */
    if ($ageRaw === '') {
        $errors['age'] = 'Age is required.';
    } elseif (!ctype_digit($ageRaw)) {
        $errors['age'] = 'Age must be a whole positive number.';
    } elseif ((int)$ageRaw < 0) {
        $errors['age'] = 'Age cannot be negative.';
    }

    /* -- Determine result if no errors -- */
    if (empty($errors)) {
        $nameVal = $nameRaw;
        $ageVal  = (int)$ageRaw;

        if ($ageVal < 18) {
            $result    = 'denied';
            $resultMsg = 'Hello, ' . htmlspecialchars($nameVal, ENT_QUOTES, 'UTF-8') .
                         ', you are not authorized to visit the site';
        } else {
            $result    = 'authorized';
            $resultMsg = 'Welcome to this site';
        }
    } else {
        // Keep entered values to repopulate the form
        $nameVal = $nameRaw;
        $ageVal  = $ageRaw;
    }
}

require_once 'includes/header.php';
?>

<div class="section-label">
    <span class="section-num">APP 03</span>
    <span class="section-title">Age-Based Access Checker</span>
</div>
<p class="section-subtitle">Enter your name and age. The server will check whether you meet the minimum age requirement (18+) and display an appropriate response.</p>

<div class="age-layout">

    <!-- ============================================================
         FORM COLUMN
    ============================================================ -->
    <div>
        <div class="card">
            <div class="card-header">
                <div class="card-icon green">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <div>
                    <div class="card-num">APPLICATION 03</div>
                    <div class="card-title">Access Verification Form</div>
                    <div class="card-desc">Processed server-side using PHP.</div>
                </div>
            </div>

            <form method="POST" action="age-check.php" novalidate>

                <!-- Name field -->
                <div class="form-group">
                    <label class="form-label" for="name">Full Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-input <?= isset($errors['name']) ? 'is-error' : '' ?>"
                        placeholder="e.g. Madhur"
                        value="<?= e($nameVal) ?>"
                        required
                        autocomplete="given-name"
                    >
                    <?php if (isset($errors['name'])): ?>
                    <p class="form-hint" style="color:var(--clr-error)"><?= e($errors['name']) ?></p>
                    <?php else: ?>
                    <p class="form-hint">Enter your first or full name.</p>
                    <?php endif; ?>
                </div>

                <!-- Age field -->
                <div class="form-group">
                    <label class="form-label" for="age">Age</label>
                    <input
                        type="number"
                        id="age"
                        name="age"
                        class="form-input <?= isset($errors['age']) ? 'is-error' : '' ?>"
                        placeholder="e.g. 20"
                        value="<?= e($ageVal) ?>"
                        min="0"
                        max="150"
                        required
                    >
                    <?php if (isset($errors['age'])): ?>
                    <p class="form-hint" style="color:var(--clr-error)"><?= e($errors['age']) ?></p>
                    <?php else: ?>
                    <p class="form-hint">Must be a valid non-negative whole number.</p>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary w-full">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                    Check Access
                </button>

            </form>
        </div>

        <!-- Rules reference -->
        <div class="alert alert-info mt-16">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <div>
                <strong>Access Rules</strong><br>
                Age &lt; 18 → <em>Not authorized</em><br>
                Age &ge; 18 → <em>Authorized (Welcome)</em><br>
                Exactly 18 is treated as authorized.
            </div>
        </div>
    </div>

    <!-- ============================================================
         RESULT COLUMN
    ============================================================ -->
    <div>

        <?php if ($result === 'authorized'): ?>

        <div class="result-panel authorized">
            <div class="result-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
            </div>
            <div class="result-body">
                <h3>Access Granted</h3>
                <p><?= e($resultMsg) ?></p>
                <div class="mt-16 stat-grid" style="grid-template-columns:1fr 1fr;">
                    <div class="stat-panel green">
                        <div class="stat-label">Name</div>
                        <div class="stat-value" style="font-size:16px"><?= e($nameVal) ?></div>
                    </div>
                    <div class="stat-panel green">
                        <div class="stat-label">Age Entered</div>
                        <div class="stat-value"><?= e($ageVal) ?></div>
                        <div class="stat-sub">≥ 18 → Authorized</div>
                    </div>
                </div>
            </div>
        </div>

        <?php elseif ($result === 'denied'): ?>

        <div class="result-panel denied">
            <div class="result-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/>
                </svg>
            </div>
            <div class="result-body">
                <h3>Access Denied</h3>
                <p><?= e($resultMsg) ?></p>
                <div class="mt-16 stat-grid" style="grid-template-columns:1fr 1fr;">
                    <div class="stat-panel" style="background:#fee2e2;border-color:#fecaca;">
                        <div class="stat-label">Name</div>
                        <div class="stat-value" style="font-size:16px;color:#991b1b"><?= e($nameVal) ?></div>
                    </div>
                    <div class="stat-panel" style="background:#fee2e2;border-color:#fecaca;">
                        <div class="stat-label">Age Entered</div>
                        <div class="stat-value" style="color:#991b1b"><?= e($ageVal) ?></div>
                        <div class="stat-sub" style="color:#b91c1c">&lt; 18 → Denied</div>
                    </div>
                </div>
            </div>
        </div>

        <?php elseif (!empty($errors)): ?>

        <div class="card">
            <div class="card-header">
                <div class="card-icon" style="background:#fef2f2;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="var(--clr-error)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                </div>
                <div>
                    <div class="card-title">Validation Errors</div>
                    <div class="card-desc">Please fix the highlighted fields and try again.</div>
                </div>
            </div>
            <ul style="padding-left:20px;color:var(--clr-error);font-size:14px;">
                <?php foreach ($errors as $err): ?>
                <li><?= e($err) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php else: ?>

        <!-- Placeholder when no submission yet -->
        <div class="card" style="text-align:center;padding:48px 32px;border-style:dashed;">
            <div style="width:60px;height:60px;background:var(--clr-canvas);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                <svg style="width:28px;height:28px;stroke:var(--clr-text-muted);" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
            </div>
            <p style="font-size:14px;color:var(--clr-text-muted);">Submit the form to see the access result here.</p>
        </div>

        <?php endif; ?>

        <!-- Test cases cheat-sheet -->
        <?php if ($result !== null || !empty($errors)): ?>
        <div class="mt-16"></div>
        <?php endif; ?>

        <div class="card mt-16" style="padding:20px 24px;">
            <div class="card-num" style="margin-bottom:10px;">TEST CASES</div>
            <table style="width:100%;border-collapse:collapse;font-size:13px;">
                <thead>
                    <tr>
                        <th style="text-align:left;padding:6px 8px;color:var(--clr-text-muted);font-weight:600;border-bottom:1px solid var(--clr-border);">Age</th>
                        <th style="text-align:left;padding:6px 8px;color:var(--clr-text-muted);font-weight:600;border-bottom:1px solid var(--clr-border);">Expected Result</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tests = [
                        [16, 'Denied',     'var(--clr-error)'],
                        [17, 'Denied',     'var(--clr-error)'],
                        [18, 'Authorized', 'var(--clr-success)'],
                        [21, 'Authorized', 'var(--clr-success)'],
                    ];
                    foreach ($tests as [$age, $label, $clr]):
                    ?>
                    <tr>
                        <td style="padding:7px 8px;border-bottom:1px solid var(--clr-border);font-family:var(--font-mono);font-weight:600;"><?= $age ?></td>
                        <td style="padding:7px 8px;border-bottom:1px solid var(--clr-border);color:<?= $clr ?>;font-weight:600;"><?= $label ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<?php require_once 'includes/footer.php'; ?>
