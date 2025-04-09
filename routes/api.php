<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::post('/users', UserController::class)->name('user.create');

Route::post('/login', LoginController::class)->name('login');

Route::middleware('auth:sanctum')->group( function () {
    Route::get('/billings', [BillingController::class,'index'])->name('get.billings');
    Route::get('/store', [BillingController::class,'store'])->name('get.store');
    Route::get('/update', [BillingController::class,'update'])->name('get.store');
    Route::get('/discount', [BillingController::class,'discount'])->name('get.discount');
});
