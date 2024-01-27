<?php

include "../config/koneksi.php";
$masyarakat = mysqli_query($conn, "SELECT * FROM masyarakat");
$jml_masyarakat = mysqli_num_rows($masyarakat);

$pengaduan = mysqli_query($conn, "SELECT * FROM pengaduan");
$jml_pengaduan = mysqli_num_rows($pengaduan);

$tanggapan = mysqli_query($conn, "SELECT * FROM tanggapan");
$jml_tanggapan = mysqli_num_rows($tanggapan);

$petugas = mysqli_query($conn, "SELECT * FROM petugas");
$jml_petugas = mysqli_num_rows($petugas);

?>
<div class="container">
    <h3 class="mt-3">Dashboard</h3>
    <div class="row">
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header text-center bg-danger"><b>Masyarakat</b></div>
                <div class="card-body"><?= $jml_masyarakat; ?> Orang</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header text-center bg-warning"><b>Pengaduan</b></div>
                <div class="card-body"><?= $jml_pengaduan; ?> Aduan</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header text-center bg-success"><b>Tanggapan</b></div>
                <div class="card-body"><?= $jml_tanggapan; ?> Tanggapan</div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-header text-center bg-primary"><b>Petugas</b></div>
                <div class="card-body"><?= $jml_petugas; ?> Orang</div>
            </div>
        </div>
    </div>
</div>