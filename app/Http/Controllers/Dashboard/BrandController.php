<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class BrandController extends Controller
{
    public function Brands()
    {

        $brands = Brand::all();

        //dd($brands);
        if ($brands->count() !== null) {
            return view('dashboard.brand.brands', [
                'brands' => $brands
            ]);
        } else {
            return view('dashboard.brand.brands');
        }
    }


    public function addBrand()
    {
        return view('dashboard.brand.add_brand');
    }

    public function storeBrand(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'required',
        ]);

        $img_path = Storage::putFile('Brands', $request->img);
        Brand::create([
            'name' => $request->name,
            'img' => $img_path,

        ]);

        return redirect(route('brands'));
    }

    public function editBrand($id){

        $brand = Brand::findOrFail($id);
        //dd($brand);
        return view('dashboard.brand.edit_brand',[
            'brand'=>$brand
        ]);
    }


    public function updateBrand($id, Request $request)
    {



        $brand= Brand::findOrfail($id);



        $request->validate([
            'name'=>"required|string",
            'img'=>"image",

        ]);
        $imgPath=$brand->img;

        if($request->hasFile('img')){
            Storage::delete($brand->img);
            $imgPath = Storage::putFile('Brands',$request->img);
        }

        $brand->update([
            'name'=>$request->name,

            'img'=> $imgPath,
        ]);
        return redirect(route('brands'));

    }


    public function deleteBrand($id){
        $brand= Brand::findOrfail($id);
        Storage::delete($brand->img);
        $brand->delete();
        return redirect(route('brands'));

    }


    public function searchBrand(Request $request){
        $brand = $request->search;
        $brands = Brand::where('name','like',"%$brand%")->get();
        return view('dashboard.brand.brands',[
            'brands' => $brands,
            'brand'=>$brand

        ]);

    }
}

/*
if($request->hasFile('country_logo')){
    Storage::delete($country->logo);
    $imgPath = Storage::putFile('countries',$request->country_logo);
}
$imgPath=$country->logo;


 public function deleteCountry($id){
        $country= Country::findOrfail($id);
        Storage::delete($country->logo);
        $country->delete();
        return redirect('dashboard/countries');

    }


    public function searchCountry(Request $request){
        $country_data = $request->search;
        $countries = Country::where('name','like',"%$country_data%")->orWhere('code','like',"%$country_data%")->get();
        return view('dashboard.countries',[
            'countries' => $countries,
            'country_name'=>$country_data

        ]);

    }
*/
