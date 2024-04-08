<?php

class Produk{
    public $judul;
    public $penulis;
    public $penerbit;
    public $harga;

    public function __construct( $judul= "judul",$penulis = "penulis", $penerbit = "penerbit", $harga = 0 ){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }
}

    class CetakInfoProduk{
        public function cetak($produk){
            $str = "{$produk->judul} | {$produk->getLabel()} (Rp. { $produk->harga})";
        }
    }

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);

$produk2 = new Produk("Uncharted", "Neil Dructmann","Sony Computer",25000);

echo "Komik : ".$produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
