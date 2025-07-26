<?php

/**
 * ========================
 * CLASS, PROPERTY, METHOD, OBJECT
 * ========================
 *
 * - Class: cetakan/kerangka untuk membuat object
 * - Property: variabel di dalam class
 * - Method: fungsi di dalam class
 * - Object: hasil nyata (instance) dari class
 */

// Contoh class: Animal
class Animal {
    public $nama; // property

    public function bersuara() { // method
        return "Hewan ini bersuara...";
    }
}

// Membuat object dari class Animal
// $kucing = new Animal();           // instansiasi object
// $kucing->nama = "Kucing Persia";  // mengisi property
// echo $kucing->nama . " berkata: " . $kucing->bersuara(); // akses property dan method

/**
 * ========================
 * PRAKTIK: CLASS KENDARAAN
 * ========================
 *
 * TODO:
 * 1. Buat class Kendaraan dengan property merk dan method jalan().
 * 2. Buat object baru, isi merk-nya, lalu panggil method jalan().
 */

// Buat di sini:
// class Kendaraan {
//     ...
// }

// $motor = new Kendaraan();
// $motor->merk = "Yamaha";
// echo $motor->jalan();

?>