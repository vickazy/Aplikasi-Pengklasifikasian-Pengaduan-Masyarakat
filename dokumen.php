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
    <p>please wait</p>
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
              <li><a href="kata_dasar.php"><i class="fa fa-circle-o"></i> Basic Word</a></li>
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
      <div class="row">
        <div class="col-md-12">
          <a href="import_data.php" class="btn btn-primary " type="button" id="btn-add"><span class="fa fa-file-excel-o"></span>&nbsp;Import</a>&nbsp; &nbsp;
          <a href="tambah_data.php" class="btn btn-success " type="button" id="btn-add"><span class="fa fa-plus"></span>&nbsp;Add</a>&nbsp; &nbsp;
           <a href="hapus_semua_data.php" class="btn btn-danger " type="button" id="btn-add" style="float: right;"><span class="fa fa-trash"></span>&nbsp; Delete All</a>
        </div>
      </div>

      <div class="alert alert-danger alert-dismissible" id="alert-error" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      </div>
      <div class="row" id="content-customer">
        <div class="col-md-12 col-xs-12" id="content-customer-body">
          <div class="box">
              <div class="box-header with-border" id="load-data">
                <h3 class="box-title">Data Complaints</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered table-hover" id="dataTables-example">
                  <thead>
                  <tr>
                    <th width=""> ID</th>
                    <th width="500px">Complaints</th>
                    <th width="">Disposition</th>
                    <th width="100px">Action</th>
                  </tr>
                  </thead>
                  <tbody id="list-data">
                   <?php 
                      include("koneksi.php");
                      $query=mysql_query("SELECT documents.`doc_id`, documents.`complaint`, disposition.`name_disposition` FROM documents INNER JOIN disposition ON documents.`code_disposition` = disposition.`code_disposition`;") or die(mysql_error());
                      while($row=mysql_fetch_array($query))
                      {
                        $text = $row['complaint'];
                        $id   = $row['doc_id'];
                      ?>
                      <tr>
                        <td><?php echo $row['doc_id']?></td>
                        <td style="text-align: justify;"><?php echo substr($text, 0, 80); ?>...</td>
                        <td><?php echo $row['name_disposition']?></td>
                        <td>
                          <a class="btn btn-primary btn-sm edit-record" href="#myModal" data-toggle='modal' id='custId' data-id="<?php echo $row['complaint']; ?>" data-placement="top" title="DETAILS">
                              <i class="fa fa-eye"></i> 
                          </a>&nbsp; 
                          <a class="btn btn-success btn-sm" href="edit_data.php?id=<?php echo $row['doc_id']; ?>" onclick="return confirm('Edit')" data-toggle="tooltip" data-placement="top" title="UPDATE">
                              <i class="fa fa-pencil "></i> 
                          </a>&nbsp;
                          <a class="btn btn-danger btn-sm" href="hapus_data.php?id=<?php echo $row['doc_id']; ?>" onclick="return confirm('Hapus')" data-toggle="tooltip" data-placement="top" title="DELETE">
                              <i class="fa fa-trash-o "></i> 
                          </a>
                        </td>
                      </tr>
                      <?php 
                      } 
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <ul class="pagination pagination-xs no-margin pull-right">
                </ul>
              </div>
            </div>  

                <a href="proses_teks.php" class="btn btn-warning " type="button" id="btn-add"><span class="fa fa-cog"></span>&nbsp; Text Mining Process and Calculate TF-IDF</a>  
        </div>
      </div>
    </section>

    <div class="modal fade bs-example-modal-lg" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Complaint</h4>
                </div>
                <div class="modal-body" style="text-align: justify;">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
      </div>
    </div>
  </div>
  <!-- Akhir dari Konten-->

  <!-- Awal dari Footer -->
  <?php
    include ('footer.php');
  ?>

  <!-- Akhir dari Footer -->

<!-- jQuery 2.2.3 -->
<script src="assets/js/jquery.js"></script>
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
 
<!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({ "pageLength": 5 });
            });
    </script>

    <script src="assets/jquery-3.1.1.js"></script>
    <script src="assets/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
    $(function(){
            $(document).on('click','.edit-record',function(e){
                e.preventDefault();
                $("#myModal").modal('show');
                $.post('detail.php',
                    {doc_id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
  </script>

</body>
</html>

