<?php
require 'functions.php';

//menangkap $_GET 
$id = $_GET['id_pengaduan'];

if (hapus($id) > 0) {

    echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href='../masyarakat/index.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href='../masyarakat/index.php';
            </script>
        ";
}

?>
<!-- end -->