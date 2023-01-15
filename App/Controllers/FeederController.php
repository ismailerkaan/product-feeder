<?php

namespace ProductFeeder\App\Controllers;

use ProductFeeder\App\Interfaces\AbstractFactory;
use ProductFeeder\Core\Exceptions\ClassNotFoundException;
use ProductFeeder\Core\Exceptions\MethodNotFoundException;

class FeederController extends Controller
{

    public function index($data = array())
    {
        $factory = sprintf("\\ProductFeeder\\App\\Factories\\%s", ucfirst($data['provider']) . "Factory");

        if (class_exists($factory)) {
            self::exportFactory(new $factory, $data['type']);
        } else {
            throw new ClassNotFoundException();
        }
    }


    public function exportFactory(AbstractFactory $abstractFactory, $type)
    {
        $service = null;

        if ($type == "json") {
            $service = $abstractFactory->exportJson();
        } elseif ($type == "xml") {
            $service = $abstractFactory->exportXml();
        } else {
            throw new MethodNotFoundException();
        }

        //TODO: php versiyonunu yükseltip bunu kullanabilirim.
//        $service = match ($type) {
//            'json' => $abstractFactory->exportJson(),
//            'xml' => $abstractFactory->exportXml(),
//            default => throw new MethotNotFoundException()
//        };

        return $service->export();
    }
}