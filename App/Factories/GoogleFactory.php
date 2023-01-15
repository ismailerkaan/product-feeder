<?php

namespace ProductFeeder\App\Factories;

use ProductFeeder\App\Interfaces\AbstractFactory;
use ProductFeeder\App\Interfaces\JsonExporter;
use ProductFeeder\App\Interfaces\XmlExporter;
use ProductFeeder\App\Services\Google\GoogleJsonService;
use ProductFeeder\App\Services\Google\FacebookXmlService;

class GoogleFactory implements AbstractFactory
{
    public function exportJson(): JsonExporter
    {
        return new GoogleJsonService();
    }

    public function exportXml(): XmlExporter
    {
        return new FacebookXmlService();
    }
}