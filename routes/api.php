<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WarehouseController;
use App\Http\Controllers\API\BranchController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/token/create', [AuthController::class,'createToken']);


Route::middleware('auth:sanctum')->group(function () {

    //Protected Area

    Route::get('/user', [UserController::class,'getUserInfo']);

    Route::apiResource('warehouses', WarehouseController::class)
    ->middleware('can:superadmin');

    Route::get('branches/{branch}', [BranchController::class, 'show']);
    Route::apiResource('warehouses.branches', BranchController::class)->only('index');
    Route::apiResource('warehouses.devices', DeviceController::class)->only('index');

    Route::get('devices/search', [DeviceController::class, 'search'])->name('devices.search');
    Route::get('devices/{device}/status', [DeviceController::class, 'getStatus'])->name('devices.status');

});

