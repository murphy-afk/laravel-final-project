<?php

use App\Http\Controllers\Api\RockController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/rocks', [RockController::class, 'index'])
    ->name('api.rocks.index');
