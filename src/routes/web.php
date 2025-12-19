<?php

use Illuminate\Support\Facades\Route;
use Vendor\StreamPackage\Http\Controllers\StreamController;

// use the prefix from the config file
Route::prefix(config('streampackage.prefix', 'stream'))->group(function () {
    Route::get('/', [StreamController::class, 'index']);
});
