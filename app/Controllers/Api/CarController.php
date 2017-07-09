<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Models\Car;
use Slim\Http\Request;
use Slim\Http\Response;

class CarController extends Controller
{
    public function show(Request $request, Response $response, $args)
    {

        return $response->withJson(Car::query()->findOrFail($args['id']));

    }

}