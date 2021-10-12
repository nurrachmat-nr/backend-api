<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username'   =>  'required',
            'password'   =>  'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $user = User::where("username", $request->username)->first();
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['status' => false, 'message' => 'username or password do not match' ], 501);
        }

        $token = $user->createToken("polling", [$user->role])->plainTextToken;

        return response()->json(
            [ 'access_token' => $token,
              'token_type'  => "Bearer",
              'expire_in'   => 24 * 60
        ], 200);

    }
}
