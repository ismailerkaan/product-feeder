<?php

namespace ProductFeeder\App\Traits;

trait FileManager
{
    public function getProducts()
    {
        //TODO: dosya var mı yok mu kontrolü eklyebilirim dimi?
        $file = file_get_contents(__DIR__ . '/../../products.json');
        $products = json_decode($file, true);

        return $products;
    }
}