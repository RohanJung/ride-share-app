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
}
