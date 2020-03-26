<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopCay</title>
    <link rel="shortcut icon" href="../img/iconweb.png">
    <link rel="stylesheet" href="../css/dashboardlogout.css">
    <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">

</head>

<body>
    <!-- Navbar -->
    <div class="wrapper">
        <div class="top-bar">
            <div class="logo">
                <a href="../index.php"><img src="../img/navbar.svg"></a>
            </div>
            <div class="menu-bar">
                <ul>
                    <li class="active"><a class="active" href="../admin/dashboardlogout.php">Home</a></li>
                    <li><a class="active" href="#footer">Informasi Dan Kontak</a></li>
                </ul>
            </div>
        </div><br><br>
        <div class="hero">
            <div class="hero-text">
                <h1>Kamu berhasil Logout dari Dashboard!</h1>
                <p>Klik Masuk untuk masuk kembali ke Dashboard
                </p>
                <a class="btn-rounded" href="../login.php">Masuk</a>
                <div>
                </div>
            </div>
            <div class="hero-banner">
                <img src="../img/logoutadmin.svg">
            </div>
        </div>
        <div class="circle"></div>
    </div>
    <!-- End Navbar -->
    <!--Footer-->
    <div id="footer" class="footer">
        <div class="inner_footer">
            <div class="logo_footer">
                <img src="img/iconweb.png" alt=""> </div>
            <div class="footer_third">
                <h1>Informasi</h1>
                <a href="index.php">&copy; ShopyCay 2020.</a>
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