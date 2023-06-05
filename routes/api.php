<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\SaleController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('stock/kendaraan', [KendaraanController::class, 'lihatStok']);
    Route::post('jual/mobil/{id}', [MobilController::class, 'penjualan']);
    Route::post('jual/motor/{id}', [MotorController::class, 'penjualan']);
    Route::get('kendaraan/laporan', [SaleController::class, 'laporanPenjualan']);
});

