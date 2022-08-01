<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$id = $_POST['id'];
$password = $_POST['pass'];
 
 
// menyeleksi data user dengan id dan password yang sesuai
$login = mysqli_query($connect,"select * from pelanggan where id='$id' and pass='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah id dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_array($login);
 
	// cek jika user login sebagai staff
	if($data['hak_akses']=="staff"){
 
		// buat session login dan id
		$_SESSION['id'] = $data['id'];
		$_SESSION['hak_akses'] = "staff";
		// alihkan ke halaman dashboard staff
		header("location:index_staff.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['hak_akses']=="pelanggan"){
		// buat session login dan id
		$_SESSION['id'] = $data['id'];
		$_SESSION['hak_akses'] = "pelanggan";
		// alihkan ke halaman dashboard pegawai
		header("location:index_pelanggan.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>