<?php

$ambil = ("SELECT * FROM user WHERE id='$_GET[id]'");

$db->query("DELETE FROM user WHERE id='$_GET[id]'");

echo "<script>alert('User berhasil dihapus!');</script>";
echo "<script>location='dashboard.php?halaman=data'</script>";
