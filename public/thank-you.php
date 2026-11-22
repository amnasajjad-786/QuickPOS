<?php

declare(strict_types=1);

require __DIR__ . '/../src/helpers.php';

session_start();

// Only reachable right after a valid submission.
$name = $_SESSION['contact_success_name'] ?? null;
if ($name === null) {
    header('Location: /#contact', true, 303);
    exit;
}
unset($_SESSION['contact_success_name']);

$site = site();

render('head', ['title' => 'Thank you – ' . $site['name']]);
render('header', ['site' => $site]);
?>
<main id="top" class="thanks">
    <div class="container">
        <div class="thanks__card">
            <span class="thanks__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5l4.5 4.5L19 7.5"/></svg>
            </span>
            <h1>Thank you, <?= e($name) ?>!</h1>
            <p>Your message has been received. A member of the QuickPOS team will reply within one working day.</p>
            <a class="btn btn--primary btn--lg" href="/">Back to home</a>
        </div>
    </div>
</main>
<?php render('footer', ['site' => $site]); ?>
<?php render('foot');
