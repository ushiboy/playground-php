<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

set_error_handler(function($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
}, E_ALL);

try {
    $handle = fopen('none', 'r');
    print("don't reach\n");
} catch (Error $e) {
    print($e->getMessage()."\n");
} catch (ErrorException $e) {
    print($e->getMessage()."\n");  // <- catch!
}

try {
    none_function();
    print("don't reach");
} catch (Error $e) {
    print($e->getMessage()."\n");  // <- catch!
} catch (ErrorException $e) {
    print($e->getMessage()."\n");
}

try {
    $result = json_decode('invalid json string');
    if (json_last_error() !== JSON_ERROR_NONE) {
      print("json decode error\n");
    }
} catch (Error $e) {
    print($e->getMessage()."\n");
} catch (ErrorException $e) {
    print($e->getMessage()."\n");
}
