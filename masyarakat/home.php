<?php
require '../config/functions.php';

if (isset($_POST["kirim"])) {

    if (tambah_pengaduan($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dikirim');
                document.location.href='index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dikirim');
                document.location.href='index.php';
            </script>
        ";
    }
}

$pengaduans = ambil('SELECT * FROM pengaduan');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>Selamat Datang <?= $_SESSION["nama"]; ?></p>
            <div class="card">
                <div class="card-header">
                    FORM PENGADUAN
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul_laporan" class="form-label"> Judul Laporan </label>
                            <input type="text" class="form-control" name="judul_laporan" id="judul_laporan" placeholder="Masukan Judul Laporan" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi_laporan" class="form-label"> Isi Laporan </label>
                            <textarea class="form-control" name="isi_laporan" placeholder="Masukan Isi Laporan" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label"> Foto </label>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="kirim" class="btn btn-success">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-3">

            <div class="card">
                <div class="card-header">
                    TABEL PENGADUAN SAYA
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pengaduans as $p) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $p['judul_pengaduan']; ?></td>
                                    <td><?= $p['isi_laporan']; ?></td>
                                    <td><img src="../assets/img/4.png" alt="Ini Foto" width="80px"></td>
                                    <td>Selesai
                                        <a href="index.php?page=tanggapan">Lihat Tanggapan</a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary">Edit</a> |
                                        <a href="../cofig/hapus.php?id=<?= $p['id_pengaduan'] ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>