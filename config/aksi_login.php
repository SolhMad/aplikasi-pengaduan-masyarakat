<?php

session_start();
include 'koneksi.php';

//menangkap var yang dikirim lewat $_POST
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars(md5($_POST["password"]));
$level = htmlspecialchars($_POST["level"]);

//pengkondisian jika yang masuk levelnya masyarakat maka mengambil dari TABEL masyarakat dan selain masyarakat mengambil dari TABEL PETUGAS
if ($level === 'masyarakat') {
    $login = mysqli_query($conn, "SELECT * FROM masyarakat WHERE `username` = '$username' AND `password` = '$password'");
} elseif ($level === 'petugas') {
    $login = mysqli_query($conn, "SELECT * FROM petugas WHERE `username`= '$username' AND `password` = '$password'");
} else {
    $login = 0;
}

//cek data apakah ada ?
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    //looping data
    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == 'admin') {
        //membuat session
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['login'] = "admin";
        header("location:../admin/");
    } elseif ($data['level'] == 'petugas') {
        //membuat session
        $_SESSION['id_petugas'] = $data['id_petugas'];
        $_SESSION['nama_petugas'] = $data['nama_petugas'];
        $_SESSION['login'] = "petugas";
        header("location:../admin/");
    } elseif ($data['level'] == 'masyarakat') {
        //membuat session
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