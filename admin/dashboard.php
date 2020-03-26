<?php
session_start();
//konek ke db
$db = mysqli_connect("localhost", "root", "", "shopcay");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../img/dashboard.png">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2 class="font">Dashboard</h2><br>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="dashboard.php?halaman=data"><i class="fas fa-database"></i> Data</a></li>
                <li><a href="dashboard.php?halaman=produk"><i class="fas fa-box"></i> Produk</a></li>
                <li><a href="dashboard.php?halaman=pembelian"><i class="fas fa-book-open"></i> Pembelian</a></li>
                <li><a href="dashboardlogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="isi">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "data") {
                        include 'data.php';
                    } elseif ($_GET['halaman'] == "pembelian") {
                        include 'pembelian.php';
                    } elseif ($_GET['halaman'] == "produk") {
                        include 'produk.php';
                    } elseif ($_GET['halaman'] == "tambahdata") {
                        include 'tambahdata.php';
                    } elseif ($_GET['halaman'] == "hapus") {
                        include 'hapus.php';
                    } elseif ($_GET['halaman'] == "edit") {
                        include 'edit.php';
                    } elseif ($_GET['halaman'] == "editproduk") {
                        include 'editproduk.php';
                    } elseif ($_GET['halaman'] == "detail") {
                        include 'detail.php';
                    } elseif ($_GET['halaman'] == "tambahproduk") {
                        include 'tambahproduk.php';
                    }
                } else {
                    include 'homedashboard.php';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>