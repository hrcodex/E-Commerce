<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/


Route::get('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');


Route::middleware('is_admin')->group(function () {

    //Email Sent
    Route::prefix('email')->group(function () {
        //sent email using variable
        Route::get('/mail', [AdminController::class, 'email'])->name('sentemail');
        //sent email using users emails dynamicly
        Route::get('/sent/{email}', [AdminController::class, 'sent'])->name('sent');
    });

    //Logout
    Route::prefix('admin')->group(function () {
        //admin Dashboard
        Route::get('/home', [AdminController::class, 'admin'])->name('admin.home');
        //admin Logout
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});
