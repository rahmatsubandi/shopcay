<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopCay</title>
    <link rel="shortcut icon" href="img/iconweb.png">
    <link rel="stylesheet" href="css/home-user.css">
    <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">

</head>

<body>
    <!-- Navbar -->
    <div class="wrapper">
        <div class="top-bar">
            <div class="logo">
                <a href="home-user.php"><img src="img/navbar.svg"></a>
            </div>
            <div class="menu-bar">
                <ul>
                    <li class="active"><a class="active" href="home-user.php">Home</a></li>
                    <li><a class="active" href="#produk">Produk</a></li>
                    <li><a class="active" href="#footer">Informasi Dan Kontak</a></li>
                </ul>
            </div>
        </div><br><br>
        <div class="hero">
            <div class="hero-text">
                <h1>Selamat Berbelanja di ShopCay!</h1>
                <p>Kami adalah penyedia belanja online kualitas atas harga rendah. Dengan menawarkan pengalaman
                    belanja
                    yang menyenangkan hingga lupa keuangan. Karna Gratis ongkir Se-Indonesia! Ayo buruan Belanja
                    sekarang.
                </p>
                <a class="btn-rounded"> Hallo, <?php echo $_SESSION['username']; ?></a>
            </div>
            <div class="hero-banner">
                <img src="img/user-home.svg">
            </div>
        </div>
        <div class="logout"><a class="btn" href="logout.php">Logout!</a></div>
    </div>
    </div>
    <!-- End Navbar -->

    <!--Card produk-->
    <div id="produk" class="text-title-produk">Produk</div>
    <div class="deks">Beberapa style menarik yang wajib kamu miliki!</div><br>
    <div class="bagian-card">
        <a class="card1" href="#">
            <img src="img/girl.jfif" width="230px" height="225px">
            <div class="deskripsi">
                <h4><b>Style Ughtea</b></h4>
                <p>Banyak Pilihan Lainya</p>
            </div>
        </a>
        <a class="card1" href="#">
            <img src="img/ikwan.png" width="230px" height="225px">
            <div class="deskripsi">
                <h4><b>Style Ikwhan</b></h4>
                <p>Banyak Pilihan Lainya</p>
            </div>
        </a>
        <a class="card1" href="#">
            <img src="img/boy.jpg" width="230px" height="225px">
            <div class="deskripsi">
                <h4><b>Style Selebgram Pria</b></h4>
                <p>Banyak Pilihan Lainya</p>
            </div>
        </a>
        <a class="card1" href="#">
            <img src="img/selebgram.jfif" width="230px" height="225px">
            <div class="deskripsi">
                <h4><b>Style Selebgram Wanita</b></h4>
                <p>Banyak Pilihan Lainya</p>
            </div>
        </a>
        <a class="card1" href="#">
            <img src="img/santai wanita.jpg" width="230px" height="225px">
            <div class="deskripsi">
                <h4><b>Style Santai Wanita</b></h4>
                <p>Banyak Pilihan Lainya</p>
            </div>
        </a>
        <a class="card1" href="#">
            <img src="img/santai pria.jpg" width="230px" height="225px">
            <div class="deskripsi">
                <h4><b>Style Santai Pria</b></h4>
                <p>Banyak Pilihan Lainya</p>
            </div>
        </a>
    </div>
    <!--End Card produk-->

    <!--Footer-->
    <div id="footer" class="footer">
        <div class="inner_footer">
            <div class="logo_footer">
                <img src="img/iconweb.png" alt=""> </div>
            <div class="footer_third">
                <h1>Informasi</h1>
                <a href="home-user.php">&copy; ShopyCay 2020.</a>

            </div>
            <div class="footer_third">
                <h1>Kontak</h1>
                <a href="#">+62 8778 8711 327</a>
            </div>
            <div class="footer_third">
                <h1>Alamat</h1>
                <span>
                    ShopCay Company<br>
                    D13, Melati St., <br>
                    South Tambun, Bekasi <br>
                    17519 Bekasi <br>
                </span>
            </div>
        </div>
    </div>

    <!--End Footer-->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Tambahkan gulir halus ke semua tautan
        $("a").on('click', function(event) {

            // Pastikan this.hash memiliki nilai sebelum mengabaikan perilaku default
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Menggunakan metode animate () jQuery untuk menambahkan gulir halaman yang lancar
                // Nomor opsional (900) menentukan jumlah milidetik yang diperlukan untuk menggulir ke area yang ditentukan
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {

                    // Tambahkan hash (#) ke URL ketika selesai menggulir (perilaku klik default)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>

</html>