<?php

declare(strict_types=1);

/**
 * Handles the contact form (POST only).
 * Invalid input  → back to the form with field errors and the typed values.
 * Valid input    → simulated success (no database, no email) → thank-you page.
 */

require __DIR__ . '/../src/contact_validation.php';

session_start();

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Location: /#contact', true, 303);
    exit;
}

$result = validate_contact($_POST);

if (!$result['valid']) {
    $_SESSION['contact'] = [
        'errors' => $result['errors'],
        'values' => $result['values'],
    ];
    header('Location: /?status=error#contact', true, 303);
    exit;
}

// A real product would store or email the message here.
unset($_SESSION['contact']);
$_SESSION['contact_success_name'] = $result['values']['name'];

header('Location: /thank-you.php', true, 303);
exit;
