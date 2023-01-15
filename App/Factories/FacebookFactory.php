<?php

namespace ProductFeeder\App\Factories;

use ProductFeeder\App\Interfaces\AbstractFactory;
use ProductFeeder\App\Interfaces\JsonExporter;
use ProductFeeder\App\Interfaces\XmlExporter;
use ProductFeeder\App\Services\Facebook\FacebookJsonService;
use ProductFeeder\App\Services\Facebook\FacebookXmlService;

class FacebookFactory implements AbstractFactory
{
    public function exportJson(): JsonExporter
    {
        return new FacebookJsonService();
    }

    public function exportXml(): XmlExporter
    {
        return new FacebookXmlService();
    }
}