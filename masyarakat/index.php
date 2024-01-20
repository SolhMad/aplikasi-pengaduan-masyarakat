  <?php
  session_start();
  include '../layouts/header.php';

  if (is_null($_SESSION['nama'])) {
    echo "
        <script>
          alert('Login dulu bosQ');
          document.location.href='../index.php?page=login';
        </script>
    ";
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