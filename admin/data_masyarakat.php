<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">

            <div class="card">
                <div class="card-header">
                    DATA MASYARAKAT
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Data</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include "../config/functions.php";
                            $query = mysqli_query($conn, "SELECT * FROM masyarakat");
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nik']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['username']; ?></td>
                                    <td><?= $data['telp']; ?></td>
                                    <td>
                                        <!-- HAPUS -->
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['nik'] ?>">HAPUS</a>
                                        <!-- modal HAPUS -->
                                        <div class="modal fade" id="hapus<?= $data['nik'] ?>" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="edit_data.php" method="POST">
                                                            <input type="hidden" name="nik" class="form-control" value="<?= $data['nik']; ?>">
                                                            <p>Yakin mau dihapus data <br> <?= $data['nama']; ?>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="hapus_masyarakat" value="hapus_masyarakat" class="btn btn-danger">Hapus</button>
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

<!-- Modal Tambah Data-->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="verifikasiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="verifikasiLabel">Tambah Data Masyarakat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <label class="label col-md-4">Nik</label>
                        <div class="col-md-8">
                            <input type="number" name="nik" class="form-control" placeholder="Masukan NIK" required autofocus>
                        </div>
                    </div>
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
<!-- /modal-VERIFIKASI -->
<!-- /VERIVIKASI -->
<?php

include '../config/koneksi.php';
if (isset($_POST["kirim"])) {

    //TANGKAP DATA DARI VAR POST DI DALAM FORM
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $telp = $_POST["telp"];
    $level = 'masyarakat';

    //INSERT DATA KE TABEL MASYARAKAT
    $query = mysqli_query($conn, "INSERT INTO masyarakat 
                        VALUES ('$nik','$nama','$username','$password','$telp','$level') ");


    //Pengkondisian SETELAH INSERT AKAN DI BAWA KEMANA
    if ($query) {

        echo "
                        <script>
                         alert('Data Berhasil Ditambahkan');
                         document.location.href='index.php?page=masyarakat';
                     </script>
                 ";
    } else {
        echo "
                     <script>
                         alert('Data Gagal Ditambahkan');
                         document.location.href='index.php?page=masyarakat';
                     </script>
                 ";
    }
}

?>