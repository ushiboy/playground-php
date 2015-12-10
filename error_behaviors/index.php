<?php
error_reporting(E_ALL);

set_error_handler(function($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
}, E_ALL);

try {
    $handle = fopen('none', 'r');
    print("don't reach");
} catch (Error $e) {
    print($e);
} catch (ErrorException $e) {
    print($e);
}
