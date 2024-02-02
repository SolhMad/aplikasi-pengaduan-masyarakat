    <?php

    session_start();
    // ini agar user tidak bisa masuk lewat url ke dalam halaman ADMIN
    if (empty($_SESSION['login'] == "admin" || $_SESSION['login'] == "petugas")) {
        header("Location:../index.php?page=login");
        die();
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <title>
            ADMIN
        </title>
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

    </head>

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