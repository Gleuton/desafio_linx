<?php

namespace App\Jobs;

use App\Models\Images;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportProducts extends Job
{
    protected array $products;

    public function __construct(array $product)
    {
        $this->products = $product;
    }

    public function handle(): void
    {
        DB::beginTransaction();
        try {
            $product = new Products(
                [
                    'id'                => $this->products['id'],
                    'imagesSsl'         => json_encode(
                        $this->products['imagesSsl']
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
                        $this->products['specs']
                    ),
                    'extraInfo'         => json_encode(
                        $this->products['extraInfo']
                    ),
                    'customBusiness'    => json_encode(
                        $this->products['customBusiness']
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
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }
}
