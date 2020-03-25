<?php

session_start();
//konek ke db
$db = mysqli_connect("localhost", "root", "", "shopcay");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = mysqli_query($db, "SELECT * FROM user WHERE username='$username' AND password='$password' ");
    if (mysqli_num_rows($sql) == 0) {
        echo "<script>alert('Username/Password anda salah!!'); document.location.href='login.php'</script>/n";
    } else {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];

        if ($row['level'] == "admin") {
            echo "<script>alert('Hallo admin, $username!!');document.location.href='dashboard.php'</script>/n";
        } else if ($row['level'] == "user") {
            echo "<script>alert('Hallo, Selamat Berbelanja yah $username!!');document.location.href='home-user.php'</script>/n";
        } elseif ($row['level'] == "") {
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
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/iconweb.png">
    <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
</head>

<body>
    <form action="login.php" method="post">
        <div class="container">
            <div class="signup-box">
                <img src="img/regis.svg" class="banner">
                <h2 class="title">Form Login </h2> <br><br>
                <div class="textbox">
                    <input type="username" name="username" placeholder="Username">
                </div>
                <div class="textbox">
                    <input type="password" name="password" placeholder=" Password">
                </div><br>
                <button class="submit" type="submit" name="login">Masuk</button>
            </div>
    </form>
</body>

</html>