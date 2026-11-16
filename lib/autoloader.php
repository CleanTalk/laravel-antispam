<?php

/**
 * Autoloader for the CleanTalk common libraries bundled into lib/Cleantalk/Common
 * (installed and updated by cleantalk/apbct-installer via "composer update").
 */

spl_autoload_register(function ($class) {
    if (strpos($class, 'Cleantalk\\Common\\') !== 0) {
        return;
    }

    $class_file = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($class_file)) {
        require_once $class_file;
    }
});
