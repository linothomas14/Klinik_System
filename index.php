<?php
include "header.php";
include "config.php";

setlocale(LC_ALL, 'id-ID', 'id_ID');
date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['button1'])) {
    $tanggal_masuk = date("d-m-Y");
    $jam_masuk = date("H:i:s");
    $sql = "INSERT INTO pasien (tanggal_masuk,jam_masuk)
VALUES ('$tanggal_masuk','$jam_masuk')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<html>

<head>
    <title>Klinik Jotaro</title>
    <link rel="stylesheet" href="/css/index.css">
</head>

<body>

    <div class="main">
        <div class="tanggal">
            <h2><?= date("D, j F Y"); ?></h2>
            <h1><?= date("H:i:s"); ?></h1>
        </div>
        <div class="antrian">
            <h1>Nomor antrian : X</h1>
            <form method="post">
                <input type="submit" name="button1" value="Ambil antrian" />
            </form>
        </div>

    </div>
</body>

</html>