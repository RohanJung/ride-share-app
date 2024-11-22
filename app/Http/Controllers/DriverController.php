<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function show(Request $ruest)
    {
        $user = $request->user();
        $user->load('driver');

        return $user;

    }

    public function update(Request $request)
    {
        $request->validate([
            'year'=>'required|numeric|between:1900,2025',
            'make'=>'required',
            'model'=>'required',
            'license_plate'=>'required',
            'color'=>'required',
        ]);

        $user = $request->user();
        $user->update($request->only('name'));

        $user->driver()->updateOrCraete($request->only([
            'year',
            'make',
            'model',
            'license_plate',
            'color',
        ]));

        $user->load('driver');
        return $user;
    }   
}
