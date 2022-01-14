<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('home')->group(function(){
    Route::prefix('animal')->group(function(){
        Route::get('index',[AnimalController::class,'index'])->name('home.animal.index');
        Route::get('create',[AnimalController::class,'create'])->name('home.animal.create');
        Route::post('store',[AnimalController::class,'store'])->name('home.animal.store');
        Route::delete('delete/{id}',[AnimalController::class,'destroy'])->name('home.animal.delete');
    });
});
