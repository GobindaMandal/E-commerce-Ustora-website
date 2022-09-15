<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\Frontend\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::group(['prefix'=>'/product'], function(){
    Route::get('/addproduct',[ProductController::class,'add'])->name('product.add');
    Route::post('/storeproduct',[ProductController::class,'store'])->name('product.store');
    Route::get('/showproduct',[ProductController::class,'show'])->name('product.show');
    Route::get('/deleteproduct/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('/editproduct/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/updateproduct/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/updatestatus/{id}',[ProductController::class,'status'])->name('product.status');
});

Route::group(['prefix'=>'/user'], function(){
    Route::get('/adduser',[UserController::class,'add'])->name('user.add');
    Route::post('/storeuser',[UserController::class,'store'])->name('user.store');
    Route::get('/showuser',[UserController::class,'show'])->name('user.show');
    Route::get('/deleteuser/{id}',[UserController::class,'delete'])->name('user.delete');
    Route::get('/edituser/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::post('/updateuser/{id}',[UserController::class,'update'])->name('user.update');
});
