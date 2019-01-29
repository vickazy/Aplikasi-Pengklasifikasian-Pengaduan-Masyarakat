<?php
session_start();
unset($_SESSION['username']);
echo "<script> document.location.href='index.php'; </script>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
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
    <p>Harap Tunggu</p>
  </div>
</div>
</body>
</html>