<?php

namespace App\Repositories;

use GuzzleHttp\Client;

class Catalog
{
    private Client $client_http;

    public function __construct()
    {
        $this->client_http = new Client(
            ['base_uri' => env('API_CATALOG')]
        );
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function getProduct(int $idProduct)
    {
        $uri = $idProduct.'/complete';
        $request = $this->client_http->get($uri);
        return json_decode(
            $request->getBody()->getContents(),
            false,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}