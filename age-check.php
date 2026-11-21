<?php
require_once 'includes/bootstrap.php';
$name = '';
$age = '';
$errors = [];
$authorized = null;
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $name = trim((string) ($_POST['name'] ?? ''));
    $age = trim((string) ($_POST['age'] ?? ''));
    if ($name === '') {
        $errors['name'] = 'Enter your name to continue.';
    } elseif (strlen($name) > 320) {
        $errors['name'] = 'Please keep your name under 80 characters.';
    }
    if ($age === '') {
        $errors['age'] = 'Enter your age to continue.';
    } elseif (!ctype_digit($age)) {
        $errors['age'] = 'Enter a whole number that is 0 or above.';
    }
    if (!$errors) {
        $authorized = (int) $age >= 18;
    }
}
$pageTitle = 'Age Verification';
require_once 'includes/header.php';
?>
<section class="surface main-surface single-surface">
    <form method="post" action="age-check.php" class="form-stack">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" maxlength="80" autocomplete="name" placeholder="Your name" value="<?= e($name) ?>" required>
        <?php if (isset($errors['name'])): ?><p class="field-error" role="alert"><?= e($errors['name']) ?></p><?php endif; ?>
        <label for="age">Age</label>
        <input id="age" name="age" type="number" min="0" step="1" inputmode="numeric" placeholder="Your age" value="<?= e($age) ?>" required>
        <?php if (isset($errors['age'])): ?><p class="field-error" role="alert"><?= e($errors['age']) ?></p><?php endif; ?>
        <button class="button button-primary" type="submit">Check access <span aria-hidden="true">→</span></button>
    </form>
    <?php if ($authorized === true): ?>
        <p class="age-result authorized" role="status">Welcome to this site.</p>
    <?php elseif ($authorized === false): ?>
        <p class="age-result denied" role="status">Hello, <?= e($name) ?>, you are not authorized to visit the site.</p>
    <?php endif; ?>
</section>
<?php require_once 'includes/footer.php'; ?>
