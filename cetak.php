<?php
require('fpdf17/fpdf.php');
ob_end_clean(); //    the buffer and never prints or returns anything.
ob_start(); // it starts buffering
session_start();



$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "apotik";
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

 $NO = $_GET['id_pesanan'];

 $queri = "SELECT * from pesanan where id_pesanan='".$NO."'";
 $lakukan = mysqli_query($koneksi,$queri);
 $tampilkan = mysqli_fetch_array($lakukan);
 
$monList = array(
	'01' => 'Januari',
	'02' => 'Februari',
	'03' => 'Maret', 
	'04' => 'April',
	'05' => 'Mei',
	'06' => 'Juni',
	'07' => 'Juli',
	'08' => 'Agustus',
	'09' => 'September',
	'10' => 'Oktober',
	'12' => 'November',
	'12' => 'Desember'
);

$pdf = new FPDF('P', 'mm', 'A5');

$pdf->AddPage();

 $pdf->Cell(50  ,10,'',0,1);



 $pdf->Image('foto/logo.jpg',-3,2,45);

$pdf-> SetFont('Arial', 'B', 20);
$pdf->Cell(30 ,5,'',0,0);
$pdf->Cell(140 , 5,'Invoice Pembelian',0,1);
$pdf->Cell(1  ,1,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(12  ,12,'',0,0);
$pdf->Cell(21 , 4,'Jl. Raya Lubuk Begalung, Kota Padang, Sumbar 25145',0,1);
$pdf->Cell(1  ,1,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(42  ,5,'',0,0);
$pdf->Cell(21 , 4,'Telp. (0751) 123123',0,1);
$pdf->Cell(1  ,1,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(30  ,5,'',0,0);
$pdf->Cell(21 , 4,'Mail: apotikbersama18@gmail.com',0,1);
$pdf->Cell(1  ,1,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(1  ,1,'',0,0);
$pdf->Cell(21 , 4,'--------------------------------------------------------------------------------------',0,1);
$pdf->Cell(1  ,1,'',0,1);

$pdf->Cell(18  ,18,'',0,1);


/*$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21  ,4,'  '.$tampilkan['client_operator'].' tertanggal '.date("d").' '.$monList[date("m")].' '.date("Y").' Perihal Permohonan Izin',0,1);*/


$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Tanggal Pemesanan   	: '.$tampilkan['tanggal_pesan'].' ',0,1);
$pdf->Cell(4  ,4,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Nomor Pemesanan	     : '.$tampilkan['id_pesanan']. ' ',0,1);
$pdf->Cell(4  ,4,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Nama Obat			                : '.$tampilkan['nama_obat']. ' ',0,1);
$pdf->Cell(4  ,4,'',0,1);


$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Harga Obat			                : '.$tampilkan['harga']. ' ',0,1);
$pdf->Cell(4  ,4,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Jumlah Beli		                 : '.$tampilkan['jumlah']. ' ',0,1);
$pdf->Cell(4  ,4,'',0,1);  

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Total Bayar			                : '.$tampilkan['total']. ' ',0,1);
$pdf->Cell(15  ,15,'',0,1); 


$pdf-> SetFont('Arial', '', 11);
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(21 , 4,'BARANG YANG DIBELI TIDAK DAPAT DITUKAR KEMBALI',0,1);
$pdf->Cell(2  ,2,'',0,1); 

$pdf-> SetFont('Arial', '', 11);
$pdf->Cell(5 ,5,'',0,0);
$pdf->Cell(21 , 4,'TERIMA KASIH SUDAH MEMBELI OBAT DI APOTIK BERSAMA ',0,1);
$pdf->Cell(4  ,4,'',0,1); 
/*$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(38  ,4,'Selanjutnya disebut ',0,0);
$pdf-> SetFont('Arial', 'ub', 12);
$pdf->Cell(21  ,4,'Mitratel ',0,1);

$pdf->Cell(3  ,3,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Nama				       : '.$tampilkan['nama_mitratel'].' ',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Jabatan			     : '.$tampilkan['jabatan_mitratel']. ' ',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Lokasi			       : '.$tampilkan['lokasi_mitratel']. ' ',0,1);
$pdf->Cell(4  ,4,'',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(38  ,4,'Selanjutnya disebut ',0,0);
$pdf-> SetFont('Arial', 'ub', 12);
$pdf->Cell(21  ,4,'Telkomsel ',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21  ,4,'Menyatakan bahwa telah dilakukan Site Survey di lokasi : ',0,1);

$pdf->Cell(3  ,3,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Nama Site / site ID Mitratel					       : '.$tampilkan['nama_site_ID_mitratel'].' ',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Nama Site / site ID Telkomsel			     : '.$tampilkan['nama_site_ID_telkomsel']. ' ',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Longitude /	Latitude                        : '.$tampilkan['longitude_latitude']. ' ',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Alamat                                            : '.$tampilkan['alamat']. ' ',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Dengan Hasil Survey berikut          : ',0,1);

$pdf->Cell(8  ,6,'',0,1);
$pdf->Cell(7  ,5,'',0,0);
$pdf->Cell(180 ,25,$tampilkan['hasil_survey'],1,0,'L',false);

$pdf->Cell(5  ,5,'',0,1);
$pdf->Cell(5  ,5,'',0,1);
$pdf->Cell(5  ,5,'',0,1);
$pdf->Cell(5  ,5,'',0,1);
$pdf->Cell(5  ,5,'',0,1);
$pdf->Cell(5  ,5,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Dokumentasi Terlampir, ',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'Demikian lah berita acara survey ini dibuat dengan benar dalam rangkap 2 (dua) asli yang sama  ',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'bunyinya dan mempunyai kekuatan hukum yang sama setelah ditanda tangan oleh kedua belah',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'pihak.',0,1);
$pdf->Cell(5  ,5,'',0,1);
$pdf->Cell(2  ,2,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0);
$pdf->Cell(21 , 4,'PT. DAYAMITRA TELEKOMUNIKASI                      PT. TELEKOMUNIKASI SELULER',0,1);
$pdf->Cell(5  ,5,'',0,1);


$pdf->Cell(25  ,25,'',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(5  ,5,'',0,0); 
$pdf->Cell(15 , 4,'(Jonnedi)                 (Jack Steven Manik)                    (Efendi)                    (Era JB. Damanik)',0,1);

$pdf-> SetFont('Arial', '', 12);
$pdf->Cell(2  ,2,'',0,0); 
$pdf->Cell(21 , 4,'SM PKU Outer             Koord. SM Ridar                 Spv. Rtpo OuterPKU      Mgr. NSA Pekanbaru',0,1);
$pdf->Cell(5  ,5,'',0,1);


$pdf-> SetFont('Arial', 'B', 14);
$pdf->Cell(55 ,5,'',0,0);
$pdf->Cell(140 , 5,'BUKTI FOTO (LAMPIRAN)',0,1);
$pdf->Cell(10  ,10,'',0,1);


$pdf->Image('foto/' . $tampilkan['gambar1'],10,40,80);

$pdf->Image('foto/' . $tampilkan['gambar2'],100,40,80);

$pdf->Image('foto/' . $tampilkan['gambar3'],10,100,80);

$pdf->Image('foto/' . $tampilkan['gambar4'],100,100,80);*/

/*$pdf->Image('logo_kecil.png',10,190);*/

$pdf->Output();
?>