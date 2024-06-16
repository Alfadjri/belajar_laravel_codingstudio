<?php
    // Kasus Kita amati tentang mobil 
    // Ada yang jual tentang Ferrari , porsche
    class mobil {
        // property : public , private , protectd
        // Object / variable : $nama_mobil , $warna_mobil , $merek_mobil
        public $nama_mobil = "Kuda Merah";
        public $warna_mobil = "Merah";
        public $merek_mobil = "Ferrari";

        // function atau method 
        public function hidupkan_mesin(){
            // kegiatan dari function tersebut
            return "Mobil Nyala";
        }
        public function get_nama_mobil(){
            return $this->nama_mobil;
        }
    }
    // cara memanggil kelass
    $class_mobil = new mobil();

    class Kucing{
        public $nama_kucing;
        public $warna_kucing;
        private $kehalusan_bulu = "Lembut"; // gimana Set nya atau ganti nilainya ? 

        public function ciri_ciri_kucing(){
            return "Saya punya kucing dengan nama : ". $this->nama_kucing. " Warana kucing saya " . $this->warna_kucing . " bulunya sangat ? ".$this->kehalusan_bulu;
        }
    }
    // cara manggi kelas 
    $kucing = new Kucing();
    $kucing->nama_kucing = "garfield";
    $kucing->warna_kucing = "Oren";

    // contruktor
    class kucing_garong{
        private $nama;
        private $warna;
        private $jenis;
        
        // kelass construktor
        public function __construct($nama,$warna,$jenis){
            $this->nama = $nama;
            $this->warna = $warna;
            $this->jenis = $jenis;
        }

        public function siapa_nama_garong(){
            return "Kucing garong nya bernama " . $this->nama . " Memiliki ciri-ciri dengan warna " . $this->warna.
            " jenis nya sepesialis " . $this->jenis;
        }
    }
    // cara memanggil class
    $kucing_garong = new kucing_garong("Samsul","Kulit Sawo matang","Ahli Jebol Kunci Motor");

    // interface
    class maling{
        public function mencuri(){
            return "berupa Barang atau uang";
        }
        public function status(){
            return "maling elit";
        }
    }

    class Hacker extends Maling{
        public $nama;
        public $target_barang;

        public function pencurian(){
            return "Ditemukan pencurian data yang dilakukan oleh " . $this->nama. " data yang di maling sebesar " .$this->target_barang . " GB ";
        }
    }

    $hacker = new Hacker();
    $hacker->nama = "Alfadjri";
    $hacker->target_barang = "20";
    // polimorfisme
    interface Hewan{
        public function bersuara();
    }
    class bangsat implements Hewan{
        public function bersuara(){
            return "Anjiing Kau !";
        }
    }
    class anjing implements Hewan{
        public function bersuara(){
            return "GOK !!!";
        }
    }

    function bersuara(Hewan $hewan){
        return $hewan->bersuara();
    }

    $anjing = new anjing();
    $bangsat = new bangsat();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder php | Class , Object , property , Function</title>
</head>
<body>
    <h1>Ini belajar tentang  Class, Object , Propery , function 
    <h2>Kasusknya mobil</h2>
    <p> Nama Mobil : <?php echo ($class_mobil->get_nama_mobil()) ?> </p>
    <p> Merek Mobil : <?php echo ($class_mobil->merek_mobil) ?> </p>
    <p> Jika Mobil Menyala : <?php echo ($class_mobil->hidupkan_mesin()) ?> </p>
    <br>
    <hr>
    <br>
    <h1>Contoh penggunaan enkapsulasi</h1>
    <h2>kasusnya kucing</h2>
    <p><?php echo($kucing->ciri_ciri_kucing())?></p>
    <br>
    <hr>
    <br>
    <h1>Contoh penggunaan Construktor</h1>
    <h2>kasusnya Maling atau Garong</h2>
    <p><?php echo($kucing_garong->siapa_nama_garong())?></p>
    <br>
    <hr>
    <br>
    <h1>Contoh penggunaan Interface</h1>
    <h2>kasusnya Hacker yang memiliki sifat maling</h2>
    <p> Sifat maling : <?php echo($hacker->mencuri())?></p>
    <p> Statsu Maling : <?php echo($hacker->status())?></p>
    <p> Nama Hacker : <?php echo($hacker->nama)?></p>
    <p> Ada kejadian apa hari ini : </p>
    <p> <?php echo($hacker->pencurian())?></p>

    <br>
    <hr>
    <br>
    <h1>Contoh penggunaan Polimorfisme</h1>
    <p> Kelass Suara dari Mahlukhidup</p>
    <p><?php echo(bersuara($bangsat))?></p>

    
</body>
</html>