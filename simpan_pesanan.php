<?php
session_start();
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$uname = $_POST['id'];
$id = $_POST['id_pesanan'];
$tgl = $_POST['tanggal_pesan'];
$nama = $_POST['nama_obat'];
$hg = $_POST['harga'];
$jml = $_POST['jumlah'];
$total = $_POST['total'];

//menginput data ke database
 mysqli_query($connect,"INSERT INTO pesanan VALUES('$uname', '$id', '$tgl', '$nama', '$hg', '$jml', '$total')");

//mengalihkan ke halaman login kembali
    header("location: pesanan_pelanggan.php"); 
?>




