<?php

declare(strict_types=1);

/**
 * Minimal test runner – no Composer or PHPUnit needed.
 *
 * Usage:  php tests/run.php
 * Exit code 0 = all tests passed, 1 = at least one failure (fails the CI job).
 */

require __DIR__ . '/../src/contact_validation.php';

final class AssertionFailed extends Exception
{
}

/** @var array<string, callable> $tests */
$tests = [];

function test(string $name, callable $fn): void
{
    global $tests;
    $tests[$name] = $fn;
}

function assert_true(bool $condition, string $message): void
{
    if (!$condition) {
        throw new AssertionFailed($message);
    }
}

function assert_same(mixed $expected, mixed $actual, string $message): void
{
    if ($expected !== $actual) {
        throw new AssertionFailed(
            $message . "\n      expected: " . var_export($expected, true) . "\n      actual:   " . var_export($actual, true)
        );
    }
}

foreach (glob(__DIR__ . '/*Test.php') as $file) {
    require $file;
}

$failed = 0;
foreach ($tests as $name => $fn) {
    try {
        $fn();
        echo "  PASS  {$name}\n";
    } catch (AssertionFailed $e) {
        $failed++;
        echo "  FAIL  {$name}\n      " . $e->getMessage() . "\n";
    }
}

$total = count($tests);
echo "\n" . ($total - $failed) . " / {$total} tests passed\n";

exit($failed === 0 ? 0 : 1);
