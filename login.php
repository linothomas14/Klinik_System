<?php
require "header.php";
require_once("config.php");

session_start();
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pw = mysqli_real_escape_string($conn, $_POST['password']);
    $query = "SELECT * FROM login WHERE user = '$username' AND pass = '$pw';";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        // login sukses, alihkan ke halaman timeline
        header("Location: admin.php");
    } else {
        echo "<script>alert('Password salah');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Jotaro</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="container">
        <div class="login-wrapper">

            <form action="" method="POST">
                <table>
                    <tr>
                        <td colspan="2" align="center">
                            <h2>Login</h2>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="username">Username</label></td>
                        <td><input class="form-input" type="text" name="username" placeholder="Username" /></td>
                    </tr>

                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input class="form-input" type="password" name="password" placeholder="Password" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" class="btn-login" name="login" value="Masuk" /></td>
                    </tr>

                </table>


            </form>
        </div>
    </div>

</body>

</html>