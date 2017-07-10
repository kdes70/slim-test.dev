<?php

// add error handler
$container['notFoundHandler'] = function () {
    /** @noinspection PhpUnusedParameterInspection */
    /** @noinspection PhpDocSignatureInspection */
    return function ($request, \Slim\Http\Response $response) {
        return $response
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->withJson(['message' => 'Not Found']);
    };
};

$container['notAllowedHandler'] = function () {
    /** @noinspection PhpUnusedParameterInspection */
    /** @noinspection PhpDocSignatureInspection */
    return function ($request, \Slim\Http\Response $response, array $methods) {
        return $response
            ->withStatus(405)
            ->withHeader('Allow', implode(', ', $methods))
            ->withJson(['message' => 'Method must be one of: ' . implode(', ', $methods)]);
    };
};

$container['errorHandler'] = function ($container) {
    /** @noinspection PhpUnusedParameterInspection */
    /** @noinspection PhpDocSignatureInspection */
    return function ($request, \Slim\Http\Response $response, Exception $exception) use ($container) {
        $payload = ['message' => 'Something went wrong!'];
        // if debugging enabled add trace to response
        if ($container['settings']['displayErrorDetails'] === true) {
            $payload['trace'] = $exception->getTrace();
        }
        return $response
            ->withStatus(500)
            ->withJson($payload);
    };
};