<?php
$conn = mysqli_connect("localhost", "root", "", "db_apem");

function ambil($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($rows, $row);
    }

    return $rows;
}


function tambah_pengaduan($post)
{
    global $conn;

    $nik = $_SESSION["nik"];
    $tanggal = date('Y-m-d');
    $judul = $post["judul_laporan"];
    $isi = $post["isi_laporan"];
    $status = 0;

    $tambah = " INSERT INTO pengaduan
                    VALUES ('','$tanggal','$nik','$judul','$isi','','$status')
    ";

    mysqli_query($conn, $tambah);

    return mysqli_affected_rows($conn);
}

?>
<?php

// kompoen untuk mengupload file adalah
//1.tentukan format nama
//2.tentukan format type
//3.tentukan tmp nya ( tempat penyimpanan sementara)
//4.tentukan size nya
//5.pindahkan menggunakan move_uploade_files

?> 
