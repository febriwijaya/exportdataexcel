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
  $ot = htmlspecialchars($data["OT(UTC)"]);
  $Latitude = htmlspecialchars($data["lat"]);
  $Longitude = htmlspecialchars($data["long"]);
  $mag = htmlspecialchars($data["mag"]);
  $Depth = htmlspecialchars($data["depth"]);
  $Region = htmlspecialchars($data["region"]);
  $jarak = htmlspecialchars($data["jarak"]);
  $dirasakan = htmlspecialchars($data["dirasakan"]);

  // query insert data
  $query = "INSERT INTO data2018dst VALUES ('', '$date', '$ot', '$Latitude', '$Longitude', '$mag', '$Depth', '$Region', '$jarak', '$dirasakan')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapus($no)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM data2018dst WHERE no = $no");
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;
  // ambil data dari tiap elemen dalam form
  $no = $data["no"];
  $date = htmlspecialchars($data["date"]);
  $ot = htmlspecialchars($data["OT(UTC)"]);
  $Latitude = htmlspecialchars($data["lat"]);
  $Longitude = htmlspecialchars($data["long"]);
  $mag = htmlspecialchars($data["mag"]);
  $Depth = htmlspecialchars($data["depth"]);
  $Region = htmlspecialchars($data["region"]);
  $jarak = htmlspecialchars($data["jarak"]);
  $dirasakan = htmlspecialchars($data["dirasakan"]);
  // query insert data
  $query = "UPDATE data2018dst SET
            date = '$date',
            OT(UTC) = '$ot',
            lat = '$Latitude ',
            long = '$Longitude',
            mag = '$mag',
            depth = '$Depth',
            region = '$Region',
            jarak = '$jarak',
            dirasakan = '$dirasakan'
            WHERE no = $no
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
