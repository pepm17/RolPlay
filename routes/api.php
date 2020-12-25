<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CharacterSheetController;
use App\Http\Controllers\HabilityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('charactersheet', CharacterSheetController::class);
Route::post('charactersheet/addHability', [CharacterSheetController::class, 'addHability']);
Route::resource('hability', HabilityController::class);

Route::resource('user', UserController::class)->middleware('auth:api');
Route::post('user/register', [AuthController::class, 'register']);
Route::post('user/login', [AuthController::class, 'login']);
Route::post('user/logout', [AuthController::class, 'logout'])->middleware('auth:api');
