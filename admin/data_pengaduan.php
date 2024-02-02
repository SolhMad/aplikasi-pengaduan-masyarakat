<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>PENGADUAN</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead class="text-center">
                                <tr>
                                    <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-dark text-xs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Judul</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Laporan</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Foto</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-dark text-xs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php

                                include "../config/koneksi.php";
                                $no = 1;
                                $ambil = mysqli_query($conn, "SELECT a.*, b.* FROM pengaduan a INNER JOIN masyarakat b ON a.nik = b.nik ORDER BY id_pengaduan ASC;"); //query data dari pengaduan & masyarakat menggunakan INNER JOIN
                                while ($data = mysqli_fetch_array($ambil)) { ?>
                                    <tr>
                                        <td class="align-middle text-center text-sm">
                                            <?= $no++; ?>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <h6 class="mb-0 text-sm"><?= $data['tgl_pengaduan']; ?></h6>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $data['nama']; ?></p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?= $data['judul_pengaduan']; ?>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?= $data['isi_laporan']; ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="../database/img/<?= $data['foto']; ?>" alt="Ini Foto" width="80px">
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                <?php if ($data['status'] == 0) {
                                                    echo "<span class ='badge bg-danger text-light'>Menunggu</span>";
                                                } elseif ($data['status'] == "proses") {
                                                    echo "<span class ='badge bg-warning text-dark'>Proses</span>";
                                                } else {
                                                    echo "<span class ='badge bg-success text-light'>Selesai</span>";
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <?php if ($data['status'] != "selesai") { ?>
                                                <!-- VERIFIKASI -->
                                                <span class="badge badge-sm bg-primary">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#verifikasi<?= $data['id_pengaduan'] ?>" style="text-decoration:none; color:white;">VERIFIKASI</a>
                                                </span>
                                                <!-- Modal VERIFIKASI-->
                                                <div class="modal fade" id="verifikasi<?= $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="verifikasiLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="verifikasiLabel"><?= $data['judul_pengaduan']; ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="id_pengaduan" class="form-control" value="<?= $data['id_pengaduan']; ?>">
                                                                    <div class="row mb-3">
                                                                        <label class="label col-md-4">Status</label>
                                                                        <div class="col-md-8">
                                                                            <select class="form-control" name="status">
                                                                                <option value="proses">Proses</option>
                                                                                <option value="0">Tolak</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="kirim" class="btn btn-primary">Verifikasi</button>
                                                            </div>
                                                            </form>

                                                            <?php
                                                            if (isset($_POST["kirim"])) {
                                                                //menampug data
                                                                $id_pengaduan = $_POST["id_pengaduan"];
                                                                $status = $_POST["status"];

                                                                //insert data
                                                                $query = mysqli_query($conn, "UPDATE pengaduan SET status = '$status' WHERE id_pengaduan = '$id_pengaduan'");

                                                                echo
                                                                "<script>
                                                            alert('Data Berhasil di Masukan');
                                                            document.location.href='index.php?page=pengaduan';
                                                        </script>
                                                        ";
                                                            }


                                                            ?>


                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /modal-VERIFIKASI -->
                                                <!-- /VERIVIKASI -->
                                            <?php  }
                                            if ($data['status'] == "proses") { ?>

                                                <!-- TANGGAPI -->
                                                <span class="badge badge-sm bg-success">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#tanggapi<?= $data['id_pengaduan'] ?>" style="text-decoration:none; color:white;">TANGGAPI</a>
                                                </span>
                                                <!-- Modal TANGGAPI-->
                                                <div class="modal fade" id="tanggapi<?= $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="tanggapiLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="tanggapiLabel"><?= $data['judul_pengaduan']; ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="id_pengaduan" class="form-control" value="<?= $data['id_pengaduan']; ?>">
                                                                    <div class="row mb-3">
                                                                        <label class="label col-md-4">Tanggal</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" name="tgl_pengaduan" class="form-control" value="<?= $data['tgl_pengaduan'] ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="label col-md-4">Judul</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" name="judul_pengaduan" class="form-control" value="<?= $data['judul_pengaduan'] ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="label col-md-4">Isi</label>
                                                                        <div class="col-md-8">
                                                                            <textarea type="text" name="isi_laporan" class="form-control" readonly><?= $data['isi_laporan'] ?> </textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="label col-md-4">Foto</label>
                                                                        <div class="col-md-8">
                                                                            <img src="../database/img/<?= $data['foto'] ?>" width="100px">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label class="label col-md-4">Tanggapan</label>
                                                                        <div class="col-md-8">
                                                                            <textarea type="text" name="tanggapan" class="form-control" required autofocus autocomplete="off"></textarea>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="tanggapi" class="btn btn-primary">Tanggapi</button>
                                                            </div>
                                                            </form>

                                                            <?php
                                                            if (isset($_POST["tanggapi"])) {
                                                                //menampug data
                                                                $id_pengaduan = $_POST["id_pengaduan"];
                                                                $id_petugas = $_SESSION['id_petugas'];
                                                                $tanggal = date("Y-m-d");
                                                                $tanggapan = $_POST["tanggapan"];

                                                                //insert data
                                                                $query = mysqli_query($conn, "INSERT INTO tanggapan VALUES ('','$id_pengaduan','$tanggal','$tanggapan','$id_petugas')");

                                                                if ($query) {
                                                                    if ($tanggapan != null) {
                                                                        $update = mysqli_query($conn, "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = '$id_pengaduan'");
                                                                    }
                                                                    echo
                                                                    "<script>
                                                                alert('Data Berhasil di Masukan');
                                                                document.location.href='index.php?page=pengaduan';
                                                            </script>
                                                            ";
                                                                } else {

                                                                    echo
                                                                    "<script>
                                                                alert('Data Berhasil di Masukan');
                                                                document.location.href='index.php?page=pengaduan';
                                                            </script>
                                                            ";
                                                                }
                                                            }


                                                            ?>


                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /modal-TANGGAPI -->
                                                <!-- /TANGGAPI -->
                                            <?php  } ?>
                                            <!-- HAPUS -->
                                            <span class="badge badge-sm bg-danger">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_pengaduan'] ?>" style="text-decoration:none; color:white;">HAPUS</a>
                                            </span>
                                            <!-- modal HAPUS -->
                                            <div class="modal fade" id="hapus<?= $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="hapusLabel">Hapus Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                            <?php if ($data['status'] = 0) { ?>
                                                <!-- HAPUS -->
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_pengaduan'] ?>">HAPUS</a>
                                                <!-- modal HAPUS -->
                                                <div class="modal fade" id="hapus<?= $data['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="hapusLabel">Hapus Data</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                            <?php  } ?>
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
</div>