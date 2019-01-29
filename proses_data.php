<?php
//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan keterangan
if (isset($_POST['submit'])) //pengecekan submit
{
	include "koneksi.php";

	$isi_pengaduan = $_POST['isi_pengaduan'];
	$kode_disposisi= $_POST['kode_disposisi'];

	// PROSES PENAMBAHAN DATA KE DATABASE
	$upload=mysql_query("INSERT INTO documents VALUES('','$isi_pengaduan','$kode_disposisi')");	

} // tag pengecekan submit
if($upload){
	//jika berhasil
	?>
         <script language="JavaScript">
			alert('Successfully');
			document.location='dokumen.php';
		</script>
	<?php
}else{
	?>
        <script language="JavaScript">
			alert('Failed');
			document.location='tambah_data.php';
		</script>
	<?php
}
?>