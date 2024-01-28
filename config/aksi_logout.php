<?php

session_start();
session_destroy();//menghentikan session yg sudah dibuat saat login

echo "
    <script>
        alert('Logout Berhasil');
        document.location.href='../index.php';
    </script>
";
die();

?>
<!-- end -->