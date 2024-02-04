 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <title>APEM | Aplikasi Pengaduan Masyarakat</title>
   <!-- Bootstrap -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
   <!-- Nucleo Icons -->
   <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
   <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- CSS Files -->
   <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
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

 <body class="bg-light">

   <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];

      switch ($page) {
        case 'login':
          include 'login.php';
          break;
        case 'registrasi':
          include 'registrasi.php';
          break;

        default:
          echo "HALAMAN TAK TERSEDIA";
          break;
      }
    } else {
      include 'home.php';
    }
    ?>

   <!-- untuk footer ada di halamannya masing-masing -->
   <!-- plugin -->
   <div class="fixed-plugin">
     <div class="card shadow-lg">
       <div class="card-header pb-0 pt-3 ">
         <div class="float-end mt-4">
           <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
             <i class="fa fa-close"></i>
           </button>
         </div>
         <!-- End Toggle Button -->
       </div>
       <hr class="horizontal dark my-1">
       <div class="card-body pt-sm-3 pt-0 overflow-auto">
         <!-- Sidenav Type -->
         <div class="d-flex">
           <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
           <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
         </div>
         <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
         <!-- Navbar Fixed -->
         <div class="d-flex my-3">
           <h6 class="mb-0">Navbar Fixed</h6>
           <div class="form-check form-switch ps-0 ms-auto my-auto">
             <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
           </div>
         </div>
         <hr class="horizontal dark my-sm-4">
       </div>
     </div>
   </div>
   <!--   Core JS Files   -->
   <script src="assets/js/core/popper.min.js"></script>
   <script src="assets/js/core/bootstrap.min.js"></script>
   <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="assets/js/plugins/chartjs.min.js"></script>
   <!-- Github buttons -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>
   <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>
   <!-- BOOTSTRAP -->
   <script src="assets/js/bootstrap.min.js"></script>
   <!-- plugin -->
 </body>

 </html>