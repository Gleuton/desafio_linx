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

    public function compact(string $id): JsonResponse
    {
        $data = $this->repository
            ->compact($id);
        if ($data) {
            return response()->json(
                [
                    "message" => "Product not found"
                ],
                404
            );
        }
        return response()->json($data);
    }

    public function complete(string $id): JsonResponse
    {
        $data = $this->repository
            ->complete($id);

        if ($data) {
            return response()->json(
                [
                    "message" => "Product not found"
                ],
                404
            );
        }
        return response()->json($data);
    }
}
