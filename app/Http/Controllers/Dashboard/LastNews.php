<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\LastNews as ModelsLastNews;

class LastNews extends Controller
{
    public function Last()
    {

        $lasts = ModelsLastNews::all();

        //dd($brands);
        if ($lasts->count() !== null) {
            return view('dashboard.lastnew.lasts', [
                'lasts' => $lasts
            ]);
        } else {
            return view('dashboard.lastnew.lasts');
        }
    }


    public function addLast()
    {
        return view('dashboard.lastnew.add_last');
    }




    public function storeLast(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'img' => 'required',
        ]);

        $img_path = Storage::putFile('LastNews', $request->img);
        ModelsLastNews::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'img' => $img_path,

        ]);

        return redirect(route('lasts'));
    }


    public function editLast($id){

        $last = ModelsLastNews::findOrFail($id);
        //dd($brand);
        return view('dashboard.lastnew.edit_lasts',[
            'last'=>$last
        ]);
    }



    public function updateLast($id, Request $request)
    {



        $last = ModelsLastNews::findOrFail($id);



        $request->validate([
            'name'=>"required|string",
            'desc'=>"required|string",
            'img'=>"image",

        ]);
        $imgPath=$last->img;

        if($request->hasFile('img')){
            Storage::delete($last->img);
            $imgPath = Storage::putFile('LastNews', $request->img);

        }

        $last->update([
            'name'=>$request->name,
            'desc'=>$request->desc,

            'img'=> $imgPath,
        ]);
        return redirect(route('lasts'));

    }

    public function deleteLast($id){
        $last = ModelsLastNews::findOrFail($id);
        Storage::delete($last->img);
        $last->delete();
        return redirect(route('lasts'));

    }



    public function searchLast(Request $request){
        $last = $request->search;
        $lasts = ModelsLastNews::where('name','like',"%$last%")->orWhere('desc','like',"%$last%")->get();
        return view('dashboard.lastnew.lasts',[
            'lasts' => $lasts,
            'last'=>$last

        ]);

    }

}

