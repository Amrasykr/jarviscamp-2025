<?php

use App\Http\Controllers\ItemController;
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


// item routes
Route::get('/items', [ItemController::class, 'index']);
Route::post('/items', [ItemController::class, 'store']);
Route::put('/items/{id}', [ItemController::class, 'update']);
Route::delete('/items/{id}', [ItemController::class, 'destroy']);