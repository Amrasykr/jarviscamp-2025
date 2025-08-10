<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/**
 * Membuat Route Sederhana dengan Method GET dan return halaman langsung dari folder resources/views
 */

/**
 * Route untuk halaman home
 * Menggunakan method GET dan mengembalikan view 'home'
 * Pastikan view 'home' ada di resources/views/home.blade.ph
 */

Route::get('/home', function () {
    return view('home');
});

