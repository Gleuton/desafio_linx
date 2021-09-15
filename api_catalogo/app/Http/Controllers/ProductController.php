<?php

namespace App\Http\Controllers;

use App\Repositories\ProductsRepository;
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
        return $this->responseJson($data);
    }

    public function complete(string $id): JsonResponse
    {
        $data = $this->repository
            ->complete($id);

        return $this->responseJson($data);
    }

    private function responseJson($data): JsonResponse
    {
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
