<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class,'homepage']);

Route::get('/dashboard',[Dashcontroller::class,'showpost'])->middleware(['auth'])->name('dashboard');
Route::get('/edit/{id}',[Postcontroller::class,'edit'])->middleware(['auth']);
Route::put('/update/{id}',[Postcontroller::class,'update'])->middleware(['auth']);
Route::get('/delete/{id}',[Postcontroller::class,'destroy'])->middleware(['auth']);
Route::get('createpost',[PostController::class,'createpost'])->middleware(['auth'])->name('createpost');
Route::post('createpost',[PostController::class,'create'])->middleware(['auth']);
require __DIR__.'/auth.php';
