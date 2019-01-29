<?php
include 'koneksi.php';
mysql_query("TRUNCATE result_cosine");
$resn = mysql_query("SELECT doc_id, result_dot_product FROM result_dot_product")  or die(mysql_error()); 
while($hasil = mysql_fetch_array($resn))
{
  $id_dok = $hasil['doc_id'];
  $hasil  = $hasil['result_dot_product'];

   $resBobot = mysql_query("SELECT result_sqrt FROM sqrt_cross_product WHERE doc_id = $id_dok")  or die(mysql_error()); 
   while($rowbobot = mysql_fetch_array($resBobot))
   {
	    $jumlah    = $rowbobot['result_sqrt']; // jumlah dot produk Dokumen ke n
	    @$bagikan  = $hasil/$jumlah; //cosine similarity
      $bulatakan = round($bagikan,4);
      $masukkanhasil2 = mysql_query("INSERT INTO result_cosine ( doc_id, result) VALUES ('$id_dok', '$bulatakan')") or die(mysql_error());            
   } //end while $rowbobot 
}
?>
