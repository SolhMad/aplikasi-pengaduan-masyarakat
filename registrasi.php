<div class="row mt-3">
  <div class="col-md-4 offset-md-4">
    <div class="card">
      <div class="card-header">
        REGISTRASI
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" class="form-control" name="nik" id="nik" placeholder="Masukan Nik Kamuh" required autocomplete="off" autofocus>
          </div>
          <div class="mb-3">
            <label for="nama"> Nama Lengkap </label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap" required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="username"> username </label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="password"> Password </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password" required autocomplete="off">
          </div>
          <div class="mb-3">
            <label for="telp"> Telp </label>
            <input type="number" class="form-control" name="telp" id="telp" placeholder="Masukan Nomor Telepon" required autocomplete="off">
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" name="kirim" class="btn btn-success">DAFTAR</button>
        <a href="index.php?page=login" class="m-3" style="text-decoration: none;">Sudah Punya Account ? LOGIN!!</a>
      </div>
      </form>
    </div>
  </div>

</div>

<?php

include 'config/koneksi.php';
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