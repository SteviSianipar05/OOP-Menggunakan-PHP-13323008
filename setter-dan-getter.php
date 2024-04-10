<?php

class Produk{
    private $judul;
    private $penulis;
    private $penerbit;
    
    // Akses modifier dimana protected hanya dapat diakses class yang berkaitan sedangkan private hanya dapat digunakan oleh class itu sendiri
    protected $diskon = 0;

    private $harga;

    public function __construct( $judul= "judul",$penulis = "penulis", $penerbit = "penerbit", 
    $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function setJudul ($judul){
        if (!is_string($judul)){
            throw new Exception("Judul harus string");
        }
        $this->judul = $judul;
    }

    public function getJudul(){
        return $this->judul;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon /100);
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk(){
        $str = " {$this->judul} | {$this->getLabel()} (Rp.$this->harga)";
        return $str;
        }
    }

    class Komik extends Produk {
        public $jmlHalaman;

        public function __construct($judul= "judul",$penulis = "penulis", $penerbit = "penerbit", 
        $harga = 0, $jmlHalaman = 0){
           
            parent::__construct($judul,$penulis,$penerbit,$harga);

           $this->jmlHalaman = $jmlHalaman;

        }
        // pada class ini kita dapat menggunakan semua function yang pada produk tampa menambahkan class apapun
        public function getInfoProduk(){
            $str = "Komik : " . parent::getInfoProduk() . " -  {$this->jmlHalaman}  Halaman.";
            return $str;
        }

    }

    class Game extends Produk {
        public $waktuMain;

        public function __construct($judul= "judul",$penulis = "penulis", $penerbit = "penerbit", 
        $harga = 0, $waktuMain = 0 ) {
            parent::__construct($judul,$penulis,$penerbit,$harga);

            $this->waktuMain = $waktuMain;

        }

        public function setDiskon($diskon){
            $this->diskon = $diskon;
        }
    

        public function getInfoProduk() {
            $str = "Game : " . parent::getInfoProduk(). " ~ {$this->waktuMain} Jam.";
            return $str;
        }
    }

        class CetakInfoProduk{
        public function cetak( Produk $produk){
            $str = "{$produk->judul} | {$produk->getLabel()} (Rp.$produk->harga)";
            return $str;
        }
    }

$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);

$produk2 = new Game("Uncharted", "Neil Dructmann","Sony Computer",250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";


$produk2->setDiskon(50);
echo $produk2->getHarga();
echo "<hr>";


// Setter
$produk1->setJudul("JudulBaru");

//Getter
echo $produk1->getJudul();