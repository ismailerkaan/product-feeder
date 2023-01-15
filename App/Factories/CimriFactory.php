<?php

namespace ProductFeeder\App\Factories;

use ProductFeeder\App\Interfaces\AbstractFactory;
use ProductFeeder\App\Interfaces\JsonExporter;
use ProductFeeder\App\Interfaces\XmlExporter;
use ProductFeeder\App\Services\Cimri\CimriJsonService;
use ProductFeeder\App\Services\Cimri\CimriXmlService;

class CimriFactory implements AbstractFactory
{
    public function exportJson(): JsonExporter
    {
        return new CimriJsonService();
    }

    public function exportXml(): XmlExporter
    {
        return new CimriXmlService();
    }
}