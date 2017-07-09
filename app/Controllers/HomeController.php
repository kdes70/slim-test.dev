<?php

namespace App\Controllers;

use App\Models\Car;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController extends Controller
{


    public function index(Request $request, Response $response, array $args)
    {
        $cards = Car::query()->orderBy('id', 'asc')->get();

        return $response->withJson($cards);

    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {

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