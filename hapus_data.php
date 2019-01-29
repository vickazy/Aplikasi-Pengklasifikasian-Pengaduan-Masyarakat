<?php
if(isset($_GET['id'])){
	 include('koneksi.php');
	 $id = $_GET['id'];
	  $cek = mysql_query("SELECT doc_id FROM documents WHERE doc_id='$id'") or die(mysql_error());
	 if(mysql_num_rows($cek) == 0){
		echo '<script>window.history.back()</script>';
	 }else{
		$del = mysql_query("DELETE FROM documents WHERE doc_id='$id'");
		echo "<script language='JavaScript'>
				alert('Delete Succesfully');
				window.location=history.go(-1);
			</script>";
	 }
}
?>