<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------

*/

// public routes
//Route::resource('products', ProductController::class);
Route::post('/register',[AuthController::class,'register']);

Route::get('/products/search/{name}',[ProductController::class,'search']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);


// protected routes
Route::group(['middleware'=> ['auth:sanctum']] ,function(){
    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::delete('/products/{id}',[ProductController::class,'destroy']);

    Route::post('/logout',[AuthController::class,'logout']);

});
