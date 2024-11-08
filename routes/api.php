<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login',[LoginController::class,'submit']);
Route::post('/login/verify',[LoginController::class,'verify']);
