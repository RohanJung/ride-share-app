<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::post('/login',[LoginController::class,'Submit']);
Route::post('/login/verify',[LoginController::class,'Verify']);
