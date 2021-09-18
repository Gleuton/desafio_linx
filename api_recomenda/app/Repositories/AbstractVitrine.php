<?php

namespace App\Repositories;

use GuzzleHttp\Client;

abstract class AbstractVitrine
{
    private int $maxProducts = 10;
    private Client $client_http;
    protected string $uri;
    private Catalog $catalog;

    public function __construct(Catalog $catalog)
    {
        $this->catalog = $catalog;
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

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProducts(): array
    {
        $products = [];
        $index    = 0;

        $apiResult = $this->getAllApi();

        while ($this->isIncremental($products, $apiResult, $index)) {
            $productId = $apiResult[$index]->recommendedProduct->id;
            $product   = $this->catalog->getProduct($productId);

            if (!is_null($product)) {
                $products[] = $product;
            }
            $index++;
        }

        return $products;
    }

    private function isIncremental(
        array $products,
        array $apiResult,
        int $i
    ): bool {
        return count($products) < $this->maxProducts && count($apiResult) > $i;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function getAllApi(): array
    {
        $request = $this->client_http->get($this->uri);
        return json_decode(
            $request->getBody()->getContents(),
            false,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    public function getMaxProducts(): int
    {
        return $this->maxProducts;
    }
}