<?php
require '../config/koneksi.php';

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Selamat Datang <?= $_SESSION["nama"]; ?></h4>
            <div class="card">
                <div class="card-body">
                    FORM PENGADUAN <br>
                    <hr class="bg-dark">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul_laporan" class="form-label"> Judul Laporan </label>
                            <input type="text" class="form-control" name="judul_laporan" id="judul_laporan" placeholder="Masukan Judul Laporan" required autocomplete="off" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="isi_laporan" class="form-label"> Isi Laporan </label>
                            <textarea class="form-control" name="isi_laporan" placeholder="Masukan Isi Laporan" required autocomplete="off"></textarea>
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
                <?php
                if (isset($_POST['kirim'])) {
                    //menampung data yang dikirim $POST
                    $nik = $_SESSION["nik"];
                    $judul = $_POST["judul_laporan"];
                    $isi = $_POST["isi_laporan"];
                    $status = 0;
                    $tanggal = date('Y-m-d');
                    $foto = $_FILES['foto']['name'];
                    $tmp = $_FILES['foto']['tmp_name'];
                    $lokasi = '../database/img/';
                    $nama_foto = rand(0, 999) . '-' . $foto;

                    move_uploaded_file($tmp, $lokasi . $nama_foto);
                    $query = mysqli_query($conn, "INSERT INTO pengaduan VALUES('','$tanggal','$nik','$judul','$isi','$nama_foto','$status')"); //kirim data ke pengaduan yg value nya ditampung

                    //jika query/insert data berhasil/gagal maka tampilkan alert
                    if ($query) {

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
                ?>
            </div>
        </div>
    </div>
</div>