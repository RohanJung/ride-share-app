<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Sumbit(Request $request){
        $request->validate([
            'phone' => 'required|numeric|min:10',
        ]);

        $user = User::firstOrCreate([
            'phone' => $request->phone,
        ]); 

        if(!$user){
            return response()->json([
                'message' => 'User not found',
            ], 404);    
        }

        $user->notify(new LoginNotification());

        return response()->json(['message'=>"login message sent"]);
    }

    public function Verify(Request $request){
      
        // $request->validate([
        //     'phone' => 'required|numeric|digits:10',
        //     'login_code' => 'required|numeric|between:111111,999999',
        // ]); 
        
        // $user = User::where('phone', $request->phone)->where('login_code', $request->login_code)->first();
        
        // if ($user) {
        //     $user->update([
        //         'login_code' => null,
        //     ]);

        //     $token = $user->createToken($request->login_code)->plainTextToken;
        //     dd($token);
        //     return response()->json(['token' => $token]);
        // } else {
        //     return response()->json([
        //         'message' => 'Invalid login code',
        //     ], 401);
        //     dd('invalid');
        // }
        

    }
}
