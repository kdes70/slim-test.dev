<?php

$container['view'] = new \Slim\Views\PhpRenderer("../resources/views/");

$container['validator'] = function ($container){
    return new App\Validation\Validator;
};

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