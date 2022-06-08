<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CardController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::post('/register', [AuthController::class, 'register']);
//Route::post('/login', [AuthController::class, 'login']);
Route::post('/check', [AuthController::class, 'checkSms']);
Route::post('/sms', [AuthController::class, 'sendSms']);

Route::get('/list', [PostController::class, 'list']);

Route::post('/start', [PostController::class, 'startRent']);
Route::post('/end', [PostController::class, 'endRent']);

Route::post('/get_user', [PostController::class, 'getUser']);
Route::post('/get_history', [PostController::class, 'getHistoryIsTrue']);
Route::post('/get_history_user', [PostController::class, 'getHistoryOnUser']);

Route::post('/edit_user', [PostController::class, 'editUser']);

Route::post('/add_card', [CardController::class, 'addCard']);
Route::post('/delete_card', [CardController::class, 'deleteCard']);

