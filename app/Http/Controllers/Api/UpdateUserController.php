<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{




    public function update_name(Request $request)
    {
        // $user = Auth::id();

        $user = User::where('id', Auth::id())->first();



        $validate = null;
        try {
            $this->validate = $request->validate([
                'name' => '|required',

            ]);
        } catch (\Throwable $td) {
            if ($validate == false) {
                return response()->json([

                    'message' => $td->getMessage(),
                    'status' => 0,
                    'code' => 400,

                ]);
            }
        }
        $user->update([
            'name' => $request->name,

        ]);
        return response()->json([
            'message' => __('auth.success'),
            'status' => 1,
            'code' => 200,
        ]);
    }


    public function email_mobile(Request $request)
    {
        // $user = Auth::id();

        $user = User::where('id', Auth::id())->first();



        $validate = null;
        try {
            $this->validate = $request->validate([
                'email' => 'required|email|max:255',
                'mobile' => 'required|min:10|numeric',

            ]);
        } catch (\Throwable $td) {
            if ($validate == false) {
                return response()->json([

                    'message' => $td->getMessage(),
                    'status' => 0,
                    'code' => 400,

                ]);
            }
        }
        $user->update([
            'email' => $request->email,
            'mobile' => $request->mobile,

        ]);
        return response()->json([
            'message' => __('auth.success'),
            'status' => 1,
            'code' => 200,
        ]);
    }



    public function update_password(Request $request){


        $validate = null;
        try {
            $this->validate = $request->validate([
                'password' => '|required|confirmed',
                'old_password' => '|required',

            ]);
        } catch (\Throwable $td) {
            if ($validate == false) {
                return response()->json([

                    'message' => $td->getMessage(),
                    'status' => 0,
                    'code' => 400,

                ]);
            }
        }


        if(Hash::check($request->old_password, auth()->user()->password)){
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);

            return response()->json([

                'message' => __('auth.success'),
                'status' => 1,
                'code' => 200,

            ]);
        }else{

            return response()->json([

                'message' =>__('routes.old_password'),
                'status' => 0,
                'code' => 400,

            ]);
        }



    }

}
