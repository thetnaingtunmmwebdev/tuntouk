<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RepairController;
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

Auth::routes();

Route::get('/', [VehicleController::class, 'index']);
Route::get('/vehicles', [VehicleController::class, 'index']);
Route::get('/vehicles/add', [VehicleController::class, 'add']);
Route::post('/vehicles/add', [VehicleController::class, 'create']);
Route::get('/vehicles/{id}/edit', [VehicleController::class, 'edit']);
Route::post('/vehicles/{id}/edit', [VehicleController::class, 'update']);
Route::get('/vehicles/search', [VehicleController::class, 'search']);

Route::get('/repairs/{id}', [RepairController::class, 'index']);
Route::get('/repairs/{id}/add', [RepairController::class, 'add']);
Route::post('/repairs/{id}/add', [RepairController::class, 'create']);
Route::get('/repairs/{id}/edit', [RepairController::class, 'edit']);
Route::post('/repairs/{id}/edit', [RepairController::class, 'update']);
// Route::get('/repairs/search', [RepairController::class, 'search']);
