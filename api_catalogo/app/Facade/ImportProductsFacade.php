<?php

namespace App\Facade;

use App\Models\AuditInfo;
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
            $installment = $this->importInstallments();
            $auditInfo   = $this->importAuditInfo();
            $this->importProducts(
                $installment->getKey(),
                $auditInfo->getKey()
            );
            $this->importImages();
            $this->importCategory();
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

    private function importProducts(int $installment_id, int $audit): Products
    {
        $this->products['installments_id'] = $installment_id;
        $this->products['audit_info_id']   = $audit;
        $product                           = new Products(
            $this->prepareProductData($this->products)
        );
        $product->save();

        return $product;
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

    private function importInstallments(): Installments
    {
        $install = new Installments(
            $this->products['installment']
        );
        $install->save();
        return $install;
    }

    private function importSkus(): void
    {
        foreach ($this->products['skus'] as $sku) {
            $skus = new Skus(
                [
                    'sku'         => $sku['sku'],
                    'products_id' => $this->products['id']
                ]
            );
            $skus->save();
        }
    }

    private function importAuditInfo()
    {
        $auditInfo = $this->products['auditInfo'];

        $info = AuditInfo::query()
                         ->where(
                             'updatedBy',
                             $auditInfo['updatedBy']
                         )
                         ->where(
                             'updatedThrough',
                             $auditInfo['updatedThrough']
                         )
                         ->first();

        if (empty($info)) {
            $info = new AuditInfo($auditInfo);
            $info->save();
        }
        return $info ?? [];
    }
}