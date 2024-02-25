<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">

            <div; class="card">
                <div class="card-header d-flex pb-0">
                    <h6>PENGADUAN</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-striped align-items-center mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Judul</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Isi</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $no = 1; ?>
                                <?php
                                include "../config/koneksi.php";
                                //menampung data nik dari session yang dibuat setelah login
                                $nik = $_SESSION['nik'];
                                $query = mysqli_query($conn, "SELECT * FROM pengaduan WHERE nik = '$nik'"); //menampilkan data pengaduan
                                while ($data = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td class="align-middle text-center text-sm">
                                            <?= $no++; ?>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?= $data['judul_pengaduan']; ?>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?= $data['isi_laporan']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="../database/img/<?= $data['foto']; ?>" alt="Ini Foto" width="70px">
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
                                        <td>
                                            <!-- HAPUS -->
                                            <a href="#" data-bs-toggle="modal" class="btn btn-danger" data-bs-target="#hapus<?= $data['id_pengaduan'] ?>" style="text-decoration:none; color:white;">HAPUS</a>
                                            <!-- modal HAPUS -->
                                            <div class="modal fade" id="hapus<?= $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="hapusLabel">Hapus Data</h1>
                                                            <button type="button" class="btn-close bg-dark " data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="edit_data.php" method="POST">
                                                                <input type="hidden" name="id_pengaduan" class="form-control" value="<?= $data['id_pengaduan']; ?>">
                                                                <p>Yakin mau dihapus data <br> <?= $data['judul_pengaduan']; ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="hapus_pengaduan" value="hapus_pengaduan" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /modal-HAPUS -->
                                            <!-- /HAPUS -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>