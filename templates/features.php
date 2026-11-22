<?php
// Each feature: title, description and an inline SVG icon path (24×24, stroke icons).
// The icon markup is trusted, hard-coded SVG and is printed without e(); never put user input in it.
$features = [
    [
        'title' => 'Inventory',
        'text'  => 'Track stock in real time, get low-stock alerts and update prices across every register at once.',
        'icon'  => '<path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/>',
    ],
    [
        'title' => 'Sales Analytics',
        'text'  => 'See daily takings, best sellers and busy hours on a clear dashboard, and export reports in one click.',
        'icon'  => '<path d="M3 3v18h18"/><path d="M7 15l4-4 3 3 5-6"/>',
    ],
    [
        'title' => 'Customers',
        'text'  => 'Save customer profiles, reward repeat visits with loyalty points and send receipts by SMS or email.',
        'icon'  => '<circle cx="9" cy="8" r="4"/><path d="M2 21a7 7 0 0 1 14 0"/><path d="M17 11a3 3 0 1 0 0-6"/><path d="M22 21a6 6 0 0 0-4-5.6"/>',
    ],
    [
        'title' => 'Integrations',
        'text'  => 'Connect card readers, receipt printers, barcode scanners and your accounting software in minutes.',
        'icon'  => '<path d="M9 7V3"/><path d="M15 7V3"/><path d="M6 7h12v4a6 6 0 0 1-12 0V7z"/><path d="M12 17v4"/>',
    ],
];
?>
<section class="section section--muted" id="features" aria-labelledby="features-title">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Features</span>
            <h2 id="features-title">Everything your counter needs</h2>
            <p>One app for selling, stock and customers, designed to be learned in minutes, not days.</p>
        </div>

        <ul class="feature-grid">
            <?php foreach ($features as $feature): ?>
                <li class="feature-card">
                    <span class="feature-card__icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?= $feature['icon'] ?></svg>
                    </span>
                    <h3 class="feature-card__title"><?= e($feature['title']) ?></h3>
                    <p class="feature-card__text"><?= e($feature['text']) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
