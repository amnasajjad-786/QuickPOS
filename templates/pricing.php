<?php
// Plan data lives in one array; the cards below are rendered in a loop.
$plans = [
    [
        'name'     => 'Basic',
        'price'    => 2999,
        'summary'  => 'For a single counter getting started.',
        'features' => ['1 register', 'Up to 500 products', 'Daily sales report', 'Email receipts', 'Email support'],
        'popular'  => false,
    ],
    [
        'name'     => 'Pro',
        'price'    => 5999,
        'summary'  => 'For growing shops that need more insight.',
        'features' => ['Up to 3 registers', 'Unlimited products', 'Inventory alerts', 'Customer loyalty points', 'Sales analytics dashboard', 'Priority chat support'],
        'popular'  => true,
    ],
    [
        'name'     => 'Enterprise',
        'price'    => 12999,
        'summary'  => 'For chains and multi-branch businesses.',
        'features' => ['Unlimited registers', 'Multi-branch stock', 'Staff roles & permissions', 'Accounting integrations', 'Dedicated account manager'],
        'popular'  => false,
    ],
];
?>
<section class="section" id="pricing" aria-labelledby="pricing-title">
    <div class="container">
        <div class="section-head">
            <span class="eyebrow">Pricing</span>
            <h2 id="pricing-title">Simple plans that grow with you</h2>
            <p>Start free for 14 days. No setup fees, no long contracts, cancel any time.</p>
        </div>

        <div class="pricing-grid">
            <?php foreach ($plans as $plan): ?>
                <article class="plan<?= $plan['popular'] ? ' plan--popular' : '' ?>" aria-labelledby="plan-<?= e(strtolower($plan['name'])) ?>">
                    <?php if ($plan['popular']): ?>
                        <span class="plan__badge">Most popular</span>
                    <?php endif; ?>
                    <h3 class="plan__name" id="plan-<?= e(strtolower($plan['name'])) ?>"><?= e($plan['name']) ?></h3>
                    <p class="plan__summary"><?= e($plan['summary']) ?></p>
                    <p class="plan__price">
                        <span class="plan__amount">Rs <?= e(number_format($plan['price'])) ?></span>
                        <span class="plan__period">/ month</span>
                    </p>
                    <a class="btn <?= $plan['popular'] ? 'btn--primary' : 'btn--secondary' ?> btn--block" href="#contact">
                        <?= $plan['name'] === 'Enterprise' ? 'Contact sales' : 'Choose ' . e($plan['name']) ?>
                    </a>
                    <ul class="plan__features">
                        <?php foreach ($plan['features'] as $feature): ?>
                            <li><?= e($feature) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
