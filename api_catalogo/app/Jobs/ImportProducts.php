<?php

namespace App\Jobs;

use App\Facade\ImportProductsFacade;

class ImportProducts extends Job
{
    protected array $products;

    public function __construct(array $product)
    {
        $this->products = $product;
    }

    /**
     * @throws \Exception
     */
    public function handle(): void
    {
        (new ImportProductsFacade($this->products))->import();
    }
}
