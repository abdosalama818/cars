<?php

use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CarController;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Controllers\webCarController;
use App\Models\Brand;
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

//===========Amgad==================

Route::get('brand',[webCarController::class,"brands"]);
Route::get('brand_new',[webCarController::class,"Brands_new"]);
Route::get('used/car/{id}',[webCarController::class,"usedCar"]);
Route::get('new/car/{id}',[webCarController::class,"newCar"]);
Route::get('last/cars',[webCarController::class,"last_news"]);

Route::get('details/{id}',[webCarController::class,"details"]);

Route::get('add',function(){
    $brands = Brand::all();
    return view('car.addcar' , ['brands'=>$brands]);
})->middleware(/* 'user', */'Isuser','auth');

Route::post('add/car',[webCarController::class,"addCar"]);


//===========end=====================

Route::get('/', function () {
    return view('car.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(
    [
        'middleware' => ['auth','IsAdmin'],
    ],
    function(){
        Route::get('/admin', [MainController::class, 'index'])->name('dashboard');

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
    });


