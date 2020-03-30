<h3>Edit Data</h3>

<?php
$ambil = $db->query("SELECT * FROM user  WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
if (isset($_POST['edit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; //password lama
    $password2 = $_POST['password2']; //password baru
    $password3 = $_POST['password3']; //konfirmasi password baru
    $level = $_POST['level'];
    $id =  $_GET['id'];
    if (mysqli_num_rows($ambil) == 0) {
    } else {
        $cek = mysqli_fetch_array($ambil);
    }
    //mengecek variabel apabila pw kosong dan tidak sama
    if ($password == '' || $password2 == '' || $password3 == '') { //jika dalam form password kosong
        echo "<script>alert('Bidang Password tidak boleh kosong!');</script>";
    } elseif ($password2 !== $password3) { //jika password tidak sama
        echo "<script>alert('Password tidak sama!');</script>";
    } else {
        //untuk mengambil dan mengubah data yang ada di db
        //$password = md5($password); //fungsi ini untuk mengenkripsi password.
        //tapi berhubung saat user regis, password tidak terenkripsi. kerana untuk mempermudah admin edit data buat verifikasi level.
        $password2 = md5($password2); //mengenkrispi password baru
        if ($pecah['password'] == $password) { //jika password tidak sama dengan variabel password makan akan muncul alert
            $update = $db->query("UPDATE user SET username='$username', email='$email', password='$password2', level='$level' WHERE id='$id' AND password='$password'"); //untuk mengupdate data
            if ($update) { //logic munculkan alert ketika berhasil
                echo "<script>alert('Data berhasil diubah');</script>";
                echo "<script>location='dashboard.php?halaman=data'</script>";
            } else { //apabila edit data gagal
                echo "<script>alert('Data gagal diubah nih');</script>";
            }
        } else { //apabila password tidak sama dengan database
            echo "<script>alert('Password lama salah');</script>";
        }
    }
}

?>
<form method="post">
    <div class="form-edit">
        <input type="hidden" name="id" value="<?php echo $pecah['id'] ?>">
        <label style="font-size: 15px">Username</label>
        <div class="textbox">
            <input type="username" name="username" placeholder="Username" value="<?php echo $pecah['username']; ?>">
        </div>
        <label style="font-size: 15px">Email</label>
        <div class="textbox">
            <input type="email" name="email" method="post" placeholder="Email" value="<?php echo $pecah['email']; ?>">
        </div>
        <label style="font-size: 15px">Password lama</label>
        <div class="textbox">
            <input type="password" name="password" placeholder="Password Lama">
        </div>
        <label>Password Baru</label>
        <div class="textbox">
            <input type="password" name="password2" placeholder="Password Baru">
        </div>
        <label style="font-size: 15px">Konfirmasi Password</label>
        <div class="textbox">
            <input type="password" name="password3" placeholder="Konfirmasi Password">
        </div>
        <div class="textbox-button">
            <label style="font-size: 15px">Level</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="level" value="admin" <?php if ($pecah['level'] == 'admin') echo 'checked' ?>>
                    <label style="font-size: 15px">Admin</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="level" value="user" <?php if ($pecah['level'] == 'user') echo 'checked' ?>>
                    <label style="font-size: 15px">User</label>
                </div>
                <br>
            </div>
            <button type="submit" name="edit">Submit</button>
        </div>
    </div>
</form>