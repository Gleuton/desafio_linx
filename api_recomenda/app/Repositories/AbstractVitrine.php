<?php

namespace App\Repositories;

use GuzzleHttp\Client;

abstract class AbstractVitrine
{
    private int $maxProducts = 10;
    protected Client $client_http;

    public function __construct()
    {
        $this->client_http = new Client(
            ['base_uri' => env('API_WISHLIST')]
        );
    }

    public function setMaxProducts(?int $maxProducts): void
    {
        if ($maxProducts > 10) {
            $this->maxProducts = $maxProducts;
        }
    }

    public function getProducts(): array
    {
        $products = [];
        $i = 0;
        $apiResult = $this->getAllApi();
        while ($this->isIncremental($products, $apiResult, $i)) {
            $productId = $apiResult[$i]->recommendedProduct->id;
            $products[] = ($productId);
            $i++;
        }

        return $products;
    }

    private function isIncremental(
        array $products,
        array $apiResult,
        int $i
    ): bool {
        return count($products) <= $this->maxProducts && count($apiResult)>$i;
    }

    abstract public function getAllApi();
}