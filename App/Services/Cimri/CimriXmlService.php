<?php

namespace ProductFeeder\App\Services\Cimri;

use ProductFeeder\App\Interfaces\XmlExporter;
use ProductFeeder\App\Traits\FileManager;
use SimpleXMLElement;

class CimriXmlService implements XmlExporter
{
    use FileManager;

    public function export()
    {
        $array = self::getProducts();
        $xml = new SimpleXMLElement("<?xml version=\"1.0\"?><root></root>");
        self::array_to_xml($array, $xml);
        echo $xml->asXML();
    }

    public function array_to_xml($array, &$xml)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $xml->addChild("product_id", "{$value['id']}");
                $xml->addChild("product_name", "{$value['name']}");
                $xml->addChild("product_price", "{$value['price']}");
                $xml->addChild("product_category", "{$value['category']}");
            } else {
                $xml->addChild("$key", "$value");
            }
        }
    }
}