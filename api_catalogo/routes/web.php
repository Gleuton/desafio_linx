<?php

/** @var \Laravel\Lumen\Routing\Router $router */
/**
 * @OA\Info(title="API de Catalogo", version="1.0")
 */
$router->get('/', function () {
    return view('swagger');
});

$router->get('/api/docJson', function () {
    $openapi = \OpenApi\Generator::scan([__DIR__]);
    header('Content-Type: application/json');
    return $openapi->toJson();
});
/**
 * @OA\Get(
 *     path="/api/{id}/compact",
 *     tags={"Produtos"},
 *     @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required= true,
 *          description="id do produto",
 *     ),
 *     @OA\Response(
 *          response="200",
 *          description="retorna os dados basicos produto referente ao id"
 *     )
 * )
 */
$router->get(
    '/api/{id}/compact',
    'ProductController@compact'
);

/**
 * @OA\Get(
 *     path="/api/{id}/complete",
 *     tags={"Produtos"},
 *     @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required= true,
 *          description="id do produto",
 *     ),
 *     @OA\Response(
 *          response="200",
 *          description="retorna os dados completos produto referente ao id"
 *     )
 * )
 */
$router->get(
    '/api/{id}/complete',
    'ProductController@complete'
);

