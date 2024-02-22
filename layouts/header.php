<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <title>APEM | Aplikasi Pengaduan Masyarakat</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

  <style>
    /* Media query untuk layar desktop */
    @media screen and (min-width: 768px) {
      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
      }
    }
  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg bg-success bg-opacity-50">
    <div class="container">
      <a class="navbar-brand font-weight-bolder " href="index.php">
        <h5>Aplikasi Pengaduan Masyarakat</h5>
      </a>
      <div class="navbar-toggler" id="navbar" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
        <ul class="navbar-nav ms-md-auto justify-content-end">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line bg-white"></i>
            <i class="sidenav-toggler-line bg-white"></i>
            <i class="sidenav-toggler-line bg-white"></i>
          </div>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <?php if ($_SESSION["login"] == 'admin') { ?>
            <a class="nav-link" href="index.php?page=tanggapan">Data Tanggapan</a>
            <a class="nav-link" href="index.php?page=pengaduan">Data Pengaduan</a>
            <a class="nav-link" href="index.php?page=masyarakat">Data Masyarakat</a>
            <a class="nav-link" href="index.php?page=petugas">Data Petugas</a>
            <a class="nav-link" href="../config/aksi_logout.php">Log-out</a>
          <?php  } elseif ($_SESSION["login"] == 'petugas') { ?>
            <a class="nav-link" href="index.php?page=tanggapan">Data Tanggapan</a>
            <a class="nav-link" href="index.php?page=pengaduan">Data Pengaduan</a>
            <a class="nav-link" href="../config/aksi_logout.php">Log-out</a>
          <?php  } elseif ($_SESSION["login"] == 'masyarakat') { ?>
            <a class="nav-link" href="index.php">Form Pengaduan</a>
            <a class="nav-link" href="index.php?page=aduan">Daftar Pengaduan </a>
            <a class="nav-link" href="../config/aksi_logout.php">Log-out</a>
          <?php  } else { ?>
            <a class="nav-link" href="index.php?page=registrasi">Daftar Akun</a>
            <a class="nav-link" href="index.php?page=login">Halo</a>
          <?php  } ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Navbar Light -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
    <div class="container">
      <a class="navbar-brand" href="" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
        Argon Dashboard
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav navbar-nav-hover ms-auto">
          <div class="row">
            <div class="col-auto m-auto">
              <a class="cursor-pointer">
                <i class="fa fa-cog fixed-plugin-button-nav"></i>
              </a>
            </div>
            <div class="col-auto m-auto">
              <div class="dropdown">
                <a class="cursor-pointer" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bell"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                  ...
                </ul>
              </div>
            </div>
            <div class="col-auto">
              <div class="bg-white border-radius-lg d-flex me-2">
                <input type="text" class="form-control border-0 ps-3" placeholder="Type here...">
                <button class="btn bg-gradient-primary my-1 me-1">Search</button>
              </div>
            </div>
          </div>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->


  </div>