<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Car as ResourcesCar;
use App\Http\Resources\LastNews as ResourcesLastNews;
use App\Models\LastNews;

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


    public function cars(){
        $cars = Car::all();

        return response()->json([
            'msg'=>'succeess',
           'status' => 1,
            'code'=>200,
            'dats'=> ResourcesCar::collection($cars)
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

    public function carDeatails($id){
        $car = Car::find($id);

        if($car == null)
        {
            return response()->json([
                'msg'=>'car not found ',
               'status' => 0,
                'code'=>400,

            ]);
        }


                return response()->json([
                    'msg'=>'succeess',
                   'status' => 1,
                    'code'=>200,
                    'dats'=> new ResourcesCar($car)
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




    public function updateCar(Request $request,$id)
    {
        $car = Car::find($id);

        if($car == null)
        {
            return response()->json([
                'msg'=>'car not found ',
               'status' => 0,
                'code'=>400,

            ]);
        }

        $validate = null ;
        try{
            $this->validate = $request->validate(
                [
                    'name'=>'string',
                    'engin'=>'string',
                    'brand_id'=>'numeric|',
                    'price'=>'sometimes',
                    'model_number'=>'sometimes',
                    'speed'=>'numeric',
                    'tank'=>'sometimes',
                    'seats'=>'sometimes',
                    'status'=>'sometimes',
                    'desc'=>'string',
                    'kilos'=>'numeric',
                    'img'=>'image',
                    'is_automatic'=>'sometimes',
                ]);
                $imgPath=$car->img;

    if($request->hasFile('img')){
        Storage::delete($car->img);
        $imgPath = Storage::putFile('Cars',$request->img);
    }

               $car->update([
                    'name'=>$request->name,
                    'engin'=>$request->engin,
                    'img'=>$imgPath,
                    'brand_id'=> $car->brand_id,
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
                    'msg'=>'updated succeessfully',
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


    public function last_news(){

        $lastNews = LastNews::all();


        return response()->json([
            'msg'=>'succeess',
           'status' => 1,
            'code'=>200,
            'dats'=> ResourcesLastNews::collection($lastNews)
        ]);

    }
}
