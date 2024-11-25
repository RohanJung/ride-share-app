<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::post('/login',[LoginController::class,'Submit']);
Route::post('/login/verify',[LoginController::class,'Verify']);


Route::get('/driver',[DriverController::class,'show']);
Route::post('/driver',[DriverController::class,'update']);

Route::post('/trip',[TripController::class,'store']);
Route::post('/trip/{trip}',[TripController::class,'show']);
Route::post('/trip/{trip}/accept',[TripController::class,'accept']);
Route::post('/trip/{trip}/start',[TripController::class,'start']);  
Route::post('/trip/{trip}/end',[TripController::class,'end']);
Route::post('/trip/{trip}/location',[TripController::class,'location']);

Route::get('/user', function(Request $request){
    return $request->user();
});

