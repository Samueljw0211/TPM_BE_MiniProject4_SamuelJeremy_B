<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\MenuApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::GET('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::POST("/register",[AuthApiController::class,'Register']);
Route::POST("/login",[AuthApiController::class,'Login']);

Route::get('/login',function(){
    return response()->json([
        'success'=>false,
        'message'=> 'You are not logged in please login first'
    ]);
})->name('login');

Route::middleware('auth:api')->post('/logout', [AuthApiController::class, 'Logout']);

// Route::middleware(['auth:api'])->group(function() {
//     Route::GET('/',[MenuApiController::class,'index']);
//     Route::POST('/store',[MenuApiController::class,'save']);
//     Route::PATCH('/update/{id}',[MenuApiController::class,'update']);
//     Route::DELETE('/delete/{id}',[MenuApiController::class,'delete']);
// });
// route controller grouping
Route::middleware('auth:api')->controller(MenuApiController::class)->group(function() {
    Route::GET('/','index');
    Route::POST('/store','save');
    Route::PATCH('/update/{id}','update');
    Route::DELETE('/delete/{id}','delete');
});

// ini kalau mau prefix library di postman nya hrus pake /library awalanya
// Route::prefix('library')->middleware('auth:api')->controller(MenuApiController::class)->group(function() {
//     Route::GET('/','index');
//     Route::POST('/store','save');
//     Route::PATCH('/update/{id}','update');
//     Route::DELETE('/delete/{id}','delete');
// });

