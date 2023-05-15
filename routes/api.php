<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//protected routes 
Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {

    Route::apiResource('permissions', App\Http\Controllers\Api\V1\Admin\PermissionsApiController::class);

    //Roles
    Route::apiResource('roles', App\Http\Controllers\Api\V1\Admin\RolesApiController::class);


    // Users
    Route::apiResource('users', App\Http\Controllers\Api\V1\Admin\UsersApiController::class);


    // Assets
    Route::apiResource('assets', App\Http\Controllers\Api\V1\Admin\AssetsApiController::class);

    // Teams

    Route::apiResource('teams', App\Http\Controllers\Api\V1\Admin\TeamApiController::class);

    // Stocks
    Route::apiResource('stocks', App\Http\Controllers\Api\V1\Admin\StocksApiController::class);

    // Transactions
    Route::apiResource('transactions', App\Http\Controllers\Api\V1\Admin\TransactionsApiController::class);
    
});