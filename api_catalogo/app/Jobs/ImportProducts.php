<?php

namespace App\Jobs;

use App\Models\Products;

class ImportProducts extends Job
{
    protected array $products;

    public function __construct($product)
    {
        $this->products = $product;
    }

    public function handle(): void
    {
        sleep($this->products['test']);
    }
}
