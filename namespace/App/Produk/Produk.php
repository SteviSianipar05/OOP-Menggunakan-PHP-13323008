<?php


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