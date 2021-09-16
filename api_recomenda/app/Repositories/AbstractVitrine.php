<?php

namespace App\Repositories;

use GuzzleHttp\Client;

abstract class AbstractVitrine
{
    private string $url;
    private int $maxProducts = 10;
    protected Client $client_http;

    public function __construct(Client $client)
    {
        $this->client_http = $client;

        $this->url = env('API_WISHLIST');
    }

    public function setMaxProducts(?int $maxProducts): void
    {
        if ($maxProducts > 10) {
            $this->maxProducts = $maxProducts;
        }
    }

    public function getMaxProducts(): int
    {
        return $this->maxProducts;
    }

    protected function getUrl(): string
    {
        return $this->url;
    }

    abstract public function getAllApi();
}