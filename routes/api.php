<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ApiCarController;
use App\Http\Controllers\Api\UpdateUserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::group([
    'middleware' => 'api',

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});





Route::get('brands',[ApiCarController::class,"brands"]);
Route::get('used/car/{id}',[ApiCarController::class,"usedCar"]);
Route::get('new/car/{id}',[ApiCarController::class,"newCar"]);
Route::get('last/cars',[ApiCarController::class,"last_news"]);

//


Route::post('add/car',[ApiCarController::class,"addCar"])->middleware('jwt.auth');
Route::post('update/password',[UpdateUserController::class,"update_password"])->middleware('jwt.auth');

Route::post('update/name', [UpdateUserController::class, 'update_name'])->middleware('jwt.auth');


