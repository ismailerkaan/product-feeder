<?php

namespace ProductFeeder\App\Services\Cimri;

use ProductFeeder\App\Interfaces\JsonExporter;
use ProductFeeder\App\Models\Product;
use ProductFeeder\App\Traits\FileManager;

class CimriJsonService implements JsonExporter
{
    use FileManager;

    public function export()
    {
        $products = self::getProducts();

        foreach ($products as $product) {
            $newProduct = new Product($product);
            $returnData = array(
                'product_name' => $newProduct->getName(),
                'product_id' => $newProduct->getId(),
                'product_price' => $newProduct->getPrice(),
                'product_category' => $newProduct->getCategory()
            );

            echo json_encode($returnData);
        }
    }
}