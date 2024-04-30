<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db = "db_latihan_php";

$koneksi = mysqli_connect($server_name, $username, $password);
mysqli_select_db($koneksi, $db);
if (!$koneksi) {
    echo "Error";
}
echo "Suskes";
