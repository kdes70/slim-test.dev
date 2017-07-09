<?php

session_start();

// load composers autoloader
require __DIR__ . '/../vendor/autoload.php';

// load config
$config = require __DIR__ . '/../config/config.php';

// create DI-container
$container = new \Slim\Container([
    'settings' => [
        'displayErrorDetails' => $config['debugging'],
        'db'                  => $config['db']
    ]
]);

require __DIR__ . '/../config/handler.php';

$container['view'] = new \Slim\Views\PhpRenderer("../resources/views/");

$container['HomeController'] = new App\Controllers\HomeController($container);

$container['CarController'] = new App\Controllers\Api\CarController($container);

$container['AuthController'] = new App\Controllers\Api\AuthController($container);


// prepare eloquent
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

// create app
$app = new \Slim\App($container);

$app->add(function ($request, $response, $next) {
    $route = $request->getAttribute("route");

    $methods = [];

    if (!empty($route)) {
        $pattern = $route->getPattern();

        foreach ($this->router->getRoutes() as $route) {
            if ($pattern === $route->getPattern()) {
                $methods = array_merge_recursive($methods, $route->getMethods());
            }
        }
        //Methods holds all of the HTTP Verbs that a particular route handles.
    } else {
        $methods[] = $request->getMethod();
    }

    $response = $next($request, $response);


    return $response->withHeader("Access-Control-Allow-Methods", implode(",", $methods));
});


require __DIR__ . '/../app/routers.php';

// initialize eloquent
$container->get('db');