<?php

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->get('/', 'HomeController:index');
$app->get('/api/cars', 'CarController:index');
$app->get('/api/car/{make}', 'CarController:showMake');
$app->get('/api/car/{make}/{model}', 'CarController:showModel');
$app->post('/api/car/add', 'CarController:store');

