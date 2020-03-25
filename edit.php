<h3>Edit Data</h3>

<?php
$ambil = $db->query("SELECT * FROM user  WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
if (isset($_POST['edit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; //pw lama
    $password2 = $_POST['password2']; //pw baru
    $password3 = $_POST['password3']; //konfirmasi pw baru
    $level = $_POST['level'];
    $id =  $_GET['id'];
    if (mysqli_num_rows($ambil) == 0) {
    } else {
        $cek = mysqli_fetch_array($ambil);
    }
    //mengecek variabel salah apabila pw kosong dan tidak sama
    if ($password == '' || $password2 == '' || $password3 == '') {
        echo "<script>alert('Bidang Password tidak boleh kosong!');</script>";
    } elseif ($password2 !== $password3) {
        echo "<script>alert('Password tidak sama!');</script>";
    } else {
        //untuk mengambil dan mengubah data yang ada di db
        $password = md5($password); //mengenkripsi password lama
        $password2 = md5($password2); //mengenkrispi password baru
        if ($pecah['password'] == $password) { //jika password tidak sama dengan variabel password makan akan muncul alert
            $update = $db->query("UPDATE user SET username='$username', email='$email', password='$password2', level='$level' WHERE id='$id' AND password='$password'"); //untuk mengupdate data
            if ($update) { //logic munculkan alert
                echo "<script>alert('Data berhasil diubah');</script>";
                echo "<script>location='dashboard.php?halaman=data'</script>";
            } else { //apabila edit data gagal
                echo "<script>alert('Data gagal diubah nih');</script>";
            }
        } else {
            echo "<script>alert('Password lama salah');</script>";
        }
    }
}

?>
<form method="post">
    <div class="form-edit">
        <input type="hidden" name="id" value="<?php echo $pecah['id'] ?>">
        <div class="textbox">
            <label style="font-size: 15px">Username</label>
            <input type="username" name="username" placeholder="Username" value="<?php echo $pecah['username']; ?>">
        </div>
        <div class="textbox">
            <label style="font-size: 15px">Email</label>
            <input type="email" name="email" method="post" placeholder="Email" value="<?php echo $pecah['email']; ?>">
        </div>
        <div class="textbox">
            <label style="font-size: 15px">Password lama</label>
            <input type="password" name="password" placeholder="Password Lama">
        </div>
        <div class="textbox">
            <label>Password Baru</label>
            <input type="password" name="password2" placeholder="Password Baru">
        </div>
        <div class="textbox">
            <label style="font-size: 15px">Konfirmasi Password</label>
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