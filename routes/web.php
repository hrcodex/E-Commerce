<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\HomeController;
use App\Mail\HellowMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Fontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('frontend.home.index');
});
// Route::get('/reset', function () {
//     return view('frontend.login.reset_password');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');





// Route::get('/mail', function () {
//     Mail::to('hrridoy90@gmail.com')
//         ->send(new HellowMail());
// });
