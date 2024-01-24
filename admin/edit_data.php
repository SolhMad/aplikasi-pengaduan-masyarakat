<?php

include "../config/functions.php";

if (isset($_POST['hapus_pengaduan'])) {
    $id_pengaduan = mysqli_real_escape_string($conn, $_POST["id_pengaduan"]);

    $query = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");

    // Check if data exists
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);

        // Delete image file
        if (is_file("../database/img/" . $data['foto'])) {
            unlink("../database/img/" . $data['foto']);
        }

        // Delete record from database
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
