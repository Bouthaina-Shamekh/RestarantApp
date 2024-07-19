<?php

use App\Http\Controllers\DeliveryAgent\Auth\AuthController;
use App\Http\Controllers\DeliveryAgent\DeliveryAgentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DeliveryAgent Routes
|--------------------------------------------------------------------------
|
| Here is where you can register DeliveryAgent routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "DeliveryAgent" middleware group. Make something great!
|
*/

//=================Delivery Agent Atuh section ==============

Route::get('deliveryAgent/login', [AuthController::class, 'index'])->name('deliveryAgent.show.login');

Route::post('deliveryAgent/login/store', [AuthController::class, 'store'])->name('deliveryAgent.store.login');

Route::get('deliveryAgent/logout', [AuthController::class, 'logout'])->name('deliveryAgent.logout');


Route::middleware(['DeliveryAgent'])->name('deliveryAgent.')->prefix('deliveryAgent')->group(function () {
    Route::get('/', [DeliveryAgentController::class, 'index'])->name('index');

});
