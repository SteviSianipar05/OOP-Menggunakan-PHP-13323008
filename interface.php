<?php

interface InfoProduk{
    public function getInfoProduk();
}

abstract class Produk{
    protected $judul;
    protected $penulis;
    protected $penerbit;
    
    // Akses modifier dimana protected hanya dapat diakses class yang berkaitan sedangkan private hanya dapat digunakan oleh class itu sendiri
    protected $diskon = 0;

    protected $harga;

    public function __construct( $judul= "judul",$penulis = "penulis", $penerbit = "penerbit", 
    $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function setJudul ($judul){
        //if (!is_string($judul)){ throw new Exception("Judul harus string");} dapat gunakan untuk merperaman 
        $this->judul = $judul;
    }

    public function getJudul(){
        return $this->judul;
    }

    public function setpenulis ( $penulis){
        $this->penulis = $penulis;
    }

    public function getpenulis (){
        return $this->penulis;
    }

    public function setPenerbit ( $penerbit){
        $this->penerbit = $penerbit;
    }

    public function getPenerbit ( $penerbit){
        $this->penerbit = $penerbit;
    }

    public function setDiskon($diskon){
        $this->diskon = $diskon;
    }

    public function getDiskon(){
        return $this->diskon;
    }
    
    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon /100);
    }

    public function setHarga($harga){
        $this->harga = $harga; 
    }

    public function getLabel(){
        return "$this->penulis, $this->penerbit";
    }
    
    abstract public function getInfo();

}
class Komik extends Produk implements InfoProduk {
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfo() {
        return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    }

    public function getInfoProduk() {
        return "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
    }
}

class Game extends Produk implements InfoProduk {
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }    

    public function getInfo() {
        return "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    }

    public function getInfoProduk() {
        return "Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
    }
}
        class CetakInfoProduk{
            public $daftarProduk = array();

            public function tambahProduk( Produk $produk){
                $this->daftarProduk[] = $produk; 
            }

            public function cetak(){
            $str = "DAFTAR PRODUK : <br>";

            foreach( $this->daftarProduk as $p){
                $str .= "- {$p->getInfoProduk()} <br>";
            }

            return $str;
        }
    }


$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);

$produk2 = new Game("Uncharted", "Neil Dructmann","Sony Computer",250000, 50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk ( $produk1);
$cetakProduk->tambahProduk ( $produk2);
echo $cetakProduk->cetak();
