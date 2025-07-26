<?php

/**
 * ========================
 * WHILE LOOP DI PHP
 * ========================
 *
 * Digunakan untuk menjalankan kode selama kondisi bernilai true.
 * Cocok dipakai saat jumlah perulangan tidak diketahui dengan pasti sejak awal.
 *
 * Struktur:
 * while (kondisi) {
 *     // aksi
 * }
 */

// Contoh: Menampilkan angka 1 sampai 3
$angka = 1;

while ($angka <= 3) {
    echo "Angka: $angka\n";
    $angka++; // penting: jangan lupa increment agar tidak infinite loop
}

/**
 * ========================
 * PRAKTIK: WHILE LOOP
 * ========================
 *
 * TODO:
 * 1. Buat perulangan dari angka 5 sampai 1 (mundur)
 * 2. Hentikan perulangan jika angka sudah sama dengan 2
 */

// Praktik:
$nilai = 5;

// while ( ... ) {
//     ...
// }

?>