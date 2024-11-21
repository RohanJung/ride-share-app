<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\LoginNotification;
use App\Notifications\LoginCodeNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\StatusUpdate;

class LoginController extends Controller
{
    public function Submit(Request $request)
    {

        $validated = (int)$request->phone;

        $user = User::where('phone', $validated)->first();

        $loginCode = random_int(111111, 999999);
        if (!$user) {
            $user = User::create([
                'name'=> 'User',
                'phone' => $validated,
                'login_code' => $loginCode, 
            ]);
        }
        
        $user->notify(new LoginCodeNotification());

        return response()->json(['message' => "Login message sent"]);
    }

    public function Verify(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|digits:10',
            'login_code' => 'required|numeric|between:111111,999999',
        ]);

        $user = User::firstOrCreate([ 
            'phone' => $request->phone,
        ]);

        if ($user && $user->login_code == $request->login_code) {
            $user->update([
                'login_code' => null,
            ]);

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['token' => $token]);
        } else {
            return response()->json([
                'message' => 'Invalid login code',
            ], 401);
        }
    }

}
