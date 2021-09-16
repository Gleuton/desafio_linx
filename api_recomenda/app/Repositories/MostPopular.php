<?php

namespace App\Repositories;

class MostPopular extends AbstractVitrine
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function getAllApi(): array
    {
        $uri     = $this->getUrl() . 'mostpopular.json';
        $request = $this->client_http;

        return json_decode(
            $request->get($uri)->getBody()->getContents(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}