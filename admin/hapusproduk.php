<?php

$ambil = $db->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if (file_exists("../foto_produk/$fotoproduk")) {
    unlink("../foto_produk/$fotoproduk");
}

$db->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('Produk berhasil dihapus!');</script>";
echo "<script>location='dashboard.php?halaman=produk'</script>";
