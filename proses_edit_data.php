<div>
<?php
//periksa apakah user telah menekan submit, dengan menggunakan parameter setingan keterangan
if (isset($_POST['submit']))
{
	include "koneksi.php";

	$id             =$_POST['id'];
	$pengaduan      =$_POST['isi_pengaduan'];
	$kode_disposisi =$_POST['kode_disposisi'];

	if($pengaduan!= null && $kode_disposisi != null)
	{
			//catat data file yang berhasil di upload
			$upload=mysql_query("UPDATE documents set complaint='$pengaduan', code_disposition='$kode_disposisi' where doc_id = '$id'");
			if($upload){
				//jika berhasil
				?>
                     <script language="JavaScript">
						alert('Data Berhasil Diperbaharui.');
						window.location=history.go(-2);
					</script>
				<?php
			}else{
				?>
                    <script language="JavaScript">
						alert('Data Gagal Diperbaharui.');
						window.location=history.go(-1);
					</script>
				<?php
			}
	}
	else{
		?>
	        <script language="JavaScript">
				alert('Data Belum Lengkap');
				window.location=history.go(-1);
			</script>
		<?php
	}
	}
?>
</div>