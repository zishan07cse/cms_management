<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('category',App\Http\Controllers\CategoryController::class);
Route::resource('blog',App\Http\Controllers\BlogController::class);
Route::post('ajaxRequest', [App\Http\Controllers\BlogController::class, 'ajaxRequestPost'])->name('ajaxRequest.post');

