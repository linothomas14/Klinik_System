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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/inputdata.css">
    <title>Input data</title>

</head>

<body>
    <div class="container">
        <h1> Input Data Pasien </h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <td> <label for="nama">Nama Lengkap : </label></td>
                </tr>

                <tr>
                    <td><input type="text" name="nama" placeholder="Nama Lengkap" required></td>
                </tr>

                <tr>
                    <td> <label for="keluhan">Keluhan Pasien : </label>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="keluhan" placeholder="Keluhan" required></td>
                </tr>
                <tr>
                    <td> <label for="alamat">Alamat : </label>
                    </td>
                </tr>
                <td>
                    <textarea name="alamat" id="" cols="30" rows="4" required></textarea>
                </td>
                </tr>

                <td><input type="submit" class="btn btn-success" name="ubah-data" value="Submit" /></td>
                <td><a class="btn btn-danger" href="admin.php" id="back">Back</a></td>
            </table>


        </form>
    </div>
</body>

</html>