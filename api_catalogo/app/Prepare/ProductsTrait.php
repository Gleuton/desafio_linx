<?php

namespace App\Prepare;

trait ProductsTrait
{
    public function prepareProductData(array $product): array
    {
        return [
            'id'                => $product['id'],
            'imagesSsl'         => $product['imagesSsl'],
            'name'              => $product['name'],
            'apiKey'            => $product['apiKey'],
            'description'       => $product['description'],
            'type'              => $product['type'],
            'eanCode'           => $product['eanCode'],
            'price'             => $product['price'],
            'remoteUrl'         => $product['remoteUrl'],
            'stock'             => $product['stock'],
            'brand'             => $product['brand'],
            'basePrice'         => $product['basePrice'],
            'oldPrice'          => $product['oldPrice'],
            'published'         => $product['published'],
            'version'           => $product['version'],
            'url'               => $product['url'],
            'unit'              => $product['unit'],
            'status'            => $product['status'],
            'ungroupedId'       => $product['ungroupedId'],
            'specs'             => $product['specs'],
            'extraInfo'         => $product['extraInfo'],
            'customBusiness'    => $product['customBusiness'],
            'created'           => $product['created'],
            'clientLastUpdated' => $product['clientLastUpdated'],
            'installments_id'   => $product['installments_id'],
            'audit_info_id'   => $product['audit_info_id'],
        ];
    }
}