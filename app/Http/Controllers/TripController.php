<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{
    public function store(Request $request){
        $rquest->validate([
            'origin'=>'required',
            'destination'=>'required',
            'destination_name'=>'required',
        ]);

        return $request->user()->trips()->create([
            'origin',
            'destination',
            'destination_name',
        ]);
    }

    public function show(Request $request,Trip $trip){
        if($trip->user->id === $request->user()->id){
            return $trip;
        }

        if($trip->driver->id === $request->user()->driver->id){
            return $trip;
        }
        return response()->json(['error'=>'Canot find the trip'],404); 
    }
}
