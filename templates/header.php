<?php
/** @var array $site */
$links = [
    'features' => 'Features',
    'pricing'  => 'Pricing',
    'contact'  => 'Contact',
];
?>
<header class="site-header" id="site-header">
    <div class="container site-header__inner">
        <a class="brand" href="/#top" aria-label="<?= e($site['name']) ?> – back to top">
            <span class="brand__mark" aria-hidden="true">
                <svg viewBox="0 0 32 32" width="32" height="32"><rect width="32" height="32" rx="8" fill="currentColor"/><path d="M9 16h14M16 9v14" stroke="#fff" stroke-width="3" stroke-linecap="round"/></svg>
            </span>
            <span class="brand__name"><?= e($site['name']) ?></span>
        </a>

        <button class="nav-toggle" type="button" aria-controls="site-nav" aria-expanded="false">
            <span class="visually-hidden">Open menu</span>
            <span class="nav-toggle__bar" aria-hidden="true"></span>
        </button>

        <nav class="site-nav" id="site-nav" aria-label="Main">
            <ul class="site-nav__list">
                <?php foreach ($links as $id => $label): ?>
                    <li><a class="site-nav__link" href="/#<?= e($id) ?>"><?= e($label) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <a class="btn btn--primary site-nav__cta" href="/#pricing">Sign Up</a>
        </nav>
    </div>
</header>
