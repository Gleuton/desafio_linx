<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/**
 * @OA\Info(title="API de Recomendação", version="1.0")
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
 *     path="/api/vitrine",
 *     @OA\Response(response="200", description="Sucess")
 * )
 */
$router->get(
    '/api/vitrine',
    'VitrineController@vitrine'
);
/**
 * @OA\Get(
 *     path="/api/vitrine/maxProducts/{maxProducts}",
 *     @OA\Parameter(
 *         name="maxProducts",
 *         in="path",
 *         required= true,
 *         description="Maximo de produdos por vitrine",
 *     ),
 *     @OA\Response(response="200", description="Array com Vitrines")
 * )
 */
$router->get(
    '/api/vitrine/maxProducts/{maxProducts}',
    'VitrineController@vitrine'
);
