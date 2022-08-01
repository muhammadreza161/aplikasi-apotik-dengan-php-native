<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$id = $_POST['id_obat'];
$nama = $_POST['nama_obat'];
$jenis = $_POST['jenis_obat'];
$hg = $_POST['harga'];
$ket = $_POST['ket'];

//menginput data ke database
 mysqli_query($connect,"INSERT INTO obat VALUES('$id', '$nama', '$jenis', '$hg', '$ket')");

//mengalihkan ke halaman login kembali
    header("location: obat_staff.php"); 
?>




