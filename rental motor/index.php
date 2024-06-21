
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
    <form action="" method="post">
        <center>
            <table>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td><input type="nama" name="nama" id="nama"></td>
                </tr>
                <tr>
                    <td>Lama Waktu Rental (per hari)</td>
                    <td>:</td>
                    <td><input type="waktu" name="waktu" id="waktu" ></td>
                </tr>
                <tr>
                    <td>Jenis Motor</td>
                    <td>:</td>
                    <td>
                        <select name="jenis" id="jenis">
                            <option value="scooter">Scooter</option>
                            <option value="sport">Sport</option>
                            <option value="ninja">Ninja</option>
                            <option value="vespa">Vespa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button name="kirim" type="submit">Submit</button></td>
                </tr>
            </table>
        </center>
    </form>
</body>
</html>

<?php

include "proses.php";
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $proses = new Rental();
       $proses->setHarga(70000, 90000, 150000, 100000);
        

      if (isset($_POST['nama']) && isset($_POST['waktu']) && isset($_POST['jenis'])) {
                $proses->nama = $_POST['nama'];
                $proses->waktu = $_POST['waktu'];
                 $proses->jenis = $_POST['jenis'];
                $proses->cetakPembelian();
            } else {
                echo "<center>Silahkan isi form terlebih dahulu</center>";
            }
        }

?>