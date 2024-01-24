<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">

            <div class="card">
                <div class="card-header">
                    DATA PENGADUAN
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Laporan</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            include "../config/functions.php";
                            $no = 1;
                            $ambil = mysqli_query($conn, "SELECT a.*, b.* FROM pengaduan a INNER JOIN masyarakat b ON a.nik = b.nik ORDER BY id_pengaduan ASC;");
                            while ($data = mysqli_fetch_array($ambil)) { ?>

                                <tr>
                                    <td><?= $no++ ?> </td>
                                    <td><?= $data['tgl_pengaduan']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['judul_pengaduan']; ?></td>
                                    <td><?= $data['isi_laporan']; ?></td>
                                    <td><img src="../database/img/<?= $data['foto'] ?>" width="100px"></td>
                                    <td><!-- cek dari database table pengaduan column statusnya apa -->
                                        <?php if ($data['status'] == 0) {
                                            echo "<span class ='badge bg-warning text-dark'>menunggu</span>";
                                        } elseif ($data['status'] == "proses") {
                                            echo "proses";
                                        } else {
                                            echo "selesai";
                                            echo "<a href='index.php?page=tanggapan'>Lihat Tanggapan</a>";
                                        }
                                        ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary">VERIFIKASI</a>
                                        <a href="#" class="btn btn-success">TANGGAPI</a>
                                        <a href="#" class="btn btn-danger">HAPUS</a>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>