<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\User_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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





Route::get('/all',[ProductController::class,'all']);
Route::post('/all',[ProductController::class,'store']);
Route::post('/user',[User_Controller::class,'store']);
Route::post('/login',[User_Controller::class,'login']);



Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/search/{id}',[ProductController::class,'search']);
    Route::get('/logout',[User_Controller::class,'logout']);
   

});
