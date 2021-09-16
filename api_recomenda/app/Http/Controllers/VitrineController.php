<?php

namespace App\Http\Controllers;

use App\Repositories\MostPopular;
use Illuminate\Http\JsonResponse;

class VitrineController extends Controller
{
    private MostPopular $mostPopular;
    public function __construct(MostPopular $mostPopular)
    {
        $this->mostPopular = $mostPopular;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function vitrine(int $MaxProducts = null): JsonResponse
    {
        $this->mostPopular->setMaxProducts($MaxProducts);
        return response()->json($this->mostPopular->getAllApi());
    }
}
