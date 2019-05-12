<?php
/**
 * Attogram Project Website Builder
 * https://github.com/attogram/attogram.github.io
 */

use Attogram\Projects\AttogramWebsite;

$class = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'AttogramWebsite.php';
if (!is_readable($class)) {
    print "Fatal Error: File Not Found: {$class}\n";

    return;
}

/** @noinspection PhpIncludeInspection */
require_once $class;

try {
    new AttogramWebsite();
} catch (Throwable $error) {
    print 'Fatal Error: ' . $error->getMessage() . "\n";
}
