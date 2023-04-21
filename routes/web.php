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
    Route::resource('team', App\Http\Controllers\TeamController::class);
    Route::resource('transactions', App\Http\Controllers\TransactionController::class);
    Route::post('transactions/{stock}/storeStock',  [App\Http\Controllers\TransactionController::class, 'storeStock'])->name('stock.addAssetToStock');
    Route::resource('roles', App\Http\Controllers\RolesController::class);
    Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
        if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            // Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
            Route::post('password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'update'])->name('password.update');
        }
    
    });