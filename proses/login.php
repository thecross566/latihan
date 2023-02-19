<?php
include '../config/koneksi.php';
include '../config/function.php';

// Start session
session_start();
// GET REQUEST POST
$username = $_POST['username'];
$password = $_POST['password'];
// Query SELECT
$query = $koneksi->query("SELECT * FROM user INNER JOIN guru ON guru.id = user.id_petugas WHERE username = '$username'  ") or die($koneksi->error);

$num = $query->num_rows;

$data = $query->fetch_assoc();

if ($num == 1) {
    if (md5($password) == $data['password']) {
        if ($data['is_active'] == '0') {
            // Akun tidak aktif 
            echo "Akun anda tidak aktif";
        } else {
            // Jika login berhasil 
            $_SESSION['username'] = $username;
            $_SESSION['is_login'] = true;
            echo "<meta http-equiv='refresh' content='0; url=../admin/index.php'>";
        }
    } else {
        // Password yang dimasukan dan di db tidak sama
        echo "Password Salah";
    }
} else {
    // Username tidak ditemukan
    echo "Username tidak ditemukan";
}

echo $_SESSION['username'];
