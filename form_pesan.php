<?php
session_start();

// KONEKSI DATABASE
$servername="localhost";
$user="root";
$pass="";
$db="apotik";

$connection= mysqli_connect($servername, $user, $pass, $db);

if(!$connection){
  die ("Connection failed: ".mysqli_connect_error());
}

// TAMPILKAN DATA obat DAN HARGA
$obat=mysqli_query($connection, "SELECT * FROM obat");
$jsArray = "var harga_obat = new Array();\n"; 

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Apotik Bersama</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<?php
  // Load file koneksi.php
  include "koneksi.php";
  
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $NO = $_GET['id_pesanan'];
  
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
   $query = "SELECT * FROM pesanan where id='$_SESSION[id]'"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); 
  ?>

  <?php
  include "koneksi.php";
  // mengambil data barang dengan kode paling besar
  $query = mysqli_query($connect, "SELECT max(id_pesanan) as kodeTerbesar FROM pesanan");
  $data = mysqli_fetch_array($query);
  $kodePesanan = $data['kodeTerbesar'];
 
  // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
  // dan diubah ke integer dengan (int)
  $urutan = (int) substr($kodePesanan, 3, 3);
 
  // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
  $urutan++;
 
  // membentuk kode barang baru
  // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
  // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
  // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
  $huruf = "AB";
  $kodePesanan = $huruf . sprintf("%03s", $urutan);
  ?>


<?php
  // Load file koneksi.php
  include "koneksi.php";
  
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $NO = $_GET['id_pesanan'];
  
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
   $query = "SELECT * FROM pesanan where id='$_SESSION[id]'"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); 
  ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Apotik Bersama</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Apotik Bersama</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Apotik Bersama</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <section class="content-header"><b>Hai, <?php echo $_SESSION['id']; ?></b></section>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
       <li><a href="index.html"> <span>Beranda</span></a></li>
        <li><a href="obat_pelanggan.php"> <span>Daftar Obat</span></a></li>
        <li><a href="pesanan_pelanggan.php"> <span>Daftar Pesanan</span></a></li>
        <li><a href="login.php"> <span>Keluar</span></a></li>
        
        
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pemesanan Obat
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
         
      </div>
      <!-- /.row -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Silahkan lakukan pemesanan obat : </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="simpan_pesanan.php" enctype="multipart/form-data" role="form">
              <div class="box-body"> 
              <div class="form-group">
                  <input type="hidden" class="form-control" placeholder="ID Pelanggan" name="id" value="<?php echo $data['id']; ?>"/>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" required="required" placeholder="ID Pesanan" name="id_pesanan" value="<?php echo $kodePesanan ?>" readonly />
                </div>

                  <div class="form-group">
                  <input type="text" class="form-control" placeholder="Tanggal Pesanan" name="tanggal_pesan" value="<?php echo date('l, d-m-Y'); ?>" readonly/>
                </div>

                <div class="form-group">
                <select class="form-control select2" placeholder="Jenis Obat" style="width: 100%;" name="nama_obat" onchange="changeValue(this.value)">
                <option>- Pilih -</option>
                <?php if(mysqli_num_rows($obat)) {?>
                    <?php while($row_brg= mysqli_fetch_array($obat)) {?>
                        <option value="<?php echo $row_brg["nama_obat"]?>"> <?php echo $row_brg["nama_obat"]?> </option>
                    <?php $jsArray .= "harga_obat['" . $row_brg['nama_obat'] . "'] = {harga:'" . addslashes($row_brg['harga']) . "'};\n"; } ?>
                <?php } ?>
            </select>
                </div>

                <!-- <div class="form-group">
                <input type="text" class="form-control" placeholder="Kode Obat" name="id_obat"  readonly="readonly">
                </div> -->

                <div class="form-group">
                <input type="text" class="form-control" placeholder="Harga Obat" name="harga" id="harga" onkeyup="sum();" readonly="readonly">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Jumlah Beli" name="jumlah" id="txt2" onkeyup="sum();"/>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Total" name="total" id="txt3" readonly="readonly"/>
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="hak_akses" value="pelanggan"/>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" value="Simpan">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
          </div>
          <!-- /.box -->
        </section>
        <!-- /.Left col -->
        

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

 
<!-- ./wrapper -->

<!-- script total -->
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('harga').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
}
</script>


<script type="text/javascript">
    <?php echo $jsArray; ?>
    function changeValue(id_obat) {
      document.getElementById("harga").value = harga_obat[id_obat].harga;
    };
    </script> <!-- Tampilkan Harga berdasarkan kode barang -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
