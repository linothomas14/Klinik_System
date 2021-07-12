<?php
include "header.php";
include "config.php";

setlocale(LC_ALL, 'id-ID', 'id_ID');
date_default_timezone_set("Asia/Jakarta");
echo $timestamp =  date('H:i:s');

if (isset($_POST['button1'])) {
    $tanggal_masuk = date("d-m-Y");
    $jam_masuk = date("H:i:s");
    $sql = "INSERT INTO pasien (tanggal_masuk,jam_masuk) VALUES ('$tanggal_masuk','$jam_masuk')";
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
            <!-- <h2><?= date("D, j F Y"); ?></h2>
            <h1><?= date("H:i:s"); ?></h1> -->

            <div id="clock"></div>
            <!-- LIVE CLOCK TAPI GATAU BISA DIGEDEIN APA GAK -->

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
            <h1>Nomor antrian : X</h1>
            <form method="post">
                <input type="submit" name="button1" value="Ambil antrian" />
            </form>
        </div>

    </div>
</body>

</html>