<?php

require "config.php";

if (isset($_POST['ubah-data'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $keluhan = $_POST['keluhan'];
    $id = $_GET['id'];
    $query = "UPDATE pasien set nama = '$nama', keluhan = '$keluhan', alamat = '$alamat', status = 'Menunggu Dokter' WHERE id = $id ;";
    if (mysqli_query($conn, $query)) {
        header("Location: admin.php");
    } else {
        echo "GAGAL";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input data</title>

</head>

<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td> <label for="nama">Nama Lengkap : </label>
                </td>
                <td><input type="text" name="nama" placeholder="Nama Lengkap"></td>
            </tr>

            <tr>
                <td> <label for="keluhan">Keluhan pasien : </label>
                </td>
                <td><input type="text" name="keluhan" placeholder="Keluhan"></td>
            </tr>
            <tr>
                <td> <label for="alamat">Alamat : </label>
                </td>
                <td>
                    <textarea name="alamat" id="" cols="30" rows="4"></textarea>
                </td>
            </tr>
            <td></td>
            <td><input type="submit" class="" name="ubah-data" value="Ubah data" /></td>
        </table>


    </form>
</body>

</html>