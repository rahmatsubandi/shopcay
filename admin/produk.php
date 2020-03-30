<h2>Produk</h2>
<br>
<a href="dashboard.php?halaman=tambahproduk" class="tambah-produk">Tambah Produk</a><br><br>
<table class="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $id = 1; ?>
        <?php $ambil = $db->query("SELECT * FROM produk"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td><?php echo $pecah['harga_produk']; ?></td>
                <td><?php echo $pecah['berat']; ?></td>
                <td>
                    <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
                </td>
                <td><?php echo $pecah['deskripsi_produk']; ?></td>
                <td>
                    <a href="dashboard.php?halaman=editproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-edit">Edit</a> &nbsp;
                    <a href="dashboard.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-hapus" onClick="return confirm('Yakin menghapus data?')">Hapus</a>
                </td>
            </tr>
            <?php $id++; ?>
        <?php } ?>
    </tbody>
</table>