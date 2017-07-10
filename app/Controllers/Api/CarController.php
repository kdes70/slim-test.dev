<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Models\Car;
use Slim\Http\Request;
use Slim\Http\Response;
use Respect\Validation\Validator as v;

class CarController extends Controller
{

    /**
     * list car make
     *
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
     * list car mark model
     *
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return Response
     */
    public function showMake(Request $request, Response $response, array $args): Response
    {
        return $response->withJson(Car::getModelCar($args['make']));
    }

    /**
     * list models
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function showModel(Request $request, Response $response, array $args): Response
    {
        return $response->withJson(Car::getMakeModelList($args['make'], $args['model']));
    }

    /**
     * Create new car
     *
     * @param Request $request
     * @param Response $response
     */
    public function store(Request $request, Response $response)
    {
        $validation = $this->validator->validate($request, [
            'make'  => v::noWhitespace()->notEmpty(),
            'model' => v::notEmpty(),
            'year'  => v::noWhitespace()->notEmpty()->numeric()->max(4),
            'price' => v::noWhitespace()->notEmpty()->numeric()
        ]);

//        if($validation->failed()){
//            return $response->withJson(['errors' => 1]);
//        }

        if(Car::storeCar($request->getParams())){
            return $response->withJson(['success' => 1]);
        }



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