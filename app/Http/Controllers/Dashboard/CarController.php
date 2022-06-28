<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
public function Cars(){
    $cars = Car::all();
    if($cars !==null){
        return view('dashboard.car.cars',[
            'cars'=>$cars
        ]);
    }else{
        return view('dashboard.car.cars');
    }
}


public function addCar(){
    $brands = Brand::all();
    return view('dashboard.car.add_car',[
        'brands'=>$brands
    ]);

}

public function storeCar(Request $request){

    $request->validate([
        'name'=>'required|string',
        'engin'=>'required|string',
        'brand_id'=>'required|numeric',
        'price'=>'required',
        'model_number'=>'required',
        'speed'=>'required',
        'tank'=>'required',
        'seats'=>'required',
        'status'=>'required',
        'desc'=>'required|string',
        'kilos'=>'required',
        'img'=>'required',
        'is_automatic'=>'required',
    ]);



    $imgPath = Storage::putFile('Cars',$request->img);

    Car::create([
        'name'=>$request->name,
        'user_id'=>Auth::id(),
        'engin'=>$request->engin,
        'img'=>$imgPath,
        'brand_id'=>$request->brand_id,
        'price'=>$request->price,
        'model_number'=>$request->model_number,
        'speed'=>$request->speed,
        'fual_tank'=>$request->tank,
        'type'=>$request->status,
        'seats'=>$request->seats,
        'desc'=>$request->desc,
        'kilos'=>$request->kilos,
        'is_automatic'=>$request->is_automatic,
    ]);

    return redirect(route('cars'));

}

public function editCar($id){
    $car = Car::findOrFail($id);
    $brands = Brand::all();
    return view('dashboard.car.edit_car',[
        'car'=>$car,
        'brands'=>$brands,
    ]);

}


public function updateCar(){

}


public function deleteCar(){

}
}
