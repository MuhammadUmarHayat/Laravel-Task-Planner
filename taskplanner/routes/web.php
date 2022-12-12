<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('login',[AuthController::class,'login'])->middleware('alreadyloggedIn');
Route::post('login-user',[AuthController::class,'loginUser'])->name('login-user');
Route::get('registration',[AuthController::class,'registration'])->middleware('alreadyloggedIn');
Route::post('register-user',[AuthController::class,'registerUser'])->name('register-user');
Route::get('logout',[AuthController::class,'logout']);
Route::get('dashboard',[AuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::resource('tasks',TaskController::class)->middleware('isLoggedIn');
