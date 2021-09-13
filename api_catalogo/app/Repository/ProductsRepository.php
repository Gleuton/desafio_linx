<?php

namespace App\Repository;

use App\Models\Products;

class ProductsRepository
{
    public function compact(int $id)
    {
        $result = $this->findId($id);

        if (!is_null($result)) {
            $result = [
                'name'   => $result->name,
                'price'  => $result->price,
                'status' => $result->status,
                'categories'=> $result->categories
            ];
        }
        return $result;
    }

    private function findId(int $id){
        return Products::query()
                          ->where('id', $id)->first();
    }
}