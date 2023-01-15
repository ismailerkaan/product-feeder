<?php

namespace ProductFeeder\App\Services\Facebook;

use ProductFeeder\App\Interfaces\JsonExporter;
use ProductFeeder\App\Models\Product;
use ProductFeeder\App\Traits\FileManager;

class FacebookJsonService implements JsonExporter
{
    use FileManager;

    public function export()
    {
        $products = self::getProducts();

        foreach ($products as $product) {
            $newProduct = new Product($product);
            $returnData = array(
                'p_name' => $newProduct->getName(),
                'uid' => $newProduct->getId(),
                'p_price' => $newProduct->getPrice(),
                'group' => $newProduct->getCategory()
            );

            echo json_encode($returnData);
        }
    }
}