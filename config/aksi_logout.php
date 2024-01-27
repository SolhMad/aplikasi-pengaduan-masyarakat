<?php

session_start();
session_destroy();

echo "
    <script>
        alert('Logout Berhasil');
        document.location.href='../index.php';
    </script>
";
die();

?>
<!-- end -->