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
                                    <td><img src="../database/img/<?= $data['foto']; ?>" width="50px" alt="syalah"></td>
                                    <td><!-- cek dari database table pengaduan column statusnya apa -->
                                        <?php if ($data['status'] == 0) {
                                            echo "<span class ='badge bg-danger text-light'>Menunggu</span>";
                                        } elseif ($data['status'] == "proses") {
                                            echo "<span class ='badge bg-warning text-dark'>Proses</span>";
                                        } else {
                                            echo "<span class ='badge bg-success text-light'>Selesai</span>";
                                            echo "<a href='index.php?page=tanggapan'>Lihat Tanggapan</a>";
                                        }
                                        ?></td>
                                    <td>
                                        <!-- VERIFIKASI -->
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verifikasi<?= $data['id_pengaduan'] ?>">VERIFIKASI</a>
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

                                        <!-- TANGGAPI -->
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tanggapi<?= $data['id_pengaduan'] ?>">TANGGAPI</a>
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
                                                                    <textarea type="text" name="tanggapan" class="form-control" required></textarea>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="kirim" class="btn btn-primary">Tanggapi</button>
                                                    </div>
                                                    </form>

                                                    <?php
                                                    if (isset($_POST["kirim"])) {
                                                        //menampug data
                                                        $id_pengaduan = $_POST["id_pengaduan"];
                                                        $id_petugas = $_SESSION['id_petugas'];
                                                        $tanggal = date("Y-m-d");
                                                        $tanggapan = $_POST["tanggapan"];

                                                        //insert data
                                                        $query = mysqli_query($conn, "INSERT INTO tanggapan VALUES ('','$id_pengaduan','$tanggal','$tanggapan','$id_petugas')");

                                                        if ($tanggapan != null) {
                                                            $update = mysqli_query($conn, "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = '$id_pengaduan'");
                                                        }

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
                                        <!-- /modal-TANGGAPI -->
                                        <!-- /TANGGAPI -->

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