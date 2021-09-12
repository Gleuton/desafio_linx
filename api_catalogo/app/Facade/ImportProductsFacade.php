<?php

namespace App\Facade;

use App\Models\Categories;
use App\Models\CategoriesParents;
use App\Models\Images;
use App\Models\Installments;
use App\Models\Products;
use App\Models\Skus;
use App\Prepare\ProductsTrait;
use Exception;
use Illuminate\Support\Facades\DB;

class ImportProductsFacade
{
    use ProductsTrait;

    private array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    /**
     * @throws \Exception
     */
    public function import(): void
    {
        DB::beginTransaction();
        try {
            $this->importProducts();
            $this->importImages();
            $this->importCategory();
            $this->importInstallments();
            $this->importSkus();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

    private function importImages(): void
    {
        foreach ($this->products['images'] as $key => $url) {
            $image = new Images(
                [
                    'name'        => $key,
                    'url'         => $url,
                    'products_id' => $this->products['id']
                ]
            );
            $image->save();
        }
    }

    private function importProducts(): void
    {
        $product = new Products(
            $this->prepareProductData($this->products)
        );
        $product->save();
    }

    private function importCategory(): void
    {
        foreach ($this->products['categories'] as $category) {
            $cat = new Categories(
                [
                    'name'        => $category['name'],
                    'products_id' => $this->products['id']
                ]
            );
            $cat->save();
            $this->importParent($cat->getKey(), $category);
        }
    }

    private function importParent(int $categoryId, array $category): void
    {
        foreach ($category['parents'] as $parent) {
            $cat_parent = new CategoriesParents(
                [
                    'category_id' => $categoryId,
                    'parent_id'   => $parent
                ]
            );
            $cat_parent->save();
        }
    }

    private function importInstallments(): void
    {
        $install = new Installments(
            $this->products['installment']
        );
        $install->products_id = $this->products['id'];
        $install->save();
    }

    private function importSkus(): void
    {
        foreach ($this->products['skus'] as $sku) {
            $skus = new Skus(
                [
                    'sku' => $sku['sku'],
                    'products_id' => $this->products['id']
                ]
            );

            $skus->save();
        }
    }
}