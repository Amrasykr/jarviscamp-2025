<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/**
 * Membuat Route Sederhana dengan Method GET dan return data langsung
 */

// Route untuk halaman utama API dengan endpoint '/'
Route::get('/', function() {
    // Mengembalikan data string sederhana
    $data = "Hallo ini dari Route API";
    return $data;
});


// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::middleware('role:karyawan')->group(function () {
        Route::get('/items', [ItemController::class, 'index']);
        Route::post('/loans', [LoanController::class, 'store']);
        Route::patch('/loans/{id}/return', [LoanController::class, 'return']);
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/loans', [LoanController::class, 'index']);
        Route::patch('/loans/{id}/approve', [LoanController::class, 'approve']);

        Route::get('/categories', [CategoryController::class, 'index']);
        Route::post('/categories', [CategoryController::class, 'store']);
        Route::put('/categories/{id}', [CategoryController::class, 'update']);
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

        Route::get('/items/{id}', [ItemController::class, 'show']);
        Route::post('/items', [ItemController::class, 'store']);
        Route::put('/items/{id}', [ItemController::class, 'update']);
        Route::delete('/items/{id}', [ItemController::class, 'destroy']);
    });
});



