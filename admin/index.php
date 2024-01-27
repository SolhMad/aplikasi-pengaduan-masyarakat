  <?php
  session_start();
  // ini agar user tidak bisa masuk lewat url ke dalam halaman ADMIN
  // if (empty($_SESSION['login'] == "admin" || $_SESSION['login'] == "petugas")) {
  //   header("Location:../index.php?page=login");
  //   die();
  // }


  include '../layouts/header.php';

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