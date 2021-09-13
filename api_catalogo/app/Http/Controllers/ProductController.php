<?php

namespace App\Http\Controllers;

use App\Repository\ProductsRepository;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private ProductsRepository $repository;

    public function __construct(ProductsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function compact(int $id): JsonResponse
    {
        $data = $this->repository
            ->compact($id);

        return response()->json($data);
    }

    public function complete()
    {
    }
}
