<div class="container opacity-100">
  <div class="row d-flex align-items-center" style="height: 100vh;">
    <div class=" col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card border-0 shadow rounded-3 ">
        <div class="card-body p-4 p-sm-5">
          <h3 class="card-title text-center fw-light fs-3">Registrasi</h3>
          <form action="" method="POST">
            <div class="">
              <label for="nik" class="form-label">NIK</label>
              <input type="number" class="form-control" name="nik" id="nik" placeholder="Masukan Nik Kamuh" required autocomplete="off" autofocus>
            </div>
            <div class="">
              <label for="nama_lengkap"> Nama Lengkap </label>
              <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukan Nama Lengkap" required autocomplete="off">
            </div>
            <div class="">
              <label for="username"> Username </label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required autocomplete="off">
            </div>
            <div class="">
              <label for="password"> Password </label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password" required autocomplete="off">
            </div>
            <div class="mb-2">
              <label for="telp"> Telp </label>
              <input type="number" class="form-control" name="telp" id="telp" placeholder="Masukan Nomor Telepon" required autocomplete="off">
            </div>
            <div class="d-grid">
              <button type="submit" name="kirim" class="btn btn-success">DAFTAR</button>
            </div>
            <div class="row mt-1">
              <div class="col-6">
                <div class="d-grid">
                  <a href="index.php" class="btn btn-danger btn-block">Kembali</a>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <a href="index.php?page=login" class="btn btn-primary btn-block">Login</a>
                </div>
              </div>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>



<?php

include 'config/koneksi.php';
if (isset($_POST["kirim"])) {

  //TANGKAP DATA DARI VAR POST DI DALAM FORM
  $nik = htmlspecialchars($_POST["nik"]);
  $nama = htmlspecialchars($_POST["nama_lengkap"]);
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars(md5($_POST["password"]));
  $telp = htmlspecialchars($_POST["telp"]);
  $level = 'masyarakat';

  //INSERT DATA KE TABEL MASYARAKAT
  $query = mysqli_query($conn, "INSERT INTO masyarakat 
                        VALUES ('$nik','$nama','$username','$password','$telp','$level') ");


  //Pengkondisian SETELAH INSERT AKAN DI BAWA KEMANA
  if ($query) {

    echo "
        <script>
          alert('Data Berhasil Ditambahkan');
          document.location.href='index.php?page=login';
        </script>
    ";
  } else {
    echo "
        <script>
          alert('Data Gagal Ditambahkan');
          document.location.href='index.php?page=registrasi';
        </script>
    ";
  }
}

?>
