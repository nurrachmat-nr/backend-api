<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post("/auth/login", [LoginController::class, "login"]);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::prefix('auth')->group(function () {
        //route-route yang harus dilindungi oleh token
        Route::get("/me", [UserController::class, "me"]);
        //Route::post("/logout", [LoginController::class, "logout"]);
       // Route::get("/reset_password", [LoginController::class, "logout"]);
    });
});


Route::prefix('poll')->group(function () {
    Route::post("/", [PollingContoller::class, "index"]);
});

Route::resource('/post', \App\Http\Controllers\PostController::class);

