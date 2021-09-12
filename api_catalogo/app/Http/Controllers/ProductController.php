<?php

namespace App\Http\Controllers;

use App\Models\Products;

class ProductController extends Controller
{
    public function __construct(Products $products)
    {
        $this->model = $products;
    }

}
