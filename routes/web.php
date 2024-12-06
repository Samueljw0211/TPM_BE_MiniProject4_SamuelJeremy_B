<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
route::get('/',[MenuController::class,'welcome'])->name('welcome');
// mekanisme penyimpenan database
route::post('/store',[MenuController::class,'store'])->name('store');
// menampilkan form create
route::get('/create',[MenuController::class,'createMenu'])->name('createMenu')->middleware('isLogin');

// menampilkan form update
Route::get('/edit/{id}',[MenuController::class,'editMenu' ])->name('editMenu');
// mekanisme update
Route::patch('/update/{id}',[MenuController::class,'updateMenu'])->name('updateMenu');

route::delete('/delete/{id}',[MenuController::class,'deleteMenu'])->name('deleteMenu');
// route::get('/page2',[PageController::class,'walawe']);


//authentication

Route::get('/register',[AuthController::class,'showRegisterForm'])->name('register');
Route::post('/register',[AuthController::class,'Register'])->name('registerStore');

Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('loginstore');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');
