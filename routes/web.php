<?php

use Illuminate\Support\Facades\Route;

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



Route::redirect('/', '/login');
Auth::routes(['register' => false]);


Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::resource('asset', App\Http\Controllers\AssetController::class);
    Route::resource('stock', App\Http\Controllers\StockController::class);
    Route::post('stock/{stock}/addAssetToStock',  [App\Http\Controllers\StockController::class, 'addAssetToStock'])->name('stock.addAssetToStock');
    Route::resource('team', App\Http\Controllers\TeamController::class);
    Route::resource('transactions', App\Http\Controllers\TransactionController::class);
    Route::resource('roles', App\Http\Controllers\RolesController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
});