<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MoodController;
use App\Http\Controllers\Admin\RarityController;
use App\Http\Controllers\Admin\RockController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/home', [DashboardController::class, 'home'])
        ->name('home');
        Route::get('/rocks', [RockController::class, 'index'])
        ->name('rocks.index');
        Route::get('/rocks/create', [RockController::class, 'create'])
        ->name('rocks.create');
        Route::post('/rocks', [RockController::class, 'store'])
        ->name('rocks.store');
        Route::delete('/rocks/{id}', [RockController::class, 'destroy'])
        ->name('rocks.destroy');
        Route::get('/rocks/{id}', [RockController::class, 'show'])
        ->name('rocks.show');
        Route::get('/rocks/{id}/edit', [RockController::class, 'edit'])
        ->name('rocks.edit');
        Route::put('/rocks/{id}', [RockController::class, 'update'])
        ->name('rocks.update');
        Route::get('/moods', [MoodController::class, 'index'])
        ->name('moods.index');
        Route::get('/moods/create', [MoodController::class, 'create'])
        ->name('moods.create');
        Route::post('/moods', [MoodController::class, 'store'])
        ->name('moods.store');
        Route::get('/moods/{id}/edit', [MoodController::class, 'edit'])
        ->name('moods.edit');
        Route::put('/moods/{id}', [MoodController::class, 'update'])
        ->name('moods.update');
        Route::delete('/moods/{id}', [MoodController::class, 'destroy'])
        ->name('moods.destroy');
        Route::get('/rarities', [RarityController::class, 'index'])
        ->name('rarities.index');
        Route::get('/rarities/create', [RarityController::class, 'create'])
        ->name('rarities.create');
        Route::post('/rarities', [RarityController::class, 'store'])
        ->name('rarities.store');
        Route::get('/rarities/{id}/edit', [RarityController::class, 'edit'])
        ->name('rarities.edit');
        Route::put('/rarities({id}', [RarityController::class, 'update'])
        ->name('rarities.update');

    });


require __DIR__.'/auth.php';
