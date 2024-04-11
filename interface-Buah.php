<?php

class Buah{
    private $warna;

    public function makan(){
        // kunyah
        // nyam..nyam..nyam
    }

    public function setWarna($warna){
        $this->warna = $warna;
    }
}

class Apel extends Buah{
    public function makan(){
        // kunyah
        // sampai bagian tengah
    }
}

class Jeruk extends Buah{
    public function makan(){
        // kupas
        // kunyah
    }
}

$apel = new Apel();
echo $apel->makan();
echo "<hr>";

abstract class Buah {
    private $warna;

    abstract public function makan();

    public function setWarna($warna){
        $this->warna = $warna;
    }
}

