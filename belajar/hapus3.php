<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login");
  exit;
}
require 'functions3.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
  echo "
    <script>
      alert('data berhasil dihapus!');
      document.location.href= 'gempa3';
    </script>
  ";
} else {
  echo "
    <script>
      alert('data gagal dihapus!');
      document.location.href = 'gempa3';
    </script>
  ";
}