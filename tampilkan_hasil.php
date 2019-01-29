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
  <link rel="stylesheet" href="assets/loading2.css">
  <script src="assets/js/jquery-1.10.2.min.js"></script>
  <script src="assets/js/jquery-1.10.2.js"></script>
    
  <script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
  </script>
  <style type="text/css">
  .preloader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background-color: #fff;
}
.preloader .loading {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  font: 14px arial;
}
  </style>
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
     <span class="logo-lg"><span><img src="assets/images/logo.png" width="30"></span><b>Administrator</b>
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
              <li><a href="kata_dasar.php"><i class="fa fa-circle-o"></i> Basic Word</a></li>
              <li><a href="nama_disposisi.php"><i class="fa fa-circle-o"></i> Disposition List</a></li>
          </ul>
        </li>
        <li class="active">
          <a href="klasifikasi.php">
            <i class="fa fa-file"></i> <span>CLASSIFICATION</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
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

      <div class="alert alert-danger alert-dismissible" id="alert-error" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      </div>
      <div class="row" id="content-customer">
        <div class="col-md-12 col-xs-12" id="content-customer-body">
          <div class="box">
              <div class="box-header with-border" id="load-data">
                <h3 class="box-title">Classification Results</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
              <?php
                include ('koneksi.php');

                 $ambil_query = mysql_query("SELECT * FROM query;")  or die(mysql_error()); 
                 while($rowquery = mysql_fetch_array($ambil_query))
                 {
                    $kata = $rowquery['term'];
                    ?>

                    <div class="panel panel-default">
                      <div class="panel-heading"><b>Query Input</b></div>
                      <div class="panel-body">
                         <p><?php print($kata) ?></p>
                      </div>
                    </div>
                    <?php
                 }

                $ambilq = mysql_query("SELECT complaint.`doc_id`, complaint.`query`, disposition.`name_disposition` FROM complaint  JOIN documents ON complaint.`doc_id` = documents.`doc_id` JOIN disposition ON documents.`code_disposition` = disposition.`code_disposition` WHERE complaint.`result_cosine` != 0;")  or die(mysql_error()); 
                $n = mysql_num_rows($ambilq);

                 while($rowq = mysql_fetch_array($ambilq))
                 {
                    $nama_disposisi = $rowq['name_disposition'];
                    ?> 
                     <div class="panel panel-default">
                      <div class="panel-heading"><b>The Query Includes Dispositiont</b></div>
                      <div class="panel-body">
                         <h4><span class="label" style="background: #228B22; color: white; font-style: italic;"><?php print($nama_disposisi) ?></span></h4>
                      </div>
                     </div>
                    <?php
                 } //end while $rowbobot 

                 $ambil_waktu = mysql_query("SELECT * FROM time;")  or die(mysql_error()); 
                 while($rowwaktu = mysql_fetch_array($ambil_waktu))
                 {
                      $waktu = $rowwaktu['time_execution'];
                      ?><p style="color: #228B22"><b>Time Classification</b> = <?php echo $waktu ?> minute <br><br>
                      <?php
                 }
              ?>

                <div class="panel panel-default">
                  <div class="panel-heading"><b>Table Of Similarity values</b></div>
                <table class="table table-bordered table-hover" id="#">
                  <thead>
                  <tr>
                    <th>Similarity</th>
                    <th width="110px">Document ID</th>
                    <th>Complaint</th>
                    <th>Disposition</th>
                  </tr>
                  </thead>
                  <tbody id="list-data">
                   <?php 
                   include ('koneksi.php');
                      //pasti telah ada dalam tbcache        
                      $resCache = mysql_query("SELECT result_cosine.`result`, result_cosine.`doc_id`, documents.`complaint`, disposition.`name_disposition` FROM result_cosine JOIN documents ON result_cosine.`doc_id` = documents.`doc_id` JOIN disposition ON documents.`code_disposition` = disposition.`code_disposition` WHERE result_cosine.`result` != 0 ORDER BY result_cosine.`result` DESC LIMIT 5;") or die(mysql_error());
                      $n = mysql_num_rows($resCache);
                      if ($n != 0) 
                      {
                          while ($rowCache = mysql_fetch_array($resCache))
                          {
                               $sim = $rowCache['result'];
                               $docId = $rowCache['doc_id'];
                               $pengaduan = $rowCache['complaint'];
                               $nama_disposisi = $rowCache['name_disposition'];
                                                            
                                 ?>
                                 <tr>
                                    <td><?php print($sim) ?></td>
                                    <td><?php print($docId) ?></td>
                                    <td style="text-align: justify;"><?php print($pengaduan) ?></td>
                                    <td><?php print($nama_disposisi) ?></td>
                                 </tr>
                                 <?php 
                          } //end while
                      }else{
                        echo "<tr><td><h4><span class='label' style='background: red; color: white'>No Similar Documents</span></h4></td></tr>";
                      }
                    ?>
                  </tbody>
                </table>
                </div>
              </div>
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

<!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    
<!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

</body>
</html>


