<?php

namespace App\Http\Controllers;

use App\Repositories\MostPopular;
use App\Repositories\PriceReduction;
use Illuminate\Http\JsonResponse;

class VitrineController extends Controller
{
    private MostPopular $mostPopular;
    private PriceReduction $priceReduction;

    public function __construct(
        MostPopular $mostPopular,
        PriceReduction $priceReduction
    ) {
        $this->mostPopular    = $mostPopular;
        $this->priceReduction = $priceReduction;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function vitrine(int $maxProducts = null): JsonResponse
    {
        $this->mostPopular->setMaxProducts($maxProducts);
        $response['mostPopular']    = $this->mostPopular->getProducts();
        $response['priceReduction'] = $this->priceReduction->getProducts();
        return response()->json($response);
    }
}
