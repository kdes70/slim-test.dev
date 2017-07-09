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

        $this->view->render($response, 'index.html', [ 'cards' => $cards]);

    }




}