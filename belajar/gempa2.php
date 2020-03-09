<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login");
  exit;
}

require 'functions2.php';
// cek apakah tombol submit sudah ditekan atau belum
$gempa2 = query("SELECT * FROM data2019");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Laporan Data Gempa</title>
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
  <script src="assets/js/sweetalert2.all.min.js"></script>
  <script src="assets/js/myscript.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lemonada&display=swap" rel="stylesheet">
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

  if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
      echo "
        <script>
          Swal.fire({
		      title: 'Ditambah',
		      text: 'Data berhasil ditambah! ',
		      icon: 'success'
      });   
      document.location.href = 'gempa2';
        </script>";
    } else {
      echo "
        <script>
        Swal.fire({
		    title: 'Gagal',
		    text: 'Data gagal ditambah! ',
		    icon: 'error'
    });
    document.location.href = 'gempa2';
        </script>";
    }
  }

  ?>

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
			<a class="nav-link" href="gempa2">
              <div class="sb-nav-link-icon"><i class="fas fa-place-of-worship"></i></div>
             2019
            </a>
			<a class="nav-link" href="gempa">
              <div class="sb-nav-link-icon"><i class="fas fa-place-of-worship"></i></div>
             2020
            </a>
          </div>
        </div>

      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <div class="row justify-content-center mt-3 mb-3">
            <div class="col-md-10">
              <h2 class="text-center cursive">kelengkapan data Gempa</h2>
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Tambah Data
              </button>
            </div>

          </div>
          <div class="row">
            <div class="col-md">
              <div class="card">
                <h5 class="card-header text-center">Data Gempa</h5>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Date</th>
                          <th>OT</th>
                          <th>M</th>
                          <th>Depth</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                          <th>Lokasi Darat Dan Laut</th>
                          <th>Keterangan</th>
                          <th>Intensitas</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Date</th>
                          <th>OT</th>
                          <th>M</th>
                          <th>Depth</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                          <th>Lokasi Darat Dan laut</th>
                          <th>Keterangan</th>
                          <th>Intesitas</th>
                          <th>Aksi</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($gempa2 as $row) : ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["date"]; ?></td>
                            <td><?= $row["OT"]; ?></td>
                            <td><?= $row["M"]; ?></td>
                            <td><?= $row["Depth"]; ?></td>
                            <td><?= $row["Latitude"]; ?></td>
                            <td><?= $row["Longitude"]; ?></td>
                            <td><?= $row["lokasi"]; ?></td>
                            <td><?= $row["keterangan"]; ?></td>
                            <td><?= $row["intensitas"]; ?></td>
                            <td>
                              <a href="ubah2?id=<?php echo $row["id"]; ?>" class="badge badge-warning">ubah</a>
                              <a href="hapus2?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin?');" class="badge badge-danger">hapus</a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">
              <p class="text-center">Copyright &copy; <?= date('Y'); ?></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Gempa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="card">
              <div class="card-body">

                <div class="form-group">
                  <label for="date">Tanggal</label>
                  <input type="date" class="form-control" id="date" name="date" placeholder="Masukkan Tanggal" required>
                </div>

                <div class="form-group">
                  <label for="OT">OT</label>
                  <input type="time" class="form-control" id="OT" name="OT" placeholder="Masukkan OT" required>
                </div>

                <div class="form-group">
                  <label for="M">M</label>
                  <input type="text" class="form-control" id="M" name="M" placeholder="Masukkan M" required>
                </div>

                <div class="form-group">
                  <label for="depth">Depth</label>
                  <input type="text" class="form-control" id="depth" name="Depth" placeholder="Masukkan Depth" required>
                </div>

                <div class="form-group">
                  <label for="latitude">Latitude</label>
                  <input type="text" class="form-control" id="latitude" name="Latitude" placeholder="Masukkan Latitude" required>
                </div>

                <div class="form-group">
                  <label for="longitude">Longitude</label>
                  <input type="text" class="form-control" id="longitude" name="Longitude" placeholder="Masukkan Longitude" required>
                </div>

                <div class="form-group">
                  <label for="lokasi">Lokasi Darat Dan Laut</label>
                  <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi Darat Dan Laut" required>
                </div>

                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan" required>
                </div>

                <div class="form-group">
                  <label for="intensitas">intensitas</label>
                  <input type="text" class="form-control" id="intensitas" name="intensitas" placeholder="Masukkan intensitas" required>
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- akhir modal -->

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