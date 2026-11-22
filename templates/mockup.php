<?php
// Sample data shown in the POS screen mockup.
$products = [
    ['Cappuccino', 450, '#fde7d9'],
    ['Latte', 500, '#f4e4d4'],
    ['Croissant', 320, '#fdf0c9'],
    ['Cheesecake', 650, '#fde2e1'],
    ['Iced Tea', 280, '#dff4e8'],
    ['Club Sandwich', 780, '#e4ecfb'],
];
$cart = [
    ['Cappuccino', 2, 450],
    ['Croissant', 1, 320],
    ['Cheesecake', 1, 650],
];
$subtotal = array_sum(array_map(fn ($line) => $line[1] * $line[2], $cart));
$tax = (int) round($subtotal * 0.05);
$money = fn (int $amount) => 'Rs ' . number_format($amount);
?>
<div class="mockup" role="img" aria-label="QuickPOS checkout screen showing a product grid, a cart with three items and a Charge button">
    <div class="mockup__bar" aria-hidden="true">
        <span></span><span></span><span></span>
        <strong>QuickPOS · Register 1</strong>
    </div>
    <div class="mockup__body" aria-hidden="true">
        <div class="mockup__products">
            <div class="mockup__search">Search products…</div>
            <div class="mockup__grid">
                <?php foreach ($products as [$name, $price, $tint]): ?>
                    <div class="mockup__tile">
                        <span class="mockup__thumb" style="background: <?= e($tint) ?>"></span>
                        <span class="mockup__name"><?= e($name) ?></span>
                        <span class="mockup__price"><?= e($money($price)) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="mockup__cart">
            <div class="mockup__cart-head">Current order <span>#1042</span></div>
            <ul class="mockup__lines">
                <?php foreach ($cart as [$name, $qty, $price]): ?>
                    <li><span><?= e($qty . ' × ' . $name) ?></span><span><?= e($money($qty * $price)) ?></span></li>
                <?php endforeach; ?>
            </ul>
            <div class="mockup__totals">
                <div><span>Subtotal</span><span><?= e($money($subtotal)) ?></span></div>
                <div><span>Tax (5%)</span><span><?= e($money($tax)) ?></span></div>
                <div class="mockup__total"><span>Total</span><span><?= e($money($subtotal + $tax)) ?></span></div>
            </div>
            <div class="mockup__charge">Charge <?= e($money($subtotal + $tax)) ?></div>
        </div>
    </div>
    <div class="mockup__badge" aria-hidden="true">
        <span class="mockup__badge-icon">↑</span>
        <span><strong>+18%</strong> sales this week</span>
    </div>
</div>
