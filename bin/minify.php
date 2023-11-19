<?php

$base_path = '/var/www/html';

$path = $base_path . '/vendor/matthiasmullie';
require_once $path . '/minify/src/Minify.php';
require_once $path . '/minify/src/CSS.php';
require_once $path . '/minify/src/JS.php';
require_once $path . '/minify/src/Exception.php';
require_once $path . '/minify/src/Exceptions/BasicException.php';
require_once $path . '/minify/src/Exceptions/FileImportException.php';
require_once $path . '/minify/src/Exceptions/IOException.php';
require_once $path . '/path-converter/src/ConverterInterface.php';
require_once $path . '/path-converter/src/Converter.php';

use MatthiasMullie\Minify;

$path_list = [
    '/data/themes/yswallow/style.css',
    '/web/wp/wp-includes/css/dashicons.css',
    '/web/wp/wp-includes/css/dist/block-library/style.css',
    '/web/app/plugins/all-in-one-seo-pack/dist/Lite/assets/css/admin-bar.8221d1e4.css'
];

foreach ($path_list as $path) {
    $file = $base_path . $path;
    if (!is_file($file)) {
        continue;
    }
    $minifier = new Minify\CSS($file);
    $minifier->minify($file);
}
