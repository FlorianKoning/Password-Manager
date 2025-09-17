<?php 

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function() {
    Route::get('/admin/users', 'index')->name('admin.users.index');
});