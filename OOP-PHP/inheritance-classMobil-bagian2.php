<?php

// Contoh sederhana penggunaan inheritance pada class mobil

class Mobil {
    public $nama, $merk, $warna, $kecepatanMaksimal, $jumlahPenumpang;

    public function tambahKecepatan(){
        return "Kecepatan bertambah!";
    }
}

class MobilSport extends Mobil {
    public $turbo = false;

    public function jalanTurbo(){
        $this->turbo = true;
        return "Turbo dijalankan!";
    }
}

$mobil1 = new MobilSport();
echo $mobil1->tambahKecepatan();
echo "<br>";
echo $mobil1->jalanTurbo();