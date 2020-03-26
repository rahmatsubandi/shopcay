<?php
session_start();
session_destroy();
unset($_SESSION['username']);
$_SESSION['message'] = "Kamu telah keluah nih..";
header("location: user/home-exit.php");
