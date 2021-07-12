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
        die(mysqli_error($conn));
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Input data</title>

</head>

<body>
    <!-- KAGAK WORK GAK TAU KENAPA -->
    <form action="" method="POST">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Input Data Pasien</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="nama" class="col-form-label">Nama Lengkap :</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="keluhan" class="col-form-label">Keluhan Pasien :</label>
                    <input type="text" class="form-control" name="keluhan" placeholder="Keluhan">
                </div>
                <div class="form-group">
                    <label for="alamat" class="col-form-label">Alamat :</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary" name="ubah-data">Ubah Data</button> -->
            <input type="button" class="btn btn-primary" name="ubah-data" value="Ubah data" />
        </div>



        <!-- <table>
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
        </table> -->


    </form>
</body>

</html>