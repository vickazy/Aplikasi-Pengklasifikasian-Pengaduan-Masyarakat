<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:index.php'); }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");

$query = mysql_query("SELECT * FROM admin WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplication of Society's Complaint Classification Bandung</title>
  <link rel="icon" type="image/png" href="assets/images/logo.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css_home/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css_home/ionic.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="assets/loading.css">
  <script src="assets/js/jquery-1.10.2.min.js"></script>
  <script src="assets/js/jquery-1.10.2.js"></script>
    
  <script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
  </script>
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="preloader">
  <div class="loading">
    <img src="assets/Poi.gif" width="80">
    <p>Please Wait</p>
  </div>
</div>
<div class="wrapper">
  
  <!-- Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Administrator</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/images/1.png" class="user-image" alt="User Image">
              <span class="hidden-xs">admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/img/1440788917_supportmale.png" class="img-circle" alt="User Image">
                <p>
                  admin
                </p>
              </li>
              <!-- Menu Body -->
            </ul>
          </li>
        </ul>
      </div>
    </nav>  
  </header>
  <!-- Akhir dari Header -->

  <!-- Awal Menu -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">DASHBOARD</li>
        <li>
          <a href="beranda.php">
            <i class="fa fa-home"></i> <span>Home</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="active">
          <a href="master_data.php">
            <i class="fa fa-folder"></i> <span>Master Data</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="klasifikasi.php">
            <i class="fa fa-file"></i> <span>Classification</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="bantuan.php">
            <i class="fa fa-question-circle"></i> <span>Help</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="logout.php">
            <i class="fa fa-power-off"></i> <span>Logout</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Akhir dari Menu -->

  <!-- Awal dari Konten-->
  <div class="content-wrapper">
    <section class="content">
      <div class="row" id="content-customer">
        <div class="col-md-8 col-xs-8" id="content-customer-body">
          <div class="box">
              <div class="box-header with-border" id="load-data">
                <h3 class="box-title">Import Data Complaint</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                   <!-- Form Input Data-->
                    <form action="import.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <input type="file" name="file" class="pull-left">
                      </div>
                      <div class="form-group">
                       <button  type="submit" class="btn btn-warning" name="import">Import</button>&nbsp;
                       <button class="btn btn-danger" value="Kembali"><a style="color: white" href="dokumen.php">Kembali</a></button>
                       </div>
                    </form>
                    <!-- Akhir Form Input Data-->
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-xs no-margin pull-right">
                 
                </ul>
              </div>
            </div>    
        </div>
      </div>
    </section>
  </div>
  <!-- Akhir dari Konten-->

  <!-- Awal dari Footer -->
   <?php
    include ('footer.php');
  ?>
  <!-- Akhir dari Footer -->

<!-- jQuery 2.2.3 -->
<script src="assets/js/jquery.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="assets/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#table-customer").DataTable();

  });
</script>

</body>
</html>

