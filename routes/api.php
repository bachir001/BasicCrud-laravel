<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/addcategory', [\App\Http\Controllers\CategoryController::class,'add']);
Route::get('/getcategory', [\App\Http\Controllers\CategoryController::class,'read']);
Route::get('/getcategorybyid/{id}', [\App\Http\Controllers\CategoryController::class,'readbyid']);
Route::post('/editcategory/{id}', [\App\Http\Controllers\CategoryController::class,'upgrade']);
Route::delete('/deletecategory/{id}', [\App\Http\Controllers\CategoryController::class,'delete']);