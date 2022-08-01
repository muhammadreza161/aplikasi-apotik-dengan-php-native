<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$id = $_POST['id_pelanggan'];
$uname = $_POST['username'];
$nama = $_POST['nama'];
$no = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$pass = $_POST[''];
$hak = $_POST['hak_akses'];

//menginput data ke database
 mysqli_query($connect,"INSERT INTO pelanggan VALUES('$id', '$uname', '$nama', '$no', '$alamat', '$pass', '$hak')");

//mengalihkan ke halaman login kembali
    header("location: login.php"); 
?>




