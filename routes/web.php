<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
route::get('/',[MenuController::class,'welcome'])->name('welcome');

route::post('/store',[MenuController::class,'store'])->name('store');

route::get('/create',[MenuController::class,'createMenu'])->name('createMenu');

// route::get('/page2',[PageController::class,'walawe']);
