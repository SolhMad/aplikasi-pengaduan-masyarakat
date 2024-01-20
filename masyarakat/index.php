  <?php
  session_start();
  include '../layouts/header.php';

  //ini program untuk menendang user NAKAL
  if (is_null($_SESSION['nama'])) {
    //user NAKAL dialihkan ke halaman login untuk login
    header("Location:../index.php?page=login");
    die();
  }
    
  if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
      case 'tanggapan':
        include 'tanggapan.php';
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