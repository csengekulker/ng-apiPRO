<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\User as MyUser;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function register(Request $request) {
        $validator = Validator::make( $request->all(), [
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "confirm_password" => "required|same:password"
        ]);

        if($validator->fails()) {
            return $this->sendError( "Error validation", $validator->errors());
        }

        $input = $request->all();
        $input["password"] = bcrypt( $input[ "password"]);
        $user = MyUser::create( $input );
        $success[ "name" ] = $user->name;

        return $this->sendResponse( $success, "Sikeres regisztráció");
    }

    public function login(Request $request) {
        if (Auth::attempt( [
            "email" => $request->email,
            "password" => $request->password
        ])) {
            /** @var \App\Models\User */
            $authUser = Auth::user();
            $token = $authUser->createToken( "MyAuthApp" )->plainTextToken;
            $success[ "name" ] = $authUser->name;
            $success[ "token" ] = $token;

            return $this->sendResponse( $success, "Sikeres bejelentkezés" );

        } else {
            return $this->sendError( "Unauthorized", [ "error" => "Hibás adatok"], 401);
        }
    }
    public function logout() {        
        // auth( "sanctum" )->user()->currentAccessToken()->delete();
        return response()->json('Kijelentkezve');
    }     
}
