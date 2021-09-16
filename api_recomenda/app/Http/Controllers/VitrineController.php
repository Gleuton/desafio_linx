<?php

namespace App\Http\Controllers;

use App\Repositories\MostPopular;
use App\Repositories\PriceReduction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

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
    public function vitrine(int $maxProducts = null): JsonResponse
    {
        $this->mostPopular->setMaxProducts($maxProducts);
        $this->priceReduction->setMaxProducts($maxProducts);

        $minutes = Carbon::now()->addMinutes(5);
        if ($maxProducts > $this->mostPopular->getMaxProducts()) {
            Cache::forget('api_vitrine');
        }

        $data = Cache::remember(
            'api_vitrine',
            $minutes,
            function () {
                $response['mostPopular']    = $this->mostPopular
                    ->getProducts();
                $response['priceReduction'] = $this->priceReduction
                    ->getProducts();

                return $response;
            }
        );

        return response()->json($data);
    }
}
