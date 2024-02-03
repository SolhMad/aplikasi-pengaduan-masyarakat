 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>APEM | Aplikasi Pengaduan Masyarakat</title>
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <style>
     /* CSS untuk menambahkan background image */
     .bg-image {
       background-image: url('assets/satu.jpeg');
       /* Sesuaikan path/to/your/image.jpg dengan path gambar Anda */
       background-size: cover;
       /* Menyesuaikan ukuran gambar dengan ukuran elemen */
       background-position: center;
       /* Menengahkan gambar */
       min-height: 100vh;
       /* Set tinggi elemen setara dengan tinggi viewport */
     }
   </style>
 </head>

 <body class="bg-image">

   <nav class="navbar navbar-expand-lg bg-primary ">
     <div class="container">
       <a class="navbar-brand" href="index.php">Aplikasi Pengaduan Masyarakat</a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
         <ul class="navbar-nav">
           <li class="nav-item">
             <a class="nav-link" href="index.php?page=registrasi">Daftar Akun</a>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="index.php?page=login">Login</a>
         </ul>
       </div>
     </div>
   </nav>
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

   <footer class="footer mt-3 py-2 bg-primary opacity-40">
     <div class="container">
       <p class="text-center"> UKK RPL 2023 | Ahmad Soleh | SMKN 1 Panyingkiran</p>
     </div>
   </footer>

   <script src="assets/js/bootstrap.min.js"></script>
 </body>

 </html>