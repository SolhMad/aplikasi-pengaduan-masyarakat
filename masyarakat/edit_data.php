<?php

include "../config/koneksi.php";

if (isset($_POST["hapus_pengaduan"])) {

    $id_pengaduan = $_POST["id_pengaduan"];

    $h_pengaduan = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");
    $h_tanggapan = mysqli_query($conn, "SELECT * FROM tanggapan WHERE id_pengaduan = '$id_pengaduan'");

    $cek = mysqli_num_rows($h_pengaduan);

    if ($cek > 0) {
        $data = mysqli_fetch_array($h_pengaduan);
        if (is_file("../database/img/" . $data['foto'])); {
            unlink("../database/img/" . $data['foto']);
        }

        mysqli_query($conn, "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan' ");
        mysqli_query($conn, "DELETE FROM tanggapan WHERE id_pengaduan = '$id_pengaduan' ");
        echo "<script>
                 alert('Data Berhasil di Hapus');
                document.location.href='index.php';
            </script>";
    } else {
        echo "<script>
                 alert('Data Gagal di Hapus');
                document.location.href='index.php';
            </script>";
    }
}
