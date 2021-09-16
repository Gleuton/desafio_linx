<?php

namespace App\Repositories;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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
     */
    public function getProduct(int $idProduct)
    {
        try {
            $uri = $idProduct . '/complete';
            $request = $this->client_http->get($uri)->getBody()->getContents();
            $data = json_decode(
                $request,
                false,
                512,
                JSON_THROW_ON_ERROR
            );
            if (strtolower($data->status) !== 'available'){
                return null;
            }
            return $data;
        } catch (Exception $exception) {
            return null;
        } catch (GuzzleException $e) {
            throw new $e;
        }
    }
}