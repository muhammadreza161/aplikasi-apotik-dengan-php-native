<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$nom = $_POST['no_mitratel'];

// Ambil Data yang Dikirim dari Form
$id = $_POST['id_obat'];
$nama = $_POST['nama_obat'];
$jenis = $_POST['jenis_obat'];
$hg = $_POST['harga'];
$kett = $_POST['ket'];

//mengubah data ke database
 mysqli_query($connect,"UPDATE obat set nama_obat='$nama', jenis_obat='$jenis', harga='$hg', ket='$kett' where id_obat='$id'");

//mengalihkan ke halaman login kembali
    header("location: obat_staff.php"); 
?>