<?php

use App\Http\Controllers\Employee\Auth\AuthController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Employee routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Employee" middleware group. Make something great!
|
*/

//=================Employee Atuh section ==============

Route::get('employee/login', [AuthController::class, 'index'])->name('employee.show.login');

Route::post('employee/login/store', [AuthController::class, 'store'])->name('employee.store.login');

Route::get('employee/logout', [AuthController::class, 'logout'])->name('employee.logout');


Route::middleware(['Employee'])->name('employee.')->prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');

});

