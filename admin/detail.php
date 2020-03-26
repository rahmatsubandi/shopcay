<h2>Detail Pembelian</h2>

<?php
$ambil = $db->query("SELECT * FROM pembelian JOIN user ON pembelian.id=user.id WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<table class="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $id = 1; ?>
        <?php $ambil = $db->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $pecah['nama_produk']; ?></td>
                <td><?php echo $pecah['harga_produk']; ?></td>
                <td><?php echo $pecah['jumlah']; ?></td>
                <td>
                    <?php echo $pecah['harga_produk'] * $pecah['jumlah']; ?>
                </td>
            </tr>
            <?php $id++; ?>
        <?php } ?>
    </tbody>
</table>