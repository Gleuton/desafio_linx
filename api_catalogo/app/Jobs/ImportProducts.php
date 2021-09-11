<?php

namespace App\Jobs;

use App\Models\Categories;
use App\Models\CategoriesParents;
use App\Models\Images;
use App\Models\Products;
use Exception;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();
        try {
            $product = new Products(
                [
                    'id'                => $this->products['id'],
                    'imagesSsl'         => json_encode(
                        $this->products['imagesSsl'],
                        JSON_THROW_ON_ERROR
                    ),
                    'name'              => $this->products['name'],
                    'apiKey'            => $this->products['apiKey'],
                    'description'       => $this->products['description'],
                    'type'              => $this->products['type'],
                    'eanCode'           => $this->products['eanCode'],
                    'price'             => $this->products['price'],
                    'remoteUrl'         => $this->products['remoteUrl'],
                    'stock'             => $this->products['stock'],
                    'brand'             => $this->products['brand'],
                    'basePrice'         => $this->products['basePrice'],
                    'oldPrice'          => $this->products['oldPrice'],
                    'published'         => $this->products['published'],
                    'version'           => $this->products['version'],
                    'url'               => $this->products['url'],
                    'unit'              => $this->products['unit'],
                    'status'            => $this->products['status'],
                    'ungroupedId'       => $this->products['ungroupedId'],
                    'specs'             => json_encode(
                        $this->products['specs'],
                        JSON_THROW_ON_ERROR
                    ),
                    'extraInfo'         => json_encode(
                        $this->products['extraInfo'],
                        JSON_THROW_ON_ERROR
                    ),
                    'customBusiness'    => json_encode(
                        $this->products['customBusiness'],
                        JSON_THROW_ON_ERROR
                    ),
                    'created'           => $this->products['created'],
                    'clientLastUpdated' => $this->products['clientLastUpdated']
                ]
            );
            $product->save();
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

            foreach ($this->products['categories'] as $category) {
                $cat = new Categories(
                    [
                        'name'        => $category['name'],
                        'products_id' => $this->products['id']
                    ]
                );
                $cat->save();
                foreach ($category['parents'] as $parent) {
                    $cat_parent = new CategoriesParents(
                        [
                            'category_id' => $cat->getKey(),
                            'parent_id'   => $parent
                        ]
                    );
                    $cat_parent->save();
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }
}
