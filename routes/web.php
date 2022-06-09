<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HistoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('clients.index');
});



Auth::routes();
Route::resource('postomat',  PostController::class);
Route::resource('user',  UserController::class);
Route::resource('history',  HistoryController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');