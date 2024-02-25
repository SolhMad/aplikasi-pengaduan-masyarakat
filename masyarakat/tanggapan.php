<?php

include "../config/koneksi.php";
if (!empty($_GET['id_pengaduan'])) {
    $id = $_GET['id_pengaduan'];
    $query = mysqli_query($conn, "SELECT a.*,b.* FROM pengaduan a INNER JOIN tanggapan b ON a.id_pengaduan = b.id_pengaduan WHERE b.id_pengaduan = '$id'");
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        LIHAT TANGGAPAN
                    </div>
                    <div class="card-body">
                        <?php while ($data = mysqli_fetch_array($query)) { ?>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="judul_laporan" class="form-label">Judul Laporan</label>
                                    <input type="text" class="form-control" value="<?= $data['judul_pengaduan']; ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="isi_laporan" class="form-label">Isi Laporan</label>
                                    <textarea class="form-control" readonly><?= $data['isi_laporan']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label"> Foto </label>
                                    <img src="../database/img/<?= $data['foto']; ?>" class="form-control" style="width: 150px">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggapan" class="form-label"> Tanggapan </label>
                                    <textarea class="form-control" readonly><?= $data['tanggapan']; ?></textarea>
                                </div>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?page=aduan" class="btn btn-success">Kembali</a>
                    </div>
                <?php  } ?>
                </form>
                </div>
            </div>
        </div>
    </div>
<?php  } else {
    echo "halaman tidak tersedia";
} ?>