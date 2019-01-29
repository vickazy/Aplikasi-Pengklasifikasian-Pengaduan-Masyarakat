<?php
	include 'koneksi.php';
	$hapus  = mysql_query("TRUNCATE documents");
	if($hapus) {
		?>
             <script language="JavaScript">
				alert('Delete Successfully');
				window.location=history.go(-1);
			</script>
		<?php
	} else {
		?>
             <script language="JavaScript">
				alert('Delete Failed');
				window.location=history.go(-1);
			</script>
		<?php
	}
?>