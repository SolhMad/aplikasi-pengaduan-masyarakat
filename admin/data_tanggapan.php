<div class="container-fluid">
    <div class="row">
        <div class="card mb-4">
            <div class="card-header d-flex pb-0">
                <h6>TANGGAPAN</h6>
                <a href="export_tanggapan.php" class="btn btn-success ms-auto">Export</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table table-striped align-items-center mb-0">
                        <thead class="text-center">
                            <tr>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">No</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Nik</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Judul</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Tanggapan</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php

                            include "../config/koneksi.php";
                            $query = mysqli_query($conn, "SELECT a.*,b.* FROM tanggapan a INNER JOIN pengaduan b ON a.id_pengaduan = b.id_pengaduan"); //query data dari tabel tanggapan dan pengaduan menggunakan INER JOIN
                            $no = 1;
                            while ($data = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td>
                                        <div class="text-xs text-center font-weight-bold mb-0">
                                            <?= $no++; ?>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <?= $data['tgl_tanggapan']; ?>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <?= $data['nik']; ?>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <?= $data['judul_pengaduan']; ?>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <?= $data['tanggapan']; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <?php if ($data['status'] == "selesai") {
                                                echo "<span class ='badge bg-success text-light'>Selesai</span>";
                                            } elseif ($data['status'] == "proses") {
                                                echo "<span class ='badge bg-warning text-dark'>Proses</span>";
                                            } elseif ($data['status'] == "tolak") {
                                                echo "<span class ='badge bg-danger text-light'>Ditolak</span>";
                                            } else {
                                                echo "<span class ='badge bg-danger text-light'>Menunggu</span>";
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <!-- HAPUS -->
                                        <span class="badge badge-sm bg-danger">
                                            <a href="#" class="" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_tanggapan'] ?>" style="text-decoration:none; color:white;">HAPUS</a>
                                        </span>
                                        <!-- modal HAPUS -->
                                        <div class="modal fade" id="hapus<?= $data['id_tanggapan'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close bg-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="edit_data.php" method="POST">
                                                            <input type="hidden" name="id_tanggapan" class="form-control" value="<?= $data['id_tanggapan']; ?>">
                                                            <input type="hidden" name="id_pengaduan" class="form-control" value="<?= $data['id_pengaduan']; ?>">
                                                            <p>Yakin mau dihapus Tanggapan <br>
                                                                <?= $data['judul_pengaduan']; ?>?
                                                            </p>
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
                                        </a>
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