<?php

/**
 * ========================
 * INHERITANCE DI PHP
 * ========================
 *
 * Inheritance (pewarisan) memungkinkan sebuah class mewarisi property dan method dari class lain.
 * Class yang diwarisi disebut "parent", class turunannya disebut "child".
 * Keyword yang digunakan: `extends`
 */

// Contoh: class induk dan class turunan
class Animal {
    public $nama;

    public function __construct($nama) {
        $this->nama = $nama;
    }

    public function bersuara() {
        return "$this->nama bersuara...";
    }
}

// Class turunan
class Cat extends Animal {
    public function bersuara() {
        return "$this->nama berkata: Meong!";
    }
}

// Penggunaan
$kucing = new Cat("Kucing Persia");
echo $kucing->bersuara(); // Output: Kucing Persia berkata: Meong!

/**
 * ========================
 * PRAKTIK: INHERITANCE KENDARAAN
 * ========================
 *
 * TODO:
 * 1. Buat class Kendaraan sebagai parent, punya method jalan()
 * 2. Buat class Motor sebagai child, tambahkan method helm()
 * 3. Buat object dan panggil semua method
 */

// class Kendaraan {
//     ...
// }

// class Motor extends Kendaraan {
//     ...
// }

// $motor = new Motor("Yamaha");
// echo $motor->jalan();
// echo $motor->helm();

?>