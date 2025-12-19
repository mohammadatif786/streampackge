<?php

use Illuminate\Support\Facades\Route;
use Vendor\StreamPackage\Http\Controllers\StreamController;

// use the prefix from the config file
Route::prefix(config('streampackage.prefix', 'stream'))->group(function () {
    Route::get('/', [StreamController::class, 'index']);


    //only register the chat route if enabled in config
    if(config('streampackage.enable_chat', true)) {
        Route::get('/chat', [StreamController::class, 'chat']);
    }
});
