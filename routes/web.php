<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeyWordController;

Route::prefix('keyword')->controller(KeyWordController::class)->group(function () {
    Route::get('/eyJpdiI6IllHeHVBYzJFSHRGRkNrL3YxbU', 'calcChart');
    Route::get('/{uuid}', 'index');
    Route::post('/{uuid}', 'store');
});
