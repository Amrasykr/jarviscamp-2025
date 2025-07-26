<?php

/**
 * ========================
 * IF - ELSE DI PHP
 * ========================
 *
 * If digunakan untuk menjalankan blok kode jika kondisi bernilai true.
 * Else digunakan jika kondisi if tidak terpenuhi.
 * Else if digunakan jika ada lebih dari satu kondisi yang perlu dicek.
 *
 * Struktur umum:
 * if (kondisi) {
 *     // aksi jika kondisi true
 * } else if (kondisi lain) {
 *     // aksi jika kondisi lain true
 * } else {
 *     // aksi jika semua kondisi false
 * }
 */

// Contoh 1: Penggunaan if-else
$umur = 20;

if ($umur >= 18) {
    echo "Anda sudah dewasa.\n";
} else {
    echo "Anda masih di bawah umur.\n";
}

// Contoh 2: Penggunaan if - else if - else
$nilai = 75;

if ($nilai >= 90) {
    echo "Nilai Anda A\n";
} else if ($nilai >= 80) {
    echo "Nilai Anda B\n";
} else if ($nilai >= 70) {
    echo "Nilai Anda C\n";
} else {
    echo "Nilai Anda D\n";
}


/**
 * ========================
 * PRAKTIK: IF - ELSE DENGAN OPERATOR LOGIKA
 * ========================
 *
 * Studi kasus sederhana:
 * - Jika umur >= 18 dan punya SIM, maka boleh mengemudi.
 * - Jika umur >= 18 tapi tidak punya SIM, tampilkan "Harus punya SIM dulu".
 * - Jika umur < 18, tampilkan "Belum cukup umur untuk mengemudi".
 */


?>