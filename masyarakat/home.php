<?php
require '../config/functions.php';

if (isset($_POST["kirim"])) {

    if (tambah_pengaduan($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dikirim');
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
                            <input type="text" class="form-control" name="judul_laporan" id="judul_laporan" placeholder="Masukan Judul Laporan" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="isi_laporan" class="form-label"> Isi Laporan </label>
                            <textarea class="form-control" name="isi_laporan" placeholder="Masukan Isi Laporan" required autocomplete="off"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label"> Foto </label>
                            <input type="file" class="form-control" name="gambar" id="foto">
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
                    <table class="table table-striped" style="max-width:100%;">
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
                                    <td><img src="../database/img/<?= $p['foto']; ?>" alt="Ini Foto" width="80px"></td>
                                    <td>
                                        <!-- cek dari database table pengaduan column statusnya apa -->
                                        <?php if ($p['status'] == 0) {
                                            echo "<span class ='badge bg-danger text-light'>Menunggu</span>";
                                        } elseif ($p['status'] == "proses") {
                                            echo "<span class ='badge bg-warning text-dark'>Proses</span>";
                                        } else {
                                            echo "<span class ='badge bg-success text-light'>Selesai</span>";
                                            echo "</br>";
                                            echo "<a href='index.php?page=tanggapan&id_pengaduan=$p[id_pengaduan]'>Lihat Tanggapan</a>";
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusmodal<?= $p['id_pengaduan'] ?>">
                                            Hapus
                                        </button>

                                        <!-- Modal HAPUS -->
                                        <div class="modal fade" id="hapusmodal<?= $p['id_pengaduan'] ?>" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda YaQin akan mengapus data <br><?= $p['judul_pengaduan'] ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">
                                                            <a href="../config/hapus_masyarakat.php?id_pengaduan=<?= $p['id_pengaduan'] ?>" style="text-decoration: none; color:white;">Hapus</a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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