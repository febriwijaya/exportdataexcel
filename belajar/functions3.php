<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "gempa");


function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  global $conn;
  // ambil data dari tiap elemen dalam form
  $date = htmlspecialchars($data["date"]);
  $ot = htmlspecialchars($data["OT"]);
  $m = htmlspecialchars($data["M"]);
  $Depth = htmlspecialchars($data["Depth"]);
  $Latitude = htmlspecialchars($data["Latitude"]);
  $Longitude = htmlspecialchars($data["Longitude"]);
  $lokasi = htmlspecialchars($data["lokasi"]);
  $keterangan = htmlspecialchars($data["keterangan"]);
  $intensitas = htmlspecialchars($data["intensitas"]);

  // query insert data
  $query = "INSERT INTO data2020 VALUES ('', '$date', '$ot', '$m', '$Depth', '$Latitude', '$Longitude', '$lokasi', '$keterangan', '$intensitas')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM data2020 WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;
  // ambil data dari tiap elemen dalam form
  $id = $data["id"];
  $date = htmlspecialchars($data["date"]);
  $ot = htmlspecialchars($data["OT"]);
  $m = htmlspecialchars($data["M"]);
  $Depth = htmlspecialchars($data["Depth"]);
  $Latitude = htmlspecialchars($data["Latitude"]);
  $Longitude = htmlspecialchars($data["Longitude"]);
  $lokasi = htmlspecialchars($data["lokasi"]);
  $keterangan = htmlspecialchars($data["keterangan"]);
  $intensitas = htmlspecialchars($data["intensitas"]);
  // query insert data
  $query = "UPDATE data2020 SET
            date = '$date',
            OT = '$ot',
            M = '$m',
            Depth = '$Depth',
            Latitude = '$Latitude',
            Longitude = '$Longitude',
            lokasi = '$lokasi',
            keterangan = '$keterangan',
            intensitas = '$intensitas'
            WHERE id = $id
            ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function registrasi($data)
{
  global $conn;

  $username = strtolower(stripcslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // cek username sudah ada atau belom
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('username sudah terdaftar!');
        </script>";
    return false;
  }

  // cek konfirmasi password
  if ($password !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai');
            </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambahkan user baru ke database
  mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

  return mysqli_affected_rows($conn);
}
