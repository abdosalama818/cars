<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\LastNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class webCarController extends Controller
{
   /*  public function usedBrands(){
        $brands = Brand::where('status','used')->get();

       return view('car.usedmodels' , ['brands' =>$brands]);
    } */

    public function Brands(){
        $brands = Brand::all();




       return view('car.used_brand' , ['brands' =>$brands]);
    }


    public function Brands_new(){
        $brands = Brand::all();



       return view('car.brand_new' , ['brands' =>$brands]);
    }




    public function usedCar($id){


        $cars = Car::where('type','used')->where('brand_id',$id)->get();


        return view('car.newestcar' , ['cars'=>$cars]);

    }



    public function newCar($id){
        $cars = Car::where('type','new')->where('brand_id',$id)->get();
        return view('car.newestcar' , ['cars'=>$cars]);
    }


    public function details($id){


        $car = Car::findOrFail($id);
        return view('car.details' , ['car'=>$car]);

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
                   /*  'status'=>'required', */
                    'desc'=>'required|string',
                    'kilos'=>'required|numeric',
                    'img'=>'required|image',
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
                  /*   'type'=>$request->status, */
                    'seats'=>$request->seats,
                    'desc'=>$request->desc,
                    'kilos'=>$request->kilos,
                    'is_automatic'=>$request->is_automatic,
                ]);

                return view('car.home');


    }


    public function last_news(){
/*         dd('dddddddddd');
 */        $cars = LastNews::all();

        return view('car.lastnews' , ['cars'=>$cars]);


    }
}
