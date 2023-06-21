<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class,'login']);

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/warehouses', [WarehouseController::class, 'index']);
    Route::post('/warehouses', [WarehouseController::class, 'store']);
    Route::get('/warehouses/{id}', [WarehouseController::class, 'show']);
    Route::put('/warehouses/{id}', [WarehouseController::class, 'update']);
    Route::delete('/warehouses/{id}', [WarehouseController::class, 'destroy']);


    Route::get('/warehouses/{warehouseId}/branches', [BranchController::class , 'index']);
    Route::post('/warehouses/{warehouseId}/branches', [BranchController::class , 'store']);
    Route::get('/branches/{id}', [BranchController::class , 'show']);
    Route::put('/branches/{id}', [BranchController::class , 'update']);
    Route::delete('/branches/{id}', [BranchController::class , 'destroy']);

    Route::post('/branches/{branchId}/devices', [DeviceController::class , 'store']);
    Route::delete('/branches/{branchId}/devices/{deviceId}', [DeviceController::class, 'destroy']);
});
