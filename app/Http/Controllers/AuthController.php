<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class AuthController extends Controller
{

        public function register(Request $request){

        $post_data = $request->validate([
                'firstname'=>'required|string',
                'lastname'=>'required|string',
                'email'=>'required|string|email',
                'password'=>'required|min:8'
        ]);
 
            $user = User::create([
            'firstname' => $post_data['firstname'],
            'lastname' => $post_data['lastname'],
            'email' => $post_data['email'],
            'password' => Hash::make($post_data['password']),
            'role_id' => 1,
            
            ]);
 
            $token = $user->createToken('authToken')->plainTextToken;
 
            return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            ]);
        }
 
        public function login(Request $request){
        if (!\Auth::attempt($request->only('email', 'password'))) {
               return response()->json([
                'message' => 'Login information is invalid.'
              ], 401);
        }
 
        $user = User::where('email', $request['email'])->firstOrFail();
                $token = $user->createToken('authToken')->plainTextToken;
 
            return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            ]);
        }

}