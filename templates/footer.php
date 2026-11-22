<?php
/** @var array $site */
$groups = [
    'Product' => ['Features' => '/#features', 'Pricing' => '/#pricing', 'Free trial' => '/#pricing'],
    'Company' => ['About QuickPOS' => '/#top', 'Contact' => '/#contact', 'Book a demo' => '/#contact'],
    'Support' => ['Help centre' => '/#contact', 'Email us' => 'mailto:' . $site['email'], 'System status' => '/#top'],
];
// Placeholder social profiles (no real accounts yet).
$socials = [
    'Facebook'  => '<path d="M14 8h3V4h-3a4 4 0 0 0-4 4v2H8v4h2v6h4v-6h3l1-4h-4V8z"/>',
    'Instagram' => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1"/>',
    'LinkedIn'  => '<rect x="3" y="9" width="4" height="12"/><circle cx="5" cy="4.5" r="2"/><path d="M10 9h4v2a4 4 0 0 1 7 3v7h-4v-6a2 2 0 0 0-4 0v6h-3z"/>',
    'X'         => '<path d="M4 4l16 16M20 4L4 20"/>',
];
?>
<footer class="site-footer">
    <div class="container">
        <div class="site-footer__top">
            <div class="site-footer__brand">
                <a class="brand brand--light" href="/#top">
                    <span class="brand__mark" aria-hidden="true">
                        <svg viewBox="0 0 32 32" width="32" height="32"><rect width="32" height="32" rx="8" fill="currentColor"/><path d="M9 16h14M16 9v14" stroke="#fff" stroke-width="3" stroke-linecap="round"/></svg>
                    </span>
                    <span class="brand__name"><?= e($site['name']) ?></span>
                </a>
                <p><?= e($site['tagline']) ?>.</p>
                <ul class="socials">
                    <?php foreach ($socials as $label => $icon): ?>
                        <li>
                            <a href="#" aria-label="QuickPOS on <?= e($label) ?> (coming soon)">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?= $icon /* trusted static SVG */ ?></svg>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php foreach ($groups as $title => $links): ?>
                <nav class="site-footer__group" aria-label="<?= e($title) ?>">
                    <h3><?= e($title) ?></h3>
                    <ul>
                        <?php foreach ($links as $label => $href): ?>
                            <li><a href="<?= e($href) ?>"><?= e($label) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            <?php endforeach; ?>
        </div>

        <div class="site-footer__bottom">
            <p>&copy; <?= date('Y') ?> <?= e($site['name']) ?>. All rights reserved.</p>
            <p>A CS4002 semester project landing page.</p>
        </div>
    </div>
</footer>
