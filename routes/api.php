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

use App\Http\Controllers\EmployeeController;
Route::resource('employees', EmployeeController::class);

use App\Http\Controllers\VehicleTypeController;
Route::resource('vehicle-types', VehicleTypeController::class);

use App\Http\Controllers\MembershipController;
Route::resource('memberships', MembershipController::class);

use App\Http\Controllers\HourlyRateController;
Route::resource('hourly-rates', HourlyRateController::class);

use App\Http\Controllers\MemberController;
Route::resource('members', MemberController::class);

use App\Http\Controllers\VehicleController;
Route::resource('vehicles', VehicleController::class);

use App\Http\Controllers\ParkingDataController;
Route::resource('parking-data', ParkingDataController::class);