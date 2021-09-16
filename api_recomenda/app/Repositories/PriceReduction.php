<?php

namespace App\Repositories;

class PriceReduction extends AbstractVitrine
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function getAllApi(): array
    {
        $request = $this->client_http->get('pricereduction.json');
        return json_decode(
            $request->getBody()->getContents(),
            false,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}