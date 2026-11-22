<?php

declare(strict_types=1);

/**
 * Small view helpers shared by every page.
 */

/** Escape a value for safe output inside HTML. */
function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Render a template from the templates/ folder with the given variables. */
function render(string $template, array $vars = []): void
{
    extract($vars, EXTR_SKIP);
    require __DIR__ . '/../templates/' . $template . '.php';
}

/** Site-wide settings used by the templates. */
function site(): array
{
    return [
        'name'    => 'QuickPOS',
        'tagline' => 'The point of sale that keeps up with your shop',
        'email'   => 'hello@quickpos.example',
    ];
}
