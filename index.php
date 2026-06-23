<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__ . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__ . '/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__ . '/bootstrap/app.php';

// When routes are cached, visiting the app subdirectory root (e.g. /martvill/) can fail with
// "GET is not supported for route /. Supported methods: HEAD." Rewrite to index.php so routing works.
if (file_exists($app->getCachedRoutesPath())) {
    $scriptDirectory = dirname($_SERVER['SCRIPT_NAME'] ?? '');

    if ($scriptDirectory !== '/' && $scriptDirectory !== '\\' && $scriptDirectory !== '.') {
        $requestPath = strtok($_SERVER['REQUEST_URI'] ?? '/', '?') ?: '/';
        $queryString = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== ''
            ? '?' . $_SERVER['QUERY_STRING']
            : '';

        if ($requestPath === $scriptDirectory || $requestPath === $scriptDirectory . '/') {
            $_SERVER['REQUEST_URI'] = $scriptDirectory . '/index.php' . $queryString;
        }
    }
}

$app->handleRequest(Request::capture());
