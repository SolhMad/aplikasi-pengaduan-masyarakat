<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header d-flex">
                    DATA PETUGAS
                    <a href="#" class="btn btn-primary ms-auto " data-bs-toggle="modal" data-bs-target="#tambah">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nama</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Username</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Telepon</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Level</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../config/koneksi.php";
                            $query = mysqli_query($conn, "SELECT * FROM petugas"); //query data dari tabel petugas
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_petugas']; ?></td>
                                    <td><?= $data['username']; ?></td>
                                    <td><?= $data['telp']; ?></td>
                                    <td><?= $data['level']; ?></td>
                                    <td>
                                        <!-- HAPUS -->
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['id_petugas'] ?>">HAPUS</a>
                                        <!-- modal HAPUS -->
                                        <div class="modal fade" id="hapus<?= $data['id_petugas'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="edit_data.php" method="POST">
                                                            <input type="hidden" name="id_petugas" class="form-control" value="<?= $data['id_petugas']; ?>">
                                                            <p>Yakin mau dihapus data <br> <?= $data['nama_petugas']; ?>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus_petugas" value="hapus_petugas" class="btn btn-danger">Hapus</button>
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

<!-- Modal TAMBAH PETUGAS-->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="verifikasiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="verifikasiLabel">Tambah Data Petugas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <label class="label col-md-4">Nama Lengkap</label>
                        <div class="col-md-8">
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="label col-md-4">Username</label>
                        <div class="col-md-8">
                            <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="label col-md-4">Password</label>
                        <div class="col-md-8">
                            <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="label col-md-4">No.Telpon</label>
                        <div class="col-md-8">
                            <input type="number" name="telp" class="form-control" placeholder="Masukan Telpon" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="kirim" class="btn btn-success">Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /modal- TAMBAH PETUGAS -->
<?php

include '../config/koneksi.php';
if (isset($_POST["kirim"])) {

    //TANGKAP DATA DARI VAR POST DI DALAM FORM
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $telp = $_POST["telp"];
    $level = 'petugas';

    //INSERT DATA KE TABEL PETUGAS
    $query = mysqli_query($conn, "INSERT INTO petugas 
                        VALUES ('','$nama','$username','$password','$telp','$level') ");


    //Pengkondisian SETELAH INSERT AKAN DI BAWA KEMANA
    if ($query) {

        echo "
                        <script>
                         alert('Data Petugas Berhasil Ditambahkan');
                         document.location.href='index.php?page=petugas';
                     </script>
                 ";
    } else {
        echo "
                     <script>
                         alert('Data Petugas Gagal Ditambahkan');
                         document.location.href='index.php?page=petugas';
                     </script>
                 ";
    }
}

?>