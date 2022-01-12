<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::get('/home',function(){
    return view('home');
});
// Route::get('/dashboard','DashController@index')->name('dash');
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('home',[AdminController::class,'index'])->name('admin.home');
    Route::prefix('category')->group(function(){
        // Route::get('{id}',[categoryController::class,'show'])->name('admin.category.show');
        Route::get('index',[categoryController::class,'index'])->name('admin.category.index');
        Route::get('create',[categoryController::class,'create'])->name('admin.category.create');
        Route::post('store',[categoryController::class,'store'])->name('admin.category.store');
    });
    // Route::get('/dashboard','DashController@index')->name('dash');
});
Route::prefix('user')->middleware('user')->group(function(){
    Route::get('home',[UserController::class,'index'])->name('user.home');
});
Route::prefix('client')->middleware('client')->group(function(){
    Route::get('home',[ClientController::class,'index'])->name('client.home');
});
// Route::get('admin',[AdminController::class,'index'])->name('admin.home');
// Route::get('client',[ClientController::class,'index'])->name('client.home');
// Route::get('user',[UserController::class,'index'])->name('user.home');