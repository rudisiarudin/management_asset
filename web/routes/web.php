<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});

Route::get('/comingsoon', function () {
    return view('comingsoon');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('profile', ProfileController::class);
    Route::resource('user', UserController::class)->middleware('can:isSuperAdmin');

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('location', LocationController::class);
    Route::resource('categories', CategoriesController::class)->middleware('can:isSuperAdmin');
    Route::resource('categories', CategoriesController::class)->middleware('can:isAdmin');
    Route::resource('asset', AssetController::class);
    Route::resource('procurement', ProcurementController::class);
    Route::delete('location/{id}', [LocationController::class, 'delete'])->name('location.delete');
});
