<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login/google',[GoogleController::class,'login']);
Route::get('login/google/callback',[GoogleController::class,'callback']);

Route::middleware(['auth'])->group(function(){
    Route::get('logout',[GoogleController::class,'logout']);
    Route::get('user',[GoogleController::class,'index']);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


