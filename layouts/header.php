<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APEM | Aplikasi Pengaduan Masyarakat</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-success bg-opacity-50">
    <div class="container">
      <a class="navbar-brand" href="index.php">Aplikasi Pengaduan Masyarakat</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <?php if ($_SESSION["login"] == 'admin') { ?>
            <a class="nav-link" href="index.php?page=tanggapan">Data Tanggapan</a>
            <a class="nav-link" href="index.php?page=pengaduan">Data Pengaduan</a>
            <a class="nav-link" href="../config/aksi_logout.php">Log-out</a>
          <?php  } elseif ($_SESSION["login"] == 'petugas') { ?>
            <a class="nav-link" href="index.php?page=tanggapan">Data Tanggapan</a>
            <a class="nav-link" href="index.php?page=pengaduan">Data Pengaduan</a>
            <a class="nav-link" href="../config/aksi_logout.php">Log-out</a>
          <?php  } elseif ($_SESSION["login"] == 'masyarakat') { ?>
            <a class="nav-link" href="../config/aksi_logout.php">Log-out</a>
          <?php  } else { ?>
            <a class="nav-link" href="index.php?page=registrasi">Daftar Akun</a>
            <a class="nav-link" href="index.php?page=login">Halo</a>
          <?php  } ?>
        </ul>
      </div>
    </div>
  </nav>