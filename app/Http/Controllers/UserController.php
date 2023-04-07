<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        $success = false;
        if($user){
            $success = true;
        }
         return response([
             'successful'=> $success
         ]);
    }

    public function login(Request $request){
        $user = User::where('email', $request->email)->first();
        if(!$user or !Hash::check($request->password, $user->password)){
            return "user not found or password incorrect";
        }
        $token = $user->createToken('todoapp');
        return response([
            'id'=> $user->id,
            'name'=> $user->name,
            'token'=> $token->plainTextToken,
        ]);
    }

    public function getme(Request $request){
        return $request->user();
    }
}
