<?php

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
Route::controller(\App\Http\Controllers\ClientController::class)->group(function () {
    Route::get('client','index');
    Route::get('client/{id}','show');
    Route::post('client', 'store');
    Route::post('client/{id}', 'update');
    Route::delete('client/{id}', 'destroy');
});

Route::controller(\App\Http\Controllers\AccountantController::class)->group(function () {

    Route::get('accountant','index');
    Route::get('accountant/{id}','show');
    Route::post('accountant', 'store');
    Route::post('accountant/{id}', 'update');
    Route::delete('accountant/{id}', 'destroy');
});
Route::controller(\App\Http\Controllers\InvoiceController::class)->group(function () {

    Route::get('invoice','index');
    Route::get('invoice/{id}','show');
    Route::post('invoice', 'store');
    Route::post('invoice/{id}', 'update');
    Route::delete('invoice/{id}', 'destroy');
});



