<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Car as ResourcesCar;

class ApiCarController extends Controller
{


    public function brands(){
        $brands = Brand::all();

        return response()->json([
            'msg'=>'succeess',
           'status' => 1,
            'code'=>200,
            'dats'=> BrandResource::collection($brands)
        ]);
    }


    public function usedCar($id){


        $cars = Car::where('type','used')->where('brand_id',$id)->get();
        return response()->json([
            'msg'=>'succeess',
           'status' => 1,
            'code'=>200,
            'dats'=> ResourcesCar::collection($cars)
        ]);
    }



    public function newCar($id){
        $cars = Car::where('type','new')->where('brand_id',$id)->get();
        return response()->json([
            'msg'=>'succeess',
           'status' => 1,
            'code'=>200,
            'dats'=> ResourcesCar::collection($cars)
        ]);
    }

    public function addCar(Request $request)
    {
        $validate = null ;
        try{
            $this->validate = $request->validate(
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

                return response()->json([
                    'msg'=>'added succeessfully',
                   'status' => 1,
                    'code'=>200,

                ]);

        } catch (\Throwable $td){
         if($validate == false){
            return response()->json([
                'msg'=>$td->getMessage(),
               'status' => 0,
                'code'=>400,

            ]);
         }
        }
    }
}
