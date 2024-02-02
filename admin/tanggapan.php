<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">

            <div class="card">
                <div class="card-header">
                    DATA TANGGAPAN
                </div>
                <div class="card-body">
                    <a href="export_tanggapan.php" class="btn btn-success" target="_blank"> Export Excel</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nik</th>
                                <th>Judul</th>
                                <th>Tanggapan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include "../config/koneksi.php";
                            $query = mysqli_query($conn, "SELECT a.*,b.* FROM tanggapan a INNER JOIN pengaduan b ON a.id_pengaduan = b.id_pengaduan");//query data dari tabel tanggapan dan pengaduan menggunakan INER JOIN
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['tgl_tanggapan']; ?></td>
                                    <td><?= $data['nik']; ?></td>
                                    <td><?= $data['judul_pengaduan']; ?></td>
                                    <td><?= $data['tanggapan']; ?></td>
                                    <td>
                                        <?php if ($data['status'] == 0) {
                                            echo "<span class ='badge bg-danger text-light'>Menunggu</span>";
                                        } elseif ($data['status'] == "proses") {
                                            echo "<span class ='badge bg-warning text-dark'>Proses</span>";
                                        } else {
                                            echo "<span class ='badge bg-success text-light'>Selesai</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <!-- HAPUS -->
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_tanggapan'] ?>">HAPUS</a>
                                        <!-- modal HAPUS -->
                                        <div class="modal fade" id="hapus<?= $data['id_tanggapan'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="edit_data.php" method="POST">
                                                            <input type="hidden" name="id_tanggapan" class="form-control" value="<?= $data['id_tanggapan']; ?>">
                                                            <input type="hidden" name="id_pengaduan" class="form-control" value="<?= $data['id_pengaduan']; ?>">
                                                            <p>Yakin mau dihapus Tanggapan <br> <?= $data['judul_pengaduan']; ?>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus_tanggapan" value="hapus_tanggapan" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /modal-HAPUS -->
                                        <!-- /HAPUS -->
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