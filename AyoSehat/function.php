<?php
session_start(); // Mulai session di awal file

// Koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'login');

// Daftar
if (isset($_POST['register'])) {
    // Jika register di klik
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Tambahkan peran

    // Fungsi enkripsi
    $epassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert ke database
    $insert = mysqli_query($koneksi, "INSERT INTO user (username, password, role) VALUES ('$username', '$epassword', '$role')");

    if ($insert) {
        // Jika berhasil
        header('location:login.php'); // Redirect ke halaman login
    } else {
        // Jika gagal
        echo '
        <script>
            alert("Registrasi gagal");
            window.location.href="register.php";
        </script>
        ';
    }
}

// Login
if (isset($_POST['login'])) {
    // Jika login di klik
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek di database
    $cekdb = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $hitung = mysqli_num_rows($cekdb);

    if ($hitung > 0) {
        // Jika ada
        $pw = mysqli_fetch_array($cekdb);
        $passwordsekarang = $pw['password'];
        $role = $pw['role']; // Dapatkan peran

        // Verifikasi password
        if (password_verify($password, $passwordsekarang)) {
            // Jika password benar
            $_SESSION['login_user'] = $username; // Simpan informasi pengguna di session
            $_SESSION['user_role'] = $role; // Simpan peran pengguna di session

            // Redirect berdasarkan peran
            if ($role == 'admin') {
                header('location:indexadmin.php'); // Redirect ke halaman admin
            } else {
                header('location:index.php'); // Redirect ke halaman user
            }
        } else {
            echo '
            <script>
                alert("Password salah");
                window.location.href="login.php";
            </script>
            ';
        }
    } else {
        // Jika username tidak ditemukan
        echo '
        <script>
            alert("Username tidak ditemukan");
            window.location.href="login.php";
        </script>
        ';
    }
}
