<?php

/**
 * ========================
 * CONSTRUCTOR DI PHP
 * ========================
 *
 * Constructor adalah method khusus yang otomatis dijalankan saat object dibuat.
 * Biasanya digunakan untuk mengatur nilai awal dari property.
 *
 * Nama method-nya selalu: __construct()
 */

// Contoh: class Animal dengan constructor
class Animal {
    public $nama;

    // Constructor
    public function __construct($namaHewan) {
        $this->nama = $namaHewan;
    }

    public function bersuara() {
        return "$this->nama bersuara...";
    }
}

// Membuat object dan langsung memberikan nama
$kucing = new Animal("Kucing Persia");
echo $kucing->bersuara(); // Output: Kucing Persia bersuara...

/**
 * ========================
 * PRAKTIK: CONSTRUCTOR DI CLASS KENDARAAN
 * ========================
 *
 * TODO:
 * 1. Buat class Kendaraan dengan constructor yang menerima merk
 * 2. Tampilkan teks: "Kendaraan [merk] siap digunakan."
 */

// class Kendaraan {
//     ...
// }

// $motor = new Kendaraan("Yamaha");

?>