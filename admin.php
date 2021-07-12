<?php
include("session.php");
include("header-admin.php");

$pasien = query("SELECT * FROM pasien WHERE status = 'Belum Terdata'");
$menu = "Belum Terdata";
$tombol = "Input data";
$link = "input-data-pasien.php";
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
    switch ($menu) {
        case "Belum Terdata":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            $tombol = "Input data";
            $link = "input-data-pasien.php";
            break;
        case "Menunggu Dokter":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            $tombol = "Berikan obat";
            $link = "input-obat-pasien.php";
            break;
        case "Menunggu Obat":
            $pasien = query("SELECT * FROM pasien WHERE status = '$menu'");
            $tombol = "Selesai";
            $link = "admin.php";
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

    <link rel="stylesheet" href="/css/admin.css">
    <title>Klinik Jotaro</title>
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
                <th class="belumTerdata">Nama</th>
                <th class="belumTerdata">Alamat</th>
                <?php if ($menu == "Menunggu Obat") : ?>
                    <th class="belumTerdata">Obat</th>
                <?php else : ?>
                    <th class="belumTerdata">Keluhan</th>
<<<<<<< HEAD
                <?php
                endif;
                ?>

                <th>Aksi</th>

                <div>
                    <?php switch ($menu):
                        case ("Belum Terdaftar"): ?>
                            <!-- Ini di belum terdaftar apa belum terdata? -->
                            <div>
                                <style>
                                    th.belumTerdata {
                                        display: none;
                                    }

                                    td.belumTerdata {
                                        display: none;
                                    }
                                </style>
                            </div>
                            <?php break; ?>
                        <?php
                        case ("Belum Terdata"): ?>
                            <!-- Ini di belum terdaftar apa belum terdata? -->
                            <div>
                                <style>
                                    th.belumTerdata {
                                        display: none;
                                    }

                                    td.belumTerdata {
                                        display: none;
                                    }
                                </style>
                            </div>
                            <?php break; ?>
                    <?php endswitch; ?>
                </div>

                <!-- <?php if ($menu == "Menunggu obat") : ?>
                    <th>Obat</th>
                <?php
                        endif;
                ?> -->
=======
                <?php
                endif;
                ?>

                <th class="aksi">Aksi</th>
>>>>>>> 81ba0cac1492dcc7cb87cd1ecf4ee2376c81956e
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($pasien as $row) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row["tanggal_masuk"]; ?></td>
                    <td><?= $row['jam_masuk'] ?></td>
                    <td class="belumTerdata"><?= $row['nama'] ?></td>
                    <td class="belumTerdata"><?= $row['alamat'] ?></td>
                    <td class="belumTerdata"><?= $row['keluhan'] ?></td>

                    <?php if ($menu == "Menunggu obat") : ?>
                        <td><?= $row['obat'] ?></td>
                    <?php endif; ?>

                    <td>
                        <?php if ($menu == "Menunggu obat") : ?>
                            <form action="" method="GET">
                                <button name="menu" value="Menunggu obat"><?= $tombol ?></button>
                                <?php
                                $id = $row['id'];
                                $query = "UPDATE pasien SET status = 'Pulang' WHERE id = $id ;";
                                mysqli_query($conn, $query);
                                ?>
                            </form>
                        <?php
                        else :
                        ?>
                            <form action="<?php echo $link ?>" method="GET">
                                <button class="aksi" name="id" value="<?= $row['id'] ?>"><?= $tombol ?> </button>
                            </form>
                        <?php
                        endif;
                        ?>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>

<<<<<<< HEAD


=======
            <div>
                <?php switch ($menu):
                    case ("Pulang"): ?>
                        <div>
                            <style>
                                .aksi {
                                    display: none;
                                }
                            </style>
                        </div>
                        <?php break; ?>
                    <?php
                    case ("Belum Terdata"): ?>
                        <!-- Ini di belum terdaftar apa belum terdata? -->
                        <div>
                            <style>
                                th.belumTerdata {
                                    display: none;
                                }

                                td.belumTerdata {
                                    display: none;
                                }

                                button.
                            </style>
                        </div>
                        <?php break; ?>
                <?php endswitch; ?>
            </div>
>>>>>>> 81ba0cac1492dcc7cb87cd1ecf4ee2376c81956e


        </table>
    </div>
</body>

</html>