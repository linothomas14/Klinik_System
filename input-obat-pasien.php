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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/inputdata.css">

</head>

<body>
    <div class="container">
        <h1> Input Obat Pasien </h1>

        <form action="" method="POST">
            <table>
                <tr>
                    <td> <label for="nama">Nama Lengkap </label>
                    </td>
                    <td class="tab">:</td>
                    <td>
                        <?= $nama ?>
                    </td>
                </tr>

                <tr>
                    <td> <label for="keluhan">Keluhan Pasien </label>
                    </td>
                    <td class="tab">:</td>
                    <td>
                        <?= $keluhan ?>
                    </td>
                </tr>
                <tr>
                    <td> <label for="alamat">Alamat</label>
                    </td>
                    <td class="tab">:</td>
                    <td>
                        <?= $alamat ?>
                    </td>
                </tr>
                <tr>
                    <td> <label for="obat">Obat Pasien</label>
                    </td>
                    <td class="tab">:</td>
                    <td>
                        <input type="text" name="obat" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" class="btn btn-success" name="ubah-data" value="Submit" /></td>
                    <td><a class="btn btn-danger" href="admin.php" id="back2">Back</a></td>
                </tr>
            </table>


        </form>
    </div>
</body>

</html>