<?php

/**
 * ========================
 * TIPE DATA DI PHP
 * ========================
 *
 * PHP adalah bahasa yang memiliki *dynamic typing*, artinya tipe data akan ditentukan otomatis
 * berdasarkan nilai yang diberikan.
 *
 * Berikut adalah tipe data dasar yang sering digunakan:
 */

// 1. STRING: berisi kumpulan karakter, bisa pakai "" atau ''
$nama = "Ammar";


// 2. INTEGER: bilangan bulat
$umur = 21;


// 3. FLOAT / DOUBLE: bilangan desimal
$berat = 55.5;


// 4. BOOLEAN: hanya bernilai true atau false
$isLoggedIn = true;


// 5. ARRAY: menyimpan banyak nilai sekaligus dalam satu variabel
$buah = ["apel", "jeruk", "mangga"]; // array numerik
$profil = [                         // array asosiatif
    "nama" => "Ammar",
    "kota" => "Bandung"
];

// 6. NULL: variabel tanpa nilai
$alamat = null;

/**
 * ========================
 * MENAMPILKAN TIPE DATA
 * ========================
 * Gunakan var_dump() atau gettype() untuk melihat tipe data suatu variabel
 */

echo gettype($nama); // Output: string

?>