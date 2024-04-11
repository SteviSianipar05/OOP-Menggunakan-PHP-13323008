 <?php

// define ('NAMA', 'Stevi Greis Sianipar');
// // define tidak dapat disimpan dalam sebuah class dan disimpan diluar

// echo NAMA;
// echo "<hr>";

// const UMUR = 32;
// // dapat disimpan kedalam class sehingga menggunakan konsep oriented
// echo UMUR;


// class Coba {
//     const NAMA = 'Stevi';
// }
// echo Coba::NAMA;


//Magic Constant
echo __FILE__;
echo "<hr>";

function coba(){
    return __FUNCTION__;
}
echo coba();
echo "<hr>";

class Coba{
    public $kelas = __CLASS__;
}
$obj = new Coba;
echo $obj->kelas;
?>