<?php

 abstract class Produk{
    private $judul;
    private $penulis;
    private $penerbit;
    
    // Akses modifier dimana protected hanya dapat diakses class yang berkaitan sedangkan private hanya dapat digunakan oleh class itu sendiri
    private $diskon = 0;

    private $harga;

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

    abstract public function getInfoProduk();
    
    public function getInfo(){
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
            $str = "Komik : " . $this->getInfo() . " -  {$this->jmlHalaman}  Halaman.";
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

        public function getInfoProduk() {
            $str = "Game : " . $this->getInfo(). " ~ {$this->waktuMain} Jam.";
            return $str;
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