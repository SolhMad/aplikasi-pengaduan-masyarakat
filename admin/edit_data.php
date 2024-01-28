<?php

include "../config/koneksi.php";

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
        mysqli_query($conn, "DELETE FROM tanggapan WHERE id_pengaduan = '$id_pengaduan'");
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
    $id_pengaduan = mysqli_real_escape_string($conn, $_POST["id_pengaduan"]);
    $h_tanggapan = mysqli_query($conn, "DELETE FROM tanggapan WHERE id_tanggapan = '$id_tanggapan'");
    $h_pengaduan = mysqli_query($conn, "DELETE FROM pengaduan WHERE id_pengaduan = '$id_pengaduan'");
    if ($h_tanggapan && $h_pengaduan) {
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

//untuk hapus Petugas
if (isset($_POST['hapus_petugas'])) {
    $id_petugas = mysqli_real_escape_string($conn, $_POST["id_petugas"]);
    $delete = mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas = '$id_petugas'");
    if ($delete) {
        echo "<script>
                 alert('Data Berhasil di Hapus');
                document.location.href='index.php?page=petugas';
            </script>";
    } else {
        echo "<script>
                 alert('Data Gagal di HAPUS');
                document.location.href='index.php?page=petugas';
            </script>";
    }
}

//untuk hapus masyarakat
if (isset($_POST['hapus_masyarakat'])) {
    $nik = mysqli_real_escape_string($conn, $_POST["nik"]);
    $delete = mysqli_query($conn, "DELETE FROM masyarakat WHERE nik = '$nik'");
    if ($delete) {
        echo "<script>
                 alert('Data Berhasil di Hapus');
                document.location.href='index.php?page=masyarakat';
            </script>";
    } else {
        echo "<script>
                 alert('Data Gagal di HAPUS');
                document.location.href='index.php?page=masyarakat';
            </script>";
    }
}
