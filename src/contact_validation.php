<?php

declare(strict_types=1);

/**
 * Contact-form validation.
 *
 * Kept free of $_POST, sessions and output so it can be tested directly
 * (see tests/ContactValidationTest.php).
 *
 * @param array $input Raw input, e.g. $_POST.
 * @return array{valid: bool, errors: array<string, string>, values: array<string, string>}
 */
function validate_contact(array $input): array
{
    $values = [
        'name'    => trim((string) ($input['name'] ?? '')),
        'email'   => trim((string) ($input['email'] ?? '')),
        'message' => trim((string) ($input['message'] ?? '')),
    ];

    $errors = [];

    if ($values['name'] === '') {
        $errors['name'] = 'Please enter your name.';
    }

    if ($values['email'] === '') {
        $errors['email'] = 'Please enter your email address.';
    } elseif (filter_var($values['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = 'Please enter a valid email address, like name@example.com.';
    }

    if ($values['message'] === '') {
        $errors['message'] = 'Please write a message so we know how to help.';
    }

    return [
        'valid'  => $errors === [],
        'errors' => $errors,
        'values' => $values,
    ];
}
