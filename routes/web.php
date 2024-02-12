<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('',[DashboardController::class , 'index'])->name('dashboard');
Route::get('/search',[DashboardController::class , 'search'])->name('search');
Route::post('/article',[ArticlesController::class , 'store'])->name('storearticle');
Route::resource('users',UserController::class)->only('show','edit','update')->middleware('auth');
Route::get('profile',[UserController::class,'profile'])->middleware('auth')->name('profile');
