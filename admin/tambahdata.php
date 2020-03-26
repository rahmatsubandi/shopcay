<?php

if (isset($_POST['tambah'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    $level = mysqli_real_escape_string($db, $_POST['level']);

    if ($password == $password2) {
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
    <div class="form-group" style="width: 350px">
        <label>Username</label>
        <input type="username" class="form-control" name="username" placeholder="Username">
    </div>
    <div class="form-group" style="width: 350px">
        <label>Email</label>
        <input type="email" class="form-control" name="email" method="post" placeholder="Email">
    </div>
    <div class="form-group" style="width: 350px">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="form-group" style="width: 350px">
        <label>Re-typed Password</label>
        <input type="password" class="form-control" name="password2" placeholder="Re-typed Password">
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Level</label>
        <div class="col-sm-10">
            <div class="form-check">
                <input type="radio" class="form-check-input" name="level" value="admin" required>
                <label class="form-check-label">Admin</label>
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input" name="level" value="user" required>
                <label class="form-check-label">User</label>
            </div>
            <br>
        </div>
        <button style="margin-left: 20px" type="submit" class="btn btn-primary" name="tambah">Submit</button>
</form>