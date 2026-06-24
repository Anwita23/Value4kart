<?php

/**
 * Laravel/XAMPP-compatible PHP built-in server router.
 *
 * Usage: php -S 127.0.0.1:8000 server.php
 *
 * This router serves static files (CSS, JS, images, fonts, etc.) directly
 * from the project root, and passes all other requests to Laravel via index.php.
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Map of file extensions to MIME types
$mimeTypes = [
    // Stylesheets
    'css'   => 'text/css',
    // JavaScript
    'js'    => 'application/javascript',
    'mjs'   => 'application/javascript',
    // Images
    'png'   => 'image/png',
    'jpg'   => 'image/jpeg',
    'jpeg'  => 'image/jpeg',
    'gif'   => 'image/gif',
    'webp'  => 'image/webp',
    'svg'   => 'image/svg+xml',
    'ico'   => 'image/x-icon',
    'avif'  => 'image/avif',
    // Fonts
    'woff'  => 'font/woff',
    'woff2' => 'font/woff2',
    'ttf'   => 'font/ttf',
    'otf'   => 'font/otf',
    'eot'   => 'application/vnd.ms-fontobject',
    // Documents / Data
    'json'  => 'application/json',
    'xml'   => 'application/xml',
    'pdf'   => 'application/pdf',
    'txt'   => 'text/plain',
    'map'   => 'application/json',
    // Media
    'mp4'   => 'video/mp4',
    'webm'  => 'video/webm',
    'mp3'   => 'audio/mpeg',
    'ogg'   => 'audio/ogg',
    // Archives
    'zip'   => 'application/zip',
];

// Build the real filesystem path from the project root
$rootDir    = __DIR__;
$filePath   = $rootDir . $uri;

// If the URI points to a real file (not a directory), serve it as static
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

    if (isset($mimeTypes[$ext])) {
        // Serve static file with correct Content-Type
        $mime = $mimeTypes[$ext];

        // Add charset for text-based types
        if (in_array($ext, ['css', 'js', 'mjs', 'json', 'xml', 'txt', 'map', 'svg'])) {
            $mime .= '; charset=UTF-8';
        }

        header('Content-Type: ' . $mime);
        header('Content-Length: ' . filesize($filePath));
        header('Cache-Control: public, max-age=31536000');

        readfile($filePath);
        return true;
    }

    // Unknown extension — let PHP serve it natively
    return false;
}

// No static file matched — bootstrap Laravel
define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__ . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__ . '/vendor/autoload.php';

/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__ . '/bootstrap/app.php';

use Illuminate\Http\Request;

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
