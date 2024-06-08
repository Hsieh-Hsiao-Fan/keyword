<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeyWordController;

Route::controller(KeyWordController::class)->group(function () {
    Route::get('/{uuid}', 'index');
    Route::post('/{uuid}', 'store');
});
