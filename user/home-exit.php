<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopCay</title>
    <link rel="shortcut icon" href="../img/iconweb.png">
    <link rel="stylesheet" href="../css/home-exit.css">
    <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">

</head>

<body>
    <!-- Navbar -->
    <div class="wrapper">
        <div class="top-bar">
            <div class="logo">
                <a href="../index.php"><img src="../img/navbar.svg"></a>
            </div>
        </div><br><br>
        <div class="hero">
            <div class="hero-text">
                <h1>Kamu berhasil Logout dari ShopCay!</h1>
                <p>Klik Lanjutkan untuk memulai berbelanja lagi !
                </p>
                <a class="btn-rounded" href="../login.php">Lanjutkan</a>
                <div>
                </div>
            </div>
            <div class="hero-banner">
                <img src="../img/close.gif">
            </div>
        </div>
        <div class="circle"></div>
    </div>
    <!-- End Navbar -->

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