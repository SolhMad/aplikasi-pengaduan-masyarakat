<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p>Selamat Datang Masyarakat</p>
			<div class="card">
                <div class="card-header">
                    FORM PENGADUAN
                </div>
                    <div class="card-body">
                        <form action="" method="POST">
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
                                <input type="file" class="form-control" name="foto" id="foto" required>
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
                            <tr>
                                <td>1.</td>
                                <td>Jalan Rusak</td>
                                <td>Lorem ipsum dolor sit amet</td>
                                <td><img src="#" alt="Ini Foto" width="100px"></td>
                                <td>Selesai
                                    <a href="index.php?page=tanggapan">Lihat Tanggapan</a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary">Edit</a> |
                                    <a href="#" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>   
    </div>
</div>