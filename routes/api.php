<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\SailsController;
use App\Http\Controllers\ShipsController;
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

Route::post( '/new-client', [ClientsController::class, 'newClient'] );
Route::post( '/new-ship', [ShipsController::class, 'newShip'] );
Route::post( '/new-sail', [SailsController::class, 'newSail'] );
Route::post( '/update-sail', [SailsController::class, 'updateSail'] );
