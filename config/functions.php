<?php
$conn = mysqli_connect("localhost", "root", "", "db_apem");

// FUNGSI UNTUK MENGAMBIL DATA
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


//FUNGSI TAMBAH DATA KE DALAM TABEL PENGADUAN
function tambah_pengaduan($post)
{
    global $conn;

    $nik = $_SESSION["nik"];
    $tanggal = date('Y-m-d');
    $judul = $post["judul_laporan"];
    $isi = $post["isi_laporan"];
    $foto = upload();
    $status = 0;

    // Periksa apakah $foto tidak kosong sebelum mengeksekusi query
    if (!empty($foto)) {
        $tambah = "INSERT INTO pengaduan
                    VALUES ('', '$tanggal', '$nik', '$judul', '$isi', '$foto', '$status')";

        mysqli_query($conn, $tambah); //insert data ke dalam database

        return mysqli_affected_rows($conn);
    } else {
        // Foto kosong, tidak perlu menjalankan query, kembalikan 0
        return 0;
    }
}


//FUNGSI HAPUD DATA DARI TABEL PENGADUAN 
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE
                            FROM pengaduan
                                WHERE id_pengaduan = $id
    ");

    return mysqli_affected_rows($conn);
}

?>
<?php

//FUNGSI UPLOAD DATA BERBENTUK GAMBAR/FOTO KE DALAM TABEL PENGADUAN
function upload()
{

    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // Cek Apakah Tidak ada gambar yang diupload
    if ($error === 4) {

        echo "
                <script>
                    alert('pilih gambar terlebih dahulu');
                </script>
            ";

        return false;
        exit();
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

        echo "
                <script>
                    alert('yang anda upload bukan gambar');
                </script>
            ";

        return false;
        exit();
    }

    // cek jika ukuran gambar terlalu besar
    if ($ukuranFile > 10000000) {

        echo "
                <script>
                    alert('Ukuran gambar terlalu besar');
                </script>
            ";

        return false;
        exit();
    }

    // lolos pengecekan, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../database/img/' . $namaFileBaru);

    return $namaFileBaru;
}

// kompoen untuk mengupload file adalah
//1.tentukan format nama
//2.tentukan format type
//3.tentukan tmp nya ( tempat penyimpanan sementara)
//4.tentukan size nya
//5.pindahkan menggunakan move_uploade_files

?> 
