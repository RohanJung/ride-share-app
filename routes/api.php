<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/login',[LoginController::class,'submit']);
Route::post('/login/verify',[LoginController::class,'Verify']);
