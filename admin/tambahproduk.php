<h2>Tambah Produk</h2>


<form method="post" enctype="multipart/form-data">
    <div class="form-edit">
        <label style="font-size: 15px">Nama Produk</label>
        <div class="textbox">
            <input type="text" class="form-control" name="nama" placeholder="Nama Produk">
        </div>
        <label style="font-size: 15px">Harga (Rp)</label>
        <div class="textbox">
            <input type="number" class="form-control" name="harga" method="post" placeholder="Harga">
        </div>
        <label style="font-size: 15px">Berat (Gr)</label>
        <div class="textbox">
            <input type="number" class="form-control" name="berat" placeholder="Berat">
        </div>
        <label style="font-size: 15px">Deskripsi</label>
        <div class="textbox">
            <textarea name="deskripsi" style="margin: 0px; padding: 0 ; width: 312px; height: 80px;" placeholder="Silahkan tuliskan Deskripsi.."></textarea>
        </div>
        <label style="font-size: 15px">Foto</label><br>
        <input type="file" name="foto"><br>
        <br>
        <button style="margin-left: 20px" type="submit" name="simpan">Tambah</button>
    </div>
</form>

<?php
if (isset($_POST['simpan'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../foto_produk/" . $nama);
    if ($nama == '' || $lokasi == '') { //jika dalam form kosong
        echo "<script>alert('From tidak boleh kosong!');</script>";
    } else {
        $sql = $db->query("INSERT INTO produk (nama_produk,harga_produk,berat,foto_produk,deskripsi_produk) VALUES ('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]') ");
        if ($sql) {
            echo "<script>alert('Produk ditambahkan!');</script>";
            echo "<script>location='dashboard.php?halaman=produk'</script>";
        } else {
            echo "<script>alert('Kamu gagal menambahkan produk')</script>";
        }
    }
}
?>