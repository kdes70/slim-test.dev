<?php


$app->get('/', 'HomeController:index');


$app->get('/api/car/{id}', 'CarController:show');


$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');