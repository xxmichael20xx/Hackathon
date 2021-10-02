<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ShipsController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\SailsController;
use App\Http\Controllers\GraphsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get( '/dashboard', [DashboardController::class, 'dashboard'] )->name( 'dashboard' );

Route::group( ['prefix' => 'clients'], function () {
    Route::get( '', [ClientsController::class, 'index'] )->name( 'clients' );
} );

Route::group( ['prefix' => 'ships'], function () {
    Route::get( '', [ShipsController::class, 'index'] )->name( 'ships' );
} );

Route::group( ['prefix' => 'routes'], function () {
    Route::get( '', [RoutesController::class, 'index'] )->name( 'routes' );
} );

Route::group( ['prefix' => 'sails'], function () {
    Route::get( '', [SailsController::class, 'index'] )->name( 'sails' );
} );

Route::group( ['prefix' => 'graphs'], function () {
    Route::get( '', [GraphsController::class, 'index'] )->name( 'graphs' );
} );
