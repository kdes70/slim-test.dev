<?php

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

session_start();

// load composers autoloader
require __DIR__ . '/../vendor/autoload.php';

// load config
$config = require __DIR__ . '/../config/settings.php';

// create DI-container
$container = new \Slim\Container($config);

require __DIR__ . '/handler.php';

// Set up dependencies
require __DIR__ . '/dependencies.php';

// Register middleware
require __DIR__ . '/middleware.php';

// create app
$app = new \Slim\App($container);

// Register routes
require __DIR__ . '/../app/routers.php';

// initialize eloquent
$container->get('db');