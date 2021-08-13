<?php 
$servername = "localhost";
$username = "iyans018";
$password = "Iyans 018";
$db_name = "db_inventory";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Cek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

?>