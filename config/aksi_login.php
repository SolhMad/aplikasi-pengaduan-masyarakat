<?php

session_start();
include 'functions.php';

//menangkap var yang dikirim lewat $_POST
$username = $_POST["username"];
$password = md5($_POST["password"]);
$level = $_POST["level"];

//pengkondisian jika yang masuk levelnya masyarakat maka mengambil dari TABEL masyarakat dan selain masyarakat mengambil dari TABEL PETUGAS
if ($level === 'masyarakat') {
    $login = mysqli_query($conn, "SELECT * FROM masyarakat WHERE `username` = '$username' AND `password` = '$password'");
} elseif ($level === 'admin'
) {
    $login = mysqli_query($conn, "SELECT * FROM petugas WHERE `username` = '$username' AND `password` = '$password'");
} elseif ($level === 'petugas') {
    $login = mysqli_query($conn, "SELECT * FROM petugas WHERE `username`= '$username' AND `password` = '$password'");
} else {
    $login = 0;
}

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == 'admin') {
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['login'] = "admin";
        header("location:../admin/");
    } elseif ($data['level'] == 'petugas') {
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['login'] = "admin";
        header("location:../admin/");
    } elseif ($data['level'] == 'masyarakat') {
        $_SESSION['nik'] = $data['nik'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['login'] = "masyarakat";
        header("location:../masyarakat/");
    }
} else {
    echo
    "
        <script>
            alert('username atau password tidak terdaftar');
            document.location.href='../index.php?page=login';
        </script>
    ";
}


?>
<!-- end -->