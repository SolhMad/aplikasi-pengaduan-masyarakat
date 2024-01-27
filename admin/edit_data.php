<?php

include "../config/functions.php";

//untuk hapus pengaduan
if (isset($_POST['hapus_pengaduan'])) {
    $id_pengaduan = mysqli_real_escape_string($conn, $_POST["id_pengaduan"]);

    $query = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");

    // Cek Jika Data tidak kosong
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);

        // Hapus Gambar
        if (is_file("../database/img/" . $data['foto'])) {
            unlink("../database/img/" . $data['foto']);
        }

        // Hapus data yg id_pengaduan = $id_pengaduan
        mysqli_query($conn, "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");
        echo "<script>
                 alert('Data Berhasil di Hapus');
                document.location.href='index.php?page=pengaduan';
            </script>";
    } else {
        echo "<script>
                 alert('Data Gagal di HAPUS');
                document.location.href='index.php?page=pengaduan';
            </script>";
    }
}

//untuk hapus Tanggapan
if (isset($_POST['hapus_tanggapan'])) {
    $id_tanggapan = mysqli_real_escape_string($conn, $_POST["id_tanggapan"]);
    $delete = mysqli_query($conn, "DELETE FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'");
    if ($delete) {
        echo "<script>
                 alert('Data Berhasil di Hapus');
                document.location.href='index.php?page=tanggapan';
            </script>";
    } else {
        echo "<script>
                 alert('Data Gagal di HAPUS');
                document.location.href='index.php?page=tanggapan';
            </script>";
    }
}
