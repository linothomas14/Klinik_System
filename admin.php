<?php
include("session.php");
include("header-admin.php");

$pasien = query("SELECT * FROM pasien WHERE status = 'Belum Terdata'");
$menu = "Belum terdaftar";
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
    switch ($menu) {
        case "Belum terdata":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            break;
        case "Menunggu dokter":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            break;
        case "Menunggu obat":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            break;
        case "Pulang":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/admin.css">
    <title>Klinik Jotaro</title>
</head>

<body>
    <div class="table-wrapper">
        <h1><?= $menu ?></h1>
        <br>
        <table>
            <form action="" method="get">
                <input type="submit" name="menu" value="Belum terdata" />
                <input type="submit" name="menu" value="Menunggu dokter" />
                <input type="submit" name="menu" value="Menunggu obat" />
                <input type="submit" name="menu" value="Pulang" />
            </form>

        </table>
        <br>

        <table>
            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Keluhan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($pasien as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><a href="input-data-pasien.php">

                            <button>Input data</button></a>

                    </td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row["tanggal_masuk"]; ?></td>
                    <td><?= $row['jam_masuk'] ?></td>
                    <td>Yulyano Thomas Djaya</td>
                    <td>Alamat</td>
                    <td>Keluhan</td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>