<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Jobs\ImportProducts;
use Illuminate\Support\Facades\Queue;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/fila', function () {
    Queue::push(new ImportProducts(['test'=>1]));
    return '{"result":true}';
});
