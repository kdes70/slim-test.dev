<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Models\Car;
use Slim\Http\Request;
use Slim\Http\Response;

class CarController extends Controller
{

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function index(Request $request, Response $response, array $args): Response
    {
        return $response->withJson(Car::findCarsMake());
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function show(Request $request, Response $response, array $args): Response
    {
        return $response->withJson(Car::getModelCar($args['model']));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}