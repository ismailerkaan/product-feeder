<?php

namespace ProductFeeder\App\Services\Google;

use ProductFeeder\App\Interfaces\JsonExporter;
use ProductFeeder\App\Models\Product;
use ProductFeeder\App\Traits\FileManager;

class GoogleJsonService implements JsonExporter
{
    use FileManager;

    public function export()
    {
        $products = self::getProducts();

        foreach ($products as $product) {
            $newProduct = new Product($product);
            $returnData = array(
                'name' => $newProduct->getName(),
                'id' => $newProduct->getId(),
                'price' => $newProduct->getPrice(),
                'category' => $newProduct->getCategory()
            );

            echo json_encode($returnData);
        }
    }
}