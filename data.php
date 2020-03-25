<h3>Data Admin & User</h3>
<a href="dashboard.php?halaman=tambahdata" class="btn-tambah">Tambah Data</a><br><br>
<table class="table1">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Level</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $id = 1; ?>
        <?php $ambil = $db->query("SELECT * FROM user"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <th><?php echo $id; ?></th>
                <td><?php echo $pecah['username']; ?></td>
                <td><?php echo $pecah['email']; ?></td>
                <td><?php echo $pecah['level']; ?></td>
                <td>
                    <a href="dashboard.php?halaman=edit&id=<?php echo $pecah['id']; ?>" class="btn-edit">Edit</a> &nbsp;
                    <a href="dashboard.php?halaman=hapus&id=<?php echo $pecah['id']; ?> " class="btn-hapus" onClick="return confirm('Yakin menghapus data?')">Hapus</a>
                </td>
            </tr>
            <?php $id++; ?>
        <?php } ?>
    </tbody>
</table>