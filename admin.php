<?php
include("session.php");
include("header-admin.php");

$pasien = query("SELECT * FROM pasien WHERE status = 'Belum Terdata'");
$menu = "Belum Terdata";
$tombol = "Input data";
$link = "input-data-pasien.php";
$class = "hidden";
$class1 = "hidden";
$keluhan = "keluhan";
$aksi = "";
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
    switch ($menu) {
        case "Belum Terdata":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            $tombol = "Input data";
            $link = "input-data-pasien.php";
            $class = "hidden";
            break;
        case "Menunggu Dokter":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            $tombol = "Berikan obat";
            $link = "input-obat-pasien.php";
            $class = "";
            break;
        case "Menunggu Obat":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            $tombol = "Selesai";
            $link = "admin.php";
            $class = "";
            $keluhan = "obat";
            break;
        case "Pulang":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            $aksi = "hidden";
            $class = "";
            $class1 = "";
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

    <link rel="stylesheet" href="/css/admin.css">
    <title>Klinik Jotaro</title>

    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>

    <div class="table-wrapper">
        <h1><?= $menu ?></h1>
        <br>
        <div class="menu-option">
            <form action="" method="get">
                <input type="submit" name="menu" value="Belum Terdata" />
                <input type="submit" name="menu" value="Menunggu Dokter" />
                <input type="submit" name="menu" value="Menunggu Obat" />
                <input type="submit" name="menu" value="Pulang" />
            </form>
        </div>

        <br>

        <table class="table">
            <tr>
                <th>No.</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th class="<?= $class ?> wider">Nama</th>
                <th class="<?= $class ?> wider">Alamat</th>
                <?php if ($menu == "Menunggu Obat") : ?>
                    <th class="<?= $class ?>">Obat</th>
                <?php else : ?>
                    <th class="<?= $class ?>">Keluhan</th>
                <?php
                endif;
                ?>
                <th class="<?= $class1 ?> ">Obat</th>
                <th class="<?= $aksi ?>">Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($pasien as $row) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row["tanggal_masuk"]; ?></td>
                    <td><?= $row['jam_masuk'] ?></td>
                    <td class="<?= $class ?> wider"><?= $row['nama'] ?></td>
                    <td class="<?= $class ?> wider"><?= $row['alamat'] ?></td>
                    <td class="<?= $class ?> "><?= $row[$keluhan] ?></td>
                    <td class="<?= $class1 ?> "><?= $row['obat'] ?></td>


                    <td>
                        <?php if ($menu == "Menunggu Obat") : ?>
                            <form action="" method="POST">
                                <button name="aksi" value="Menunggu Obat"><?= $tombol ?></button>
                                <?php
                                if (isset($_POST["aksi"])) {
                                    $id = $row['id'];
                                    $query = "UPDATE pasien SET status = 'Pulang' WHERE id = $id ;";
                                    mysqli_query($conn, $query);
                                    header("Location:admin.php");
                                }
                                ?>
                            </form>
                        <?php
                        else :
                        ?>
                            <form action="<?php echo $link ?>" method="GET">
                                <button class="<?= $aksi ?>" name="id" value="<?= $row['id'] ?>"><?= $tombol ?> </button>
                            </form>
                        <?php
                        endif;
                        ?>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>