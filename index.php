<?php

require __DIR__ . '/vendor/autoload.php';

use ProductFeeder\Core\Route;
use ProductFeeder\App\Controllers\FeederController;

try {
    Route::get('/feed/{provider}/{type}', [FeederController::class, 'index']);

    Route::execute();
} catch (Exception $exception) {
    http_response_code($exception->getCode());
    echo $exception->getMessage();
}