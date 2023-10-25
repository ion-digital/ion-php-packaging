<?php

/* 
 * See license information at the package root in LICENSE.md
 */

// header(filter_input(INPUT_SERVER, 'PROTOCOL', FILTER_DEFAULT) . " 404 Not Found");
// exit;

if ((PHP_MAJOR_VERSION === 5 && PHP_MINOR_VERSION < 6) || (PHP_MAJOR_VERSION < 5)) {
    
    die('This version of Versioning is currently running on PHP version <em>' . PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION . '</em> - PHP version 5.6 or higher is required.');
}

// $autoLoadPath = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

// if (file_exists($autoLoadPath)) {
    
//     require_once($autoLoadPath);
// }

spl_autoload_register(function( /* string */ $className) {

    $dirs = [
        
        'source/',
        'builds/' . PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION,
        'builds/' . PHP_MAJOR_VERSION,
    ];

    foreach($dirs as $dir) {
    
        $classPath = __DIR__ . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';
        
        $classPath = realPath($classPath);
        
        if (file_exists($classPath)) {
            
            require_once($classPath);
            break;
        }
    }
    
}, true, true);

