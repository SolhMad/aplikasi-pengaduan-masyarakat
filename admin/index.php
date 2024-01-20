  <?php

  include '../layouts/header.php';
  // ini agar user tidak bisa masuk lewat url ke dalam halaman ADMIN
  // if (is_null($_SESSION['nama_petugas'])) {
  //   header("Location:../index.php?page=login");
  //   die();
  // }
  

  if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
      case 'pengaduan':
        include 'data_pengaduan.php';
        break;
      case 'tanggapan':
        include 'data_tanggapan.php';
        break;
      case 'petugas':
        include 'data_petugas.php';
        break;
      case 'masyarakat':
        include 'data_masyarakat.php';
        break;
      default:
        echo "HALAMAN TAK TERSEDIA";
        break;
    }
  } else {
    include 'home.php';
  }

  include '../layouts/footer.php';




  ?>