<?php

interface Buah{
    public function makan();
    public function setWarna($warna);
}

class Apel implements Buah, Benda{
    protected $warna;
    public function makan(){
        // kunyah
        // sampai bagian tengah
    }
    public function setWarna($warna){
        $this->warna = $warna;
    }
}

class Jeruk implements Buah{
    protected $warna;
    public function makan(){
        // kupas
        // kunyah
    }
    public function setWarna($warna){
        $this->warna = $warna;
    }
}


interface Benda {
    public function setUkuran($ukurab);
}

