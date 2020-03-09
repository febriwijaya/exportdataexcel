<?php
require 'functions.php';
require 'excel_reader2.php';

$target = basename($_FILES['filepegawai']['name']);
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

chmod($_FILES['filepegawai']['name'], 0777);

$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'], false);
$jumlah_baris = $data->rowcount($sheet_index = 0);

$berhasil = 0;
for ($i = 2; $i <= $jumlah_baris; $i++) {
  $date = $data->val($i, 1);
  $ot = $data->val($i, 2);
  $Latitude = $data->val($i, 3);
  $Longitude = $data->val($i, 4);
  $mag = $data->val($i, 5);
  $Depth = $data->val($i, 6);
  $Region = $data->val($i, 7);
  $jarak = $data->val($i, 8);
  $dirasakan = $data->val($i, 9);

  if ($date != "" && $ot != "" && $Latitude != "" && $Longitude != "" && $mag != "" && $Depth != "" && $Region != "" && $jarak != "" && $dirasakan != "") {
    mysqli_query($conn, "INSERT INTO data2018dst values('', '$date', '$ot', '$Latitude', '$Longitude', '$mag', '$Depth', '$Region', '$jarak', '$dirasakan')");
    $berhasil++;
  }
}
unlink($_FILES['filepegawai']['name']);
echo "
        <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'gempa.php';
        </script>";
