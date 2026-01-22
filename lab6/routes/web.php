<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;


Route::get('/', function () {
    return view('home_client');
})->name('home');

Route::view('/about', 'about')->name('about');

Route::get('/contact', [MessageController::class, 'create'])->name('contact.create');
Route::post('/contact', [MessageController::class, 'store'])->name('contact.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::resource('products', ProductController::class);

    Route::get('/admin/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::delete('/admin/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

});
