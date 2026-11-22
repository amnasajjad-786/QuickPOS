<?php

declare(strict_types=1);

require __DIR__ . '/../src/helpers.php';

session_start();

$site = site();

// Errors and typed values from a failed contact-form submission (shown once).
$contact = $_SESSION['contact'] ?? ['errors' => [], 'values' => []];
unset($_SESSION['contact']);

render('head', ['title' => $site['name'] . ' – ' . $site['tagline']]);
render('header', ['site' => $site]);
?>
<main id="top">
    <?php render('hero'); ?>
    <?php render('features'); ?>
    <?php render('pricing'); ?>
    <?php render('contact', $contact); ?>
</main>
<?php render('foot');
