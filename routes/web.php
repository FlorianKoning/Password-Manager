<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Catagories\WifiController;
use App\Http\Controllers\Catagories\CatagorieController;


Route::get('/', function () {
    return redirect(route('dashboard.index'));
})->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');


    // All items routes
    Route::get('/items', [ItemsController::class, 'index'])->name('items.index');
    Route::get('/items/categories', [ItemsController::class, 'categories'])->name('items.categories');
    Route::post('/items/store/{catagorie}', [ItemsController::class, 'store'])->name('items.store');


    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'reset'])->name('profile.reset');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // All catagorie routes
    Route::get('/items/{catagorie}', [CatagorieController::class, 'index'])->name('catagorie.index');
    Route::post('/catagorie/add', [CatagorieController::class, 'store'])->name('catagorie.store');


    // Ajax routes
    Route::post('/ajax/password', [AjaxController::class, 'generate'])->name('ajax.generate');
    Route::post('/ajax/chart', [AjaxController::class, 'chart'])->name('ajax.chart');
    Route::get('/ajax/{item}', [AjaxController::class, 'getPassword'])->name('ajax.getPassword');
    Route::get('ajax/edit', [AjaxController::class, 'edit'])->name('ajax.edit');
});


require __DIR__.'/auth.php';
