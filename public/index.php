<?php

declare(strict_types=1);

require __DIR__ . '/../src/helpers.php';

$site = site();

render('head', ['title' => $site['name'] . ' – ' . $site['tagline']]);
render('header', ['site' => $site]);
?>
<main id="top">
    <?php render('hero'); ?>
    <section class="section" id="features" aria-label="Features">
        <div class="container"><h2>Features</h2></div>
    </section>
    <section class="section" id="pricing" aria-label="Pricing">
        <div class="container"><h2>Pricing</h2></div>
    </section>
    <section class="section" id="contact" aria-label="Contact">
        <div class="container"><h2>Contact</h2></div>
    </section>
</main>
<?php render('foot');
