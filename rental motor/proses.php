<?php
class Sewa {
    public $nama,
            $waktu,
            $diskon,
            $jenis;
    protected $pajak,
            $listMember = ['lala', 'malika', 'nunet', 'ais', 'titi'];
    private $scooter, 
            $sport, 
            $ninja, 
            $vespa;
    public function __construct (){
        $this->pajak = 10000;
    }

    public function setHarga ($jenis1, $jenis2, $jenis3, $jenis4) {
        $this->scooter = $jenis1;
        $this->sport = $jenis2;
        $this->ninja= $jenis3;
        $this->vespa = $jenis4;
    }

    public function getHarga () {
        $data["scooter"] = $this->scooter;
        $data["sport"] = $this->sport;
        $data["ninja"] = $this->ninja;
        $data["vespa"] = $this->vespa;
        return $data;
    }
}
class Rental extends Sewa {
    public function setMember() {
        $member = in_array($this->nama, $this->listMember) ? "Member" : "Non Member";
        return $member;
    }

    public function getDiskon(){
        $diskon = ($this->setMember() == "Member") ? "5" : "0";
        return $diskon;
    }




    public function TotalBayar(){
            $dataHarga = $this->getHarga();
            $hargaRental = $this->waktu * $dataHarga[$this->jenis];
            $hargaPPN = $this->pajak;
            $hargaBayar = $hargaRental + $hargaPPN;
            $diskonMember = $hargaBayar * 0.05;
        if($this->setMember() == "Member") {
            $TotalBayar = $hargaBayar - $diskonMember;
        } else {
            $TotalBayar = $hargaBayar;
        }
        return $TotalBayar;
    }





 public function cetakPembelian(){
      echo "<center>";
      echo $this->nama . " anda berstatus sebagai " . $this->setMember() . ", maka anda mendapatkan diskon sebesar " . $this->getDiskon() . "%" . "<br>";
       echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari" ;
       echo  "<br>";
       echo "Harga rental perharinya: Rp. " . number_format($this->getHarga()[$this->jenis], 0, '', '.') ;
       echo "<br>";
       echo "Besar yang harus dibayar adalah Rp" . number_format($this->TotalBayar(), 0, '', '.') . "</center>";
    }
}


?>
</body>
</html>