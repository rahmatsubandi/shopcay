<h2>Edit Produk</h2>
<br>

<?php
$ambil = $db->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotolama = $pecah['foto_produk'];
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-edit-produk">
        <input type="hidden" name="id" value="<?php echo $pecah['id_produk'] ?>">
        <label style="font-size: 15px">Nama Produk</label>
        <div class="textbox">
            <input type="text" name="nama" placeholder="Nama Produk" value="<?php echo $pecah['nama_produk']; ?>">
        </div>
        <label style="font-size: 15px">Harga Produk (Rp)</label>
        <div class="textbox">
            <input type="number" name="harga" method="post" placeholder="Harga Rp." value="<?php echo $pecah['harga_produk']; ?>">
        </div>
        <label style="font-size: 15px">Berat Produk (Gr)</label>
        <div class="textbox">
            <input type="number" name="berat" method="post" placeholder="Harga Rp." value="<?php echo $pecah['berat']; ?>">
        </div>
        <label style="font-size: 15px">Foto Produk</label><br>
        <div class="textbox" style="width:130px;">
            <img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="130" height="130"><br>
        </div>
        <label style="font-size: 15px">Ganti Foto Produk</label>
        <input type="file" name="foto"><br>
        <label style="font-size: 15px">Deskripsi</label>
        <div class="textbox">
            <textarea type="deskripsi" name="deskripsi" method="post" placeholder="Silahkan tulis deskripsi.."><?php echo $pecah['deskripsi_produk']; ?></textarea>
        </div>
        <button type="submit" name="edit">Submit</button>
    </div>
</form>

<?php
if (isset($_POST['edit'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    //jika foto dirubah maka
    if (!empty($lokasifoto)) { //jika file poto kosong
        unlink("../foto_produk/$fotolama"); //menghapus file poto lama
        move_uploaded_file($lokasifoto, "../foto_produk/$namafoto"); //menambah/upload foto baru ke folder foto_produk
        //mengupdate data
        $db->query("UPDATE produk SET nama_produk = '$_POST[nama]',
        harga_produk = '$_POST[harga]', berat= '$_POST[berat]',
        foto_produk = '$namafoto', deskripsi_produk = '$_POST[deskripsi]' WHERE id_produk = '$_GET[id]'");
    } else { //mengupdate data tanpa melakukan perubahan file foto
        $db->query("UPDATE produk SET nama_produk = '$_POST[nama]',
        harga_produk = '$_POST[harga]', berat= '$_POST[berat]',
        deskripsi_produk = '$_POST[deskripsi]' WHERE id_produk = '$_GET[id]'");
    }
    echo "<script>alert('Data produk berhasil diubah');</script>";
    echo "<script>location='dashboard.php?halaman=produk';</script>";
}
