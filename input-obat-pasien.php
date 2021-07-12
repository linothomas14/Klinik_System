<?php

require "config.php";
$id = $_GET['id'];
$pasien = query("SELECT * FROM pasien WHERE id = $id ;");
foreach ($pasien as $row) {
    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $keluhan = $row['keluhan'];
}
if (isset($_POST['ubah-data'])) {
    $obat = $_POST['obat'];
    $query = "UPDATE pasien SET status = 'Menunggu obat', obat = '$obat' WHERE id = $id ;";
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
                <td>
                    <p><?= $nama ?></p>
                </td>
            </tr>

            <tr>
                <td> <label for="keluhan">Keluhan pasien : </label>
                </td>
                <td>
                    <p><?= $keluhan ?></p>
                </td>
            </tr>
            <tr>
                <td> <label for="alamat">Alamat : </label>
                </td>
                <td>
                    <p><?= $alamat ?></p>
                </td>
            </tr>
            <tr>
                <td> <label for="obat">Obat pasien : </label>
                </td>
                <td>
                    <input type="text" name="obat">
                </td>
            </tr>
            <td></td>
            <td><input type="submit" class="" name="ubah-data" value="Ubah data" /></td>
        </table>


    </form>
</body>

</html>