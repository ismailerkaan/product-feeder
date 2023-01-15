<?php

namespace ProductFeeder\App\Services\Google;

use ProductFeeder\App\Interfaces\XmlExporter;
use ProductFeeder\App\Traits\FileManager;
use SimpleXMLElement;

class GoogleXmlService implements XmlExporter
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
                $xml->addChild("id", "{$value['id']}");
                $xml->addChild("name", "{$value['name']}");
                $xml->addChild("price", "{$value['price']}");
                $xml->addChild("category", "{$value['category']}");
            } else {
                $xml->addChild("$key", "$value");
            }
        }
    }
}