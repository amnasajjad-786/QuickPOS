<?php

declare(strict_types=1);

/**
 * Tests for validate_contact() in src/contact_validation.php.
 * Each test calls the function directly – no web server or browser needed.
 */

function valid_input(array $overrides = []): array
{
    return array_merge([
        'name'    => 'Amna Sajjad',
        'email'   => 'amna@example.com',
        'message' => 'I would like a demo of QuickPOS for my shop.',
    ], $overrides);
}

test('empty name is rejected', function () {
    $result = validate_contact(valid_input(['name' => '']));
    assert_same(false, $result['valid'], 'form should be invalid');
    assert_true(isset($result['errors']['name']), 'name error should be set');
});

test('name of only spaces is rejected', function () {
    $result = validate_contact(valid_input(['name' => '    ']));
    assert_same(false, $result['valid'], 'whitespace-only name should be invalid');
    assert_true(isset($result['errors']['name']), 'name error should be set');
});

test('invalid email is rejected', function () {
    foreach (['amna@', 'amna.example.com', 'amna@exa mple.com'] as $email) {
        $result = validate_contact(valid_input(['email' => $email]));
        assert_same(false, $result['valid'], "'{$email}' should be invalid");
        assert_true(isset($result['errors']['email']), "email error should be set for '{$email}'");
    }
});

test('empty email is rejected', function () {
    $result = validate_contact(valid_input(['email' => '']));
    assert_same('Please enter your email address.', $result['errors']['email'] ?? null, 'empty email message');
});

test('empty message is rejected', function () {
    $result = validate_contact(valid_input(['message' => '']));
    assert_same(false, $result['valid'], 'form should be invalid');
    assert_true(isset($result['errors']['message']), 'message error should be set');
});

test('missing fields are treated as empty', function () {
    $result = validate_contact([]);
    assert_same(['name', 'email', 'message'], array_keys($result['errors']), 'all three fields should have errors');
});

test('valid input is accepted', function () {
    $result = validate_contact(valid_input());
    assert_same(true, $result['valid'], 'valid input should pass');
    assert_same([], $result['errors'], 'there should be no errors');
});

test('valid input is trimmed', function () {
    $result = validate_contact(valid_input(['name' => '  Amna Sajjad  ', 'email' => ' amna@example.com ']));
    assert_same('Amna Sajjad', $result['values']['name'], 'name should be trimmed');
    assert_same('amna@example.com', $result['values']['email'], 'email should be trimmed');
});

test('name longer than 100 characters is rejected', function () {
    $result = validate_contact(valid_input(['name' => str_repeat('a', 101)]));
    assert_same(false, $result['valid'], '101-character name should be invalid');
    assert_true(isset($result['errors']['name']), 'name error should be set');
});

test('message longer than 2000 characters is rejected', function () {
    $result = validate_contact(valid_input(['message' => str_repeat('a', 2001)]));
    assert_same(false, $result['valid'], '2001-character message should be invalid');
    assert_true(isset($result['errors']['message']), 'message error should be set');
});
