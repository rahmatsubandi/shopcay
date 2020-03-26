<h2>Tambah Produk</h2>


<form method="post" enctype="multipart/form-data">
    <div class="form-group" style="width: 350px">
        <label>Nama Produk</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama Produk">
    </div>
    <div class="form-group" style="width: 350px">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga" method="post" placeholder="Harga">
    </div>
    <div class="form-group" style="width: 350px">
        <label>Berat (Gr)</label>
        <input type="number" class="form-control" name="berat" placeholder="berat">
    </div>
    <div class="form-group" style="width: 350px">
        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="3" cols="50" placeholder="Silahkan tuliskan Deskripsi.."></textarea>
    </div>
    <div class="form-group" style="width: 350px">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <br>
    <button style="margin-left: 20px" type="submit" name="simpan">Tambah</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../foto_produk/" . $nama);
    $db->query("INSERT INTO produk (nama_produk,harga_produk,berat,foto_produk,deskripsi_produk) VALUES ('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]') ");
    echo "<script>alert('Produk ditambahkan!');</script>";
    echo "<script>location='dashboard.php?halaman=produk'</script>";
}
?>