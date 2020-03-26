<?php

session_start();
//konek ke db
$db = mysqli_connect("localhost", "root", "", "shopcay");

if (isset($_POST['regis'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

    if ($username == '' || $email == '' || $password == '' || $password2 == '') { //mengecek apakah ada bidang kosong
        echo "<script>alert('Tidak boleh kosong!')</script>"; //jika kosong muncul alert
    } elseif ($password !== $password2) { //jika password dan re-typed password tidak sama
        echo "<script>alert('Password tidak sama!')</script>"; //maka muncul alert
    } else {
        if ($password == $password2) { //jika password dan re-typed password sama
            //membuat user
            //$password = md5($password); //tapi untuk memudahkan admin dalam verifikasi maka, password tidak di enkripsi. enkripsi password saat data di edit oleh admin.
            $sql = "INSERT INTO user(username, email, password) VALUES('$username', '$email', '$password')"; //input ke db
            mysqli_query($db, $sql); //dengan query
            $_SESSION['username'] = $username; //dan session
            //jika proses sudah benar maka akan muncul alert, dan berpindah kepage login untuk menunggu verifikasi dari admin
            echo "<script>alert('$username kamu belum di Verifikasi nih oleh ShopCay :) Tunggu yah..');document.location.href='login.php'</script>/n";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/registrasi.css">
    <link rel="shortcut icon" href="img/iconweb.png">
    <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
</head>

<body>
    <form action="regis.php" method="post">
        <div class="container">
            <div class="signup-box">
                <img src="img/regis.svg" class="banner">
                <h2 class="title">Form Registrasi </h2> <br>
                <div class="textbox">
                    <input type="username" name="username" placeholder="Nama Lengkap">
                </div>
                <div class="textbox">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="textbox">
                    <input type="password" name="password" placeholder=" Password">
                </div>
                <div class="textbox">
                    <input type="password" name="password2" placeholder="Re-type Password">
                </div>
                <button class="submit" type="submit" name="regis">Daftar</button>
            </div>
    </form>
</body>

</html>