<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Hash;

class User_Controller extends Controller
{
    //
    public function logout(){

        auth()->user()->tokens()->delete();
        return response([
            'mesaage'=>'loged out'
        ],201);
    }
    public function login(Request $r){

      
        
        $user=User::where('email','=',$r->email)->get();
        if(!$user || !Hash::check($r->password,$user->password)){
            return response([
                'mesaage'=>'vul val info des kn'
            ],404);
        }
        else{

            $token= $user->createToken($r->email)->plainTextToken;
            return response([
                'token'=>$token,
                'user'=>$user
            ],201);
        }

    }

    public function store(Request $r){



        $user=User::create([

            'name'=>$r->name,
            'email'=>$r->email,
            'password'=>Hash::make($r->password)
        ]);
       $token= $user->createToken($r->name)->plainTextToken;
       return json_encode([
           "token"=>$token,
           "user"=>$user
       ]);
    }
}
