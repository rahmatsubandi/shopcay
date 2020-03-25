<?php

session_start();
//konek ke db
$db = mysqli_connect("localhost", "root", "", "shopcay");

if (isset($_POST['regis'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

    if ($password == $password2) {
        //membuat user
        $password = md5($password); //men-hash pw agar aman
        $sql = "INSERT INTO user(username, email, password) VALUES('$username', '$email', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        echo "<script>alert('$username kamu belum di Verifikasi nih oleh ShopCay :) Tunggu yah..');document.location.href='login.php'</script>/n";
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