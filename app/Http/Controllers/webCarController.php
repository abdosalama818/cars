<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class webCarController extends Controller
{
    public function usedBrands(){
        $brands = Brand::where('status','used')->get();

       return view('car.usedmodels' , ['brands' =>$brands]);
    }

    public function newBrands(){
        $brands = Brand::where('status','new')->get();

       return view('car.newmodels' , ['brands' =>$brands]);
    }



    public function details($id){


        $car = Car::findOrFail($id);
        return view('car.details' , ['car'=>$car]);

    }


    public function usedCar($id){


        $cars = Car::where('type','used')->where('brand_id',$id)->get();
        return view('car.newestcar' , ['cars'=>$cars]);

    }



    public function newCar($id){
        $cars = Car::where('type','new')->where('brand_id',$id)->get();
        return view('car.newestcar' , ['cars'=>$cars]);
    }

    public function addCar(Request $request)
    {

            $validate = $request->validate(
                [
                    'name'=>'required|string',
                    'engin'=>'required|string',
                    'brand_id'=>'required|numeric',
                    'price'=>'required',
                    'model_number'=>'required',
                    'speed'=>'required|numeric',
                    'tank'=>'required',
                    'seats'=>'required',
                    'status'=>'required',
                    'desc'=>'required|string',
                    'kilos'=>'required|numeric',
                    'img'=>'required|image',
                    'is_automatic'=>'required',
                ]);

                $imgPath = Storage::putFile('Cars',$request->img);

                Car::create([
                    'name'=>$request->name,
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

                return view('car.home');


    }


    public function last_news(){
        $cars = Car::orderBy('id','desc')->take(10)->get();

        return view('car.lastnews' , ['cars'=>$cars]);


    }
}
