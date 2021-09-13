<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/{id}/compact', 'ProductController@compact');
$router->get('/{id}/complete', 'ProductController@complete');

