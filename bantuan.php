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
  <title>Application of Bandung City Citizens’ Complaint Classification</title>
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
  <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
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
    <p><center>please wait</center></p>
  </div>
</div>
<div class="wrapper">
  
  <!-- Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><span><img src="assets/images/logo.png" width="30"></span><b> Administrator</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle">
              <span class="logo-lg" style="font-style: italic;"><b>APPLICATION OF BANDUNG CITY CITIZENS’ COMPLAINT CLASSIFICATION</b></span>
            </a>
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
            <i class="fa fa-home"></i> <span>HOME</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i>
              <span>MASTER DATA</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="dokumen.php"><i class="fa fa-circle-o"></i> Data Training</a></li>
              <li><a href="case_folding.php"><i class="fa fa-circle-o"></i> Case Folding</a></li>
              <li><a href="token.php"><i class="fa fa-circle-o"></i> Token</a></li>
              <li><a href="nilai_index.php"><i class="fa fa-circle-o"></i> Weight Value</a></li>
              <li><a href="kata_dasar.php"><i class="fa fa-circle-o"></i> Kata Dasar</a></li>
              <li><a href="nama_disposisi.php"><i class="fa fa-circle-o"></i> Disposition List</a></li>
          </ul>
        </li>
        <li>
          <a href="klasifikasi.php">
            <i class="fa fa-file"></i> <span>CLASSIFICATION</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="active">
          <a href="bantuan.php">
            <i class="fa fa-question-circle"></i> <span>HELP</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="logout.php">
            <i class="fa fa-power-off"></i> <span>LOGOUT</span>
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
	  <div class="col-md-12 col-xs-12" id="content-customer-body">
      <div class="row" id="content-customer">
          <div class="col-md-6 col-xs-6" id="content-customer-body">
      	    <div style="background-color: white">
      	        <div class="box-header" id="load-data" style="text-align: center;" >
                  <img src="assets/images/data training.png" alt="data training" class="img-circle">
      	          <h4>How to Add Training Data and Text Mining Process</h4>
      	        </div>
      	        <!-- /.box-header -->
      	        <div class="box-header" id="load-data">
                  <p>- Click Menu <b>Master Data</b></p>
                  <p>- Choose <b>Data Training</b></p>
                  <p>- Select Input Option with <b>Import Data</b> or <b>Add Data</b></p>
                  <p>- After Entering Training Data can be edited or removed as needed</p>
                  <p>- After that Click Button <b>Text Mining Process & Calculate TF-IDF</b></p>
                  <p>- Done</p>
                </div>
      	        <!-- /.box-body -->
      	        <div class="box-footer clearfix">
      	        </div>
      	    </div> 
          </div>

          <div class="col-md-6 col-xs-6" id="content-customer-body">
             <div style="background-color: white">
                <div class="box-header" id="load-data" style="text-align: center;" >
                  <img src="assets/images/klasifikasi.png" alt="data training" class="img-circle">
                  <h4>How to Classify Public Complaint Data</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-header" id="load-data">
                  <p>- Click Menu <b>Classification</b></p>
                  <p>- Add Complaint Data In Column <b>Complaint Content</b></p>
                  <p>- Then Click <b>Process</b></p>
                  <p>- Wait for the process to finish, so that will appear the result of disposition decision</p>
                  <p>- Done</p>                 
                  <p>&nbsp</b></p>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                </div>
            </div>  
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

