<?php

namespace App\Repository;

use App\Models\Products;
use Illuminate\Database\Eloquent\Builder;

class ProductsRepository
{
    public function compact(string $id)
    {
        $result = $this->findId($id)->first();

        if (!is_null($result)) {
            $result = [
                'name'       => $result->name,
                'price'      => $result->price,
                'status'     => $result->status,
                'categories' => $result->categories
            ];
        }
        return $result;
    }

    public function complete(string $id)
    {
        $result = $this->findId($id);
        if (!is_null($result)) {
            $result = $result
                ->with('Categories')
                ->with('Skus')
                ->with('Images')
                ->with('Tags')
                ->with('Installments')
                ->with('AuditInfo')
                ->with('KitProduct')
                ->first();
        }
        return $result;
    }

    private function findId(int $id): Builder
    {
        return Products::query()->where('id', $id);
    }
}