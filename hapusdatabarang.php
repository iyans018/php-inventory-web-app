<?php 
include "koneksi.php";
session_start();

if (!$_SESSION['username'] && !$_SESSION['login']) {
    header("Location:login.php");
}

$id_barang = $_GET["id_barang"];

$sql = "DELETE FROM tb_barang WHERE id_barang=$id_barang";

if (mysqli_query($conn, $sql)) {
  header("Location:databarang.php");
} else {
  echo "Gagal hapus data " . mysqli_error($conn);
}

?>