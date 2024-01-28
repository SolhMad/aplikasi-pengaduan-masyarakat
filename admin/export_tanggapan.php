<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename = Data Pengaduan dan Tanggapan.xls");

?>

<center>
    <h3>LAPORAN PENGADUAN DAN TANGGPAN <br>UKK REKAYASA PERANGKAT LUNAK</h3>
</center>

<table border="1" cellpadding="10" cellspacing="0" class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nik</th>
            <th>Judul Laporan</th>
            <th>Isi Laporan</th>
            <th>Tanggapan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php

        include "../config/koneksi.php";

        //sintaks sql untuk mengambil data dari pengaduan dan tanggapan menggunakan INNER JOIN 
        $query = mysqli_query($conn, "SELECT a.*,b.* FROM tanggapan a INNER JOIN pengaduan b ON a.id_pengaduan = b.id_pengaduan");
        $no = 1;
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['tgl_tanggapan']; ?></td>
                <td><?= $data['nik']; ?></td>
                <td><?= $data['judul_pengaduan']; ?></td>
                <td><?= $data['isi_laporan']; ?></td>
                <td><?= $data['tanggapan']; ?></td>
                <td><?= $data['status']; ?></td>
            </tr>
        <?php  } ?>
    </tbody>
</table>