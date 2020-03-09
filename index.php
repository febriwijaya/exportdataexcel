<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Administrator</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster|Poppins&display=swap" rel="stylesheet">
  <link href="dist/css/styles.css" rel="stylesheet" />
  <link rel="shortcut icon" href="image/bmkg.png" type="image/x-icon">
  <style>
    .cursive {
      font-family: 'Lemonada', cursive;
    }

    .kecil {

      width: 40px;
      height: 40px;
    }

    .jumbotronx {
      background-image: url(image/gelombang.png);
      height: 650px;
      width: 100%;
      background-size: cover;
      text-align: center;
      margin-left: -30px;
      position: relative;
    }

    .tombol {
      z-index: 1;
      position: relative;
    }

    .jumbotronx::after {
      content: '';
      display: block;
      width: 100%;
      height: 80%;
      position: absolute;
      bottom: 0;
    }

    .header {
      font-family: 'Lobster',
        cursive;
      font-family: 'Poppins',
        sans-serif;
      font-weight: 600;
      font-size: 60px;
      line-height: 70px;
      text-align: left;
    }

    .paragraph {
      font-family: 'Open Sans',
        sans-serif;
      font-size: 20px;
      line-height: 30px;
      text-align: left;
    }

    .gambar-kanan {
      height: 650px;
      margin-right: -110px;
      width: 100%;
    }

    @media (max-width: 767.98px) {
      .width {
        width: 100%;
        padding: 0;
        margin: 0;
      }

      .hilang {
        display: none;
      }
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand cursive" href="index"><img src="src/assets/img/bmkg.png" class="kecil"> BMKG</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </div>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="logout">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Data Gempa</div>
            <a class="nav-link" href="gempa">
              <div class="sb-nav-link-icon"><i class="fas fa-place-of-worship"></i></div>
              2018
            </a>
	
          </div>
        </div>

      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <div class="jumbotronx width">
            <div class="row">
              <div class="col-md-7">
                <p class="header p-5 text-center">Selamat Datang di aplikasi !</p>
                <p class="paragraph pl-5 text-center">Aplikasi ini adalah aplikasi sederhana untuk menginput, mengubah, dan menghapus data cuaca</p>
                <p class="paragraph pl-5 text-center">Silahkan klik disini untuk memulai aplikasi </p>
                <a href="gempa" class="btn btn-primary tombol" target="_blank">Klik Disini</a>
              </div>
              <div class="col-md-5">
                <img src="image/fikom.png" class="gambar-kanan hilang">
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; <?= date('Y'); ?></div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="src/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="src/assets/demo/chart-area-demo.js"></script>
  <script src="src/assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="src/assets/demo/datatables-demo.js"></script>
</body>

</html>