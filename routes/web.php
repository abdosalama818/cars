<?php

use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CarController;
use App\Http\Controllers\Dashboard\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [MainController::class, 'index'])->name('dashboard');

Route::get('/brands', [BrandController::class, 'Brands'])->name('brands');
Route::get('/add/brand', [BrandController::class, 'addBrand'])->name('add_brand');
Route::get('/edit/brand/{id}', [BrandController::class, 'editBrand'])->name('edit_brand');
Route::get('/delete/brand/{id}', [BrandController::class, 'deleteBrand'])->name('delete_brand');
Route::post('/update/brand/{id}', [BrandController::class, 'updateBrand'])->name('update_brand');
Route::post('/store/brand', [BrandController::class, 'storeBrand'])->name('store_brand');




Route::get('/cars', [CarController::class, 'Cars'])->name('cars');
Route::get('/add/car', [CarController::class, 'addCar'])->name('add_car');
Route::get('/edit/car/{id}', [CarController::class, 'editCar'])->name('edit_car');
Route::get('/delete/car/{id}', [CarController::class, 'deleteCar'])->name('delete_car');
Route::post('/update/car/{id}', [CarController::class, 'updateCar'])->name('update_car');
Route::post('/store/car', [CarController::class, 'storeCar'])->name('store_car');



