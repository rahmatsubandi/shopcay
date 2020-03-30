<?php

if (isset($_POST['tambah'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    $level = mysqli_real_escape_string($db, $_POST['level']);
    if ($username == '' || $email == '' || $password == '' || $level == '') { //jika dalam form kosong
        echo "<script>alert('Bidang tidak boleh kosong!');</script>";
    } elseif ($password !== $password2) { //jika password tidak sama
        echo "<script>alert('Password tidak sama!');</script>";
    } else {
        //membuat user
        $password = md5($password); //men-hash pw agar aman
        $sql = $db->query("INSERT INTO user(username, email, password, level) VALUES('$username', '$email', '$password', '$level')");
        if ($sql) {
            echo "<script>alert('Kamu berhasil menambahkan data')</script>";
            echo "<script>location='dashboard.php?halaman=data'</script>";
        } else {
            echo "<script>alert('Kamu gagal menambahkan data')</script>";
        }
    }
}
?>
<h3>Tambah Data</h3>
<form method="post">
    <div class="form-edit">
        <label style="font-size: 15px">Username</label>
        <div class="textbox">
            <input type="username" class="form-control" name="username" placeholder="Username">
        </div>
        <label style="font-size: 15px">Email</label>
        <div class="textbox">
            <input type="email" class="form-control" name="email" method="post" placeholder="Email">
        </div>
        <label style="font-size: 15px">Password</label>
        <div class="textbox">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <label style="font-size: 15px">Re-typed Password</label>
        <div class="textbox">
            <input type="password" class="form-control" name="password2" placeholder="Re-typed Password">
        </div>
        <label style="font-size: 15px">Level</label>
        <div class="form-row">
            <div class="col-sm-10">
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="level" value="admin" required>
                    <label style="font-size: 15px">Admin</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="level" value="user" required>
                    <label style="font-size: 15px">User</label>
                </div>
                <br>
            </div>
            <button style="margin-left: 20px" type="submit" class="btn btn-primary" name="tambah">Submit</button>
        </div>
</form>