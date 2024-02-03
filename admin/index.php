    <?php

    session_start();
    // ini agar user tidak bisa masuk lewat url ke dalam halaman ADMIN
    if (empty($_SESSION['login'] == "admin" || $_SESSION['login'] == "petugas")) {
        header("Location:../index.php?page=login");
        die();
    }

    ?>

    <?php include "../layouts/admin/head.php"; ?>

    <body class="g-sidenav-show bg-primary ">
        <div class="min-height-300 position-absolute w-100">
            <!-- Side Bar -->
            <?php include "../layouts/admin/aside.php"; ?>
            <!-- End Side Bar -->
            <main class="main-content position-relative border-radius-lg ">
                <!-- Navbar -->
                <?php include "../layouts/admin/header.php"; ?>
                <!-- End Navbar -->
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];

                    switch ($page) {
                        case 'pengaduan':
                            include 'data_pengaduan.php';
                            break;
                        case 'tanggapan':
                            include 'data_tanggapan.php';
                            break;
                        case 'masyarakat':
                            include 'data_masyarakat.php';
                            break;
                        case 'petugas':
                            include 'data_petugas.php';
                            break;
                        case 'hamas':
                            include 'hamasyarakat.php';
                            break;

                        default:
                            echo "HALAMAN TAK TERSEDIA";
                            break;
                    }
                } else {
                    include 'home.php';
                }
                ?>


            </main>

            <?php include "../layouts/admin/footer.php"; ?>