<?php

require __DIR__ . '/../public/index.php';

$tmpStorage = '/tmp/storage';
$dirs = [
    $tmpStorage . '/app/public',
    $tmpStorage . '/framework/cache/data',
    $tmpStorage . '/framework/sessions',
    $tmpStorage . '/framework/testing',
    $tmpStorage . '/framework/views',
    $tmpStorage . '/logs',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

$_ENV['APP_CONFIG_CACHE'] = '/tmp/config.php';
$_ENV['APP_EVENTS_CACHE'] = '/tmp/events.php';
$_ENV['APP_PACKAGES_CACHE'] = '/tmp/packages.php';
$_ENV['APP_ROUTES_CACHE'] = '/tmp/routes.php';
$_ENV['APP_SERVICES_CACHE'] = '/tmp/services.php';
$_ENV['VIEW_COMPILED_PATH'] = $tmpStorage . '/framework/views';

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->useStoragePath($tmpStorage);

$app->handleRequest(Illuminate\Http\Request::capture());