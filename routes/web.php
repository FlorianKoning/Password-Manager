<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AclMiddleware;
use App\Http\Controllers\DashboardController;

Route::middleware(AclMiddleware::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    require __DIR__.'/admin.php';
});


require __DIR__.'/auth.php';
