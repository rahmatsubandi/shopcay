<h2>Pembelian</h2>
<br>
<table class="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $id = 1; ?>
        <?php $ambil = $db->query("SELECT * FROM pembelian JOIN user ON pembelian.id=user.id"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $pecah['username']; ?> </td>
                <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                <td><?php echo $pecah['total_pembelian']; ?></td>
                <td>
                    <a href="dashboard.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="detail">Detail</a>
                </td>
            </tr>
            <?php $id++; ?>
        <?php } ?>
    </tbody>
</table>