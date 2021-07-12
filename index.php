<?php
include "header.php";
include "config.php";

setlocale(LC_ALL, 'id-ID', 'id_ID');
date_default_timezone_set("Asia/Jakarta");


$last_id = "";
if (isset($_POST['button1'])) {
    $tanggal_masuk = date("d-m-Y");
    $jam_masuk = date("H:i:s");
    $sql = "INSERT INTO pasien (tanggal_masuk,jam_masuk) VALUES ('$tanggal_masuk','$jam_masuk')";
    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
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

            <div id="clock"></div>

            <body onload="startTime()">
                <script type="text/javascript">
                    function startTime() {
                        var today = new Date();
                        var h = today.getHours();
                        var m = today.getMinutes();
                        var s = today.getSeconds();
                        m = checkTime(m);
                        s = checkTime(s);
                        document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
                        var t = setTimeout(function() {
                            startTime()
                        }, 500);
                    }

                    function checkTime(i) {
                        if (i < 10) {
                            i = "0" + i
                        }; // add zero in front of numbers < 10
                        return i;
                    }
                </script>
        </div>
        <div class="antrian">
            <br>
            <!-- <h1>Nomor antrian : <?= $last_id ?></h1> -->
            <h2>SILAHKAN AMBIL NOMOR ANTRIAN:</h1>
                <form method="post">
                    <button onClick="alert('<?= "Nomor antrian anda = $last_id" ?>')" type="submit" name="button1" value="Ambil antrian"> Ambil Antrian </button>
                </form>
                <br>
        </div>

    </div>
</body>

</html>