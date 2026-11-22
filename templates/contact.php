<?php
/**
 * @var array<string, string> $errors
 * @var array<string, string> $values
 */
$errors = $errors ?? [];
$values = $values ?? [];

$fields = [
    'name'    => ['label' => 'Name',    'type' => 'text',  'autocomplete' => 'name',  'placeholder' => 'Your full name'],
    'email'   => ['label' => 'Email',   'type' => 'email', 'autocomplete' => 'email', 'placeholder' => 'you@example.com'],
    'message' => ['label' => 'Message', 'type' => 'textarea', 'autocomplete' => 'off', 'placeholder' => 'Tell us about your shop and what you need'],
];
?>
<section class="section" id="contact" aria-labelledby="contact-title">
    <div class="container contact">
        <div class="contact__intro">
            <span class="eyebrow">Contact</span>
            <h2 id="contact-title">Let's talk about your shop</h2>
            <p>Questions about QuickPOS, or want a free demo? Send us a message and we'll get back to you within one working day.</p>
            <ul class="contact__list">
                <li><strong>Email</strong> <?= e(site()['email']) ?></li>
                <li><strong>Hours</strong> Mon–Sat, 9am–6pm</li>
            </ul>
        </div>

        <form class="contact-form" action="/contact.php" method="post" novalidate>
            <?php if ($errors !== []): ?>
                <div class="form-alert" role="alert">
                    Please fix the <?= count($errors) === 1 ? 'highlighted field' : count($errors) . ' highlighted fields' ?> and try again.
                </div>
            <?php endif; ?>

            <?php foreach ($fields as $id => $field): ?>
                <?php $error = $errors[$id] ?? null; ?>
                <div class="field<?= $error ? ' field--error' : '' ?>">
                    <label class="field__label" for="<?= e($id) ?>"><?= e($field['label']) ?></label>
                    <?php if ($field['type'] === 'textarea'): ?>
                        <textarea class="field__input" id="<?= e($id) ?>" name="<?= e($id) ?>" rows="5"
                            placeholder="<?= e($field['placeholder']) ?>"
                            <?= $error ? 'aria-invalid="true" aria-describedby="' . e($id) . '-error"' : '' ?>><?= e($values[$id] ?? '') ?></textarea>
                    <?php else: ?>
                        <input class="field__input" id="<?= e($id) ?>" name="<?= e($id) ?>" type="<?= e($field['type']) ?>"
                            autocomplete="<?= e($field['autocomplete']) ?>" placeholder="<?= e($field['placeholder']) ?>"
                            value="<?= e($values[$id] ?? '') ?>"
                            <?= $error ? 'aria-invalid="true" aria-describedby="' . e($id) . '-error"' : '' ?>>
                    <?php endif; ?>
                    <?php if ($error): ?>
                        <p class="field__error" id="<?= e($id) ?>-error"><?= e($error) ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

            <button class="btn btn--primary btn--lg btn--block" type="submit">Send message</button>
        </form>
    </div>
</section>
