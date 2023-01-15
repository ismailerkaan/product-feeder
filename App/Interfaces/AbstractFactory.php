<?php

namespace ProductFeeder\App\Interfaces;

interface AbstractFactory
{
    public function exportJson(): JsonExporter;

    public function exportXml(): XmlExporter;
}