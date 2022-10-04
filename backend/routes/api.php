<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post("/login", [AuthController::class, "login"])->name("login");
Route::post("/register", [AuthController::class, "register"])->name("register"); 

Route::group(["prefix"=> "v1"], function(){

    Route::group(["middleware" => "auth:api"], function(){
        Route::post("/getUsers", [UserController::class, "getUsers"])->name("getUsers"); 
        Route::post("/getFavorites", [UserController::class, "getFavorites"])->name("getFavorites"); 
        Route::post("/getChats", [UserController::class, "getChats"])->name("getChats"); 
       

    });

});
