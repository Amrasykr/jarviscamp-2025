<?php

/**
 * ========================
 * SWITCH DI PHP
 * ========================
 *
 * Digunakan untuk mengecek satu variabel terhadap beberapa kemungkinan nilai.
 * Cocok kalau kita ingin menentukan aksi berdasarkan satu kondisi tertentu.
 *
 * Contoh: Menentukan aktivitas berdasarkan cuaca.
 */

// Contoh: Sudah diisi
$cuaca = "hujan";

switch ($cuaca) {
    case "cerah":
        echo "Cuacanya cerah, ayo berangkat kerja!\n";
        break;
    case "hujan":
        echo "Bawa jas hujan, ya!\n";
        break;
    case "badai":
        echo "Lebih baik di rumah saja, libur dulu!\n";
        break;
    default:
        echo "Cuaca tidak diketahui, cek prakiraan dulu.\n";
        break;
}

/**
 * ========================
 * PRAKTIK: SWITCH
 * ========================
 *
 * TODO:
 * 1. Ubah nilai $cuaca di bawah ini (misalnya: cerah, hujan, badai, mendung)
 * 2. Lengkapi struktur switch untuk respon tiap kondisi
 */

$cuaca = ""; // ← Isi sendiri

switch ($cuaca) {
    // TODO: Buat case cerah, hujan, badai, dan default
}

?>