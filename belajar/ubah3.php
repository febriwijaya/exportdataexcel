<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login");
  exit;
}
require 'functions3.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Ubah Data</title>
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
  <script src="assets/js/sweetalert2.all.min.js"></script>
  <script src="assets/js/myscript.js"></script>
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

    .biru {
      border: 2px solid blue;
    }

    .merah {
      border: 2px solid red;
    }

    .kuning {
      border: 2px solid yellow;
    }

    .hijau {
      border: 2px solid green;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <?php
  // ambil data di URL
  $id = $_GET["id"];

  // query data mahasiswa berdasarkan id
  $mhs = query("SELECT * FROM data2020 WHERE id = $id")[0];
  // cek apakah tombol submit sudah ditekan atau belum
  if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if (ubah($_POST) > 0) {
      echo "
       <script>
          Swal.fire({
		      title: 'Diubah',
		      text: 'Data berhasil diubah! ',
		      icon: 'success'
      });   
      document.location.href = 'gempa3';
        </script>";
    } else {
      echo "
        <script>
          Swal.fire({
		      title: 'Gagal',
		      text: 'Data Gagal diubah! ',
		      icon: 'error'
      });   
      document.location.href = 'gempa3';
        </script>";
    }
  }

  ?>

  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand cursive" href="index.html"><img src="src/assets/img/bmkg.png" class="kecil"> BMKG</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
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
			<a class="nav-link" href="gempa2">
              <div class="sb-nav-link-icon"><i class="fas fa-place-of-worship"></i></div>
              2019
            </a>
			<a class="nav-link" href="gempa3">
              <div class="sb-nav-link-icon"><i class="fas fa-place-of-worship"></i></div>
              2020
            </a>
          </div>
        </div>

      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid mt-2">
          <div class="col-md">
            <div class="card">
              <div class="card-header text-center">
                Ubah data
              </div>
              <div class="card-body p-5">
                <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="date" value="<?= $mhs['date']; ?>" name="date" placeholder="Masukkan Tanggal" required>
                      </div>

                      <div class="form-group">
                        <label for="OT">OT</label>
                        <input type="time" class="form-control" id="OT" value="<?= $mhs['OT']; ?>" name="OT" placeholder="Masukkan OT" required>
                      </div>

                      <div class="form-group">
                        <label for="M">M</label>
                        <input type="text" class="form-control" id="M" value="<?= $mhs['M']; ?>" name="M" placeholder="Masukkan M" required>
                      </div>

                      <div class="form-group">
                        <label for="depth">Depth</label>
                        <input type="text" class="form-control" id="depth" value="<?= $mhs['Depth']; ?>" name="Depth" placeholder="Masukkan Depth" required>
                      </div>

                      <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control" id="latitude" value="<?= $mhs['Latitude']; ?>" name="Latitude" placeholder="Masukkan Latitude" required>
                      </div>

                      <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" id="longitude" value="<?= $mhs['Longitude']; ?>" name="Longitude" placeholder="Masukkan Longitude" required>
                      </div>

                      <div class="form-group">
                        <label for="lokasi">Lokasi Darat Dan Laut</label>
                        <input type="text" class="form-control" id="lokasi" value="<?= $mhs['lokasi']; ?>" name="lokasi" placeholder="Masukkan Lokasi Darat Dan Laut" required>
                      </div>

                      <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" value="<?= $mhs['keterangan']; ?>" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" required>
                      </div>

                      <div class="form-group">
                        <label for="intensitas">Intensitas</label>
                        <input type="text" class="form-control" value="<?= $mhs['intensitas']; ?>" id="intensitas" name="intensitas" placeholder="Masukkan intensitas" required>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-md">
                      <button type="submit" name="submit" class="btn btn-success">Update data!</button>
                    </div>
                  </div>
                </form>
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