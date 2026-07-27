<?php
$psr4 = require __DIR__ . '/vendor/composer/autoload_psr4.php';
foreach ($psr4 as $prefix => $paths) {
    if (stripos($prefix, 'socialite') !== false || stripos($prefix, 'Laravel\\S') !== false) {
        echo $prefix . ' => ' . implode(', ', $paths) . PHP_EOL;
    }
}
