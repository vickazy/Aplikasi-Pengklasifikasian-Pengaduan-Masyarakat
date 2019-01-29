<?php
include 'koneksi.php';
   mysql_query("TRUNCATE sum_q_cross_product");
   $resBobot = mysql_query("SELECT SUM(result) AS jumlah FROM q_cross_product")  or die(mysql_error()); 
   while($rowbobot = mysql_fetch_array($resBobot))
   {
      $jumlah = $rowbobot['jumlah']; // jumlah dot produk Dokumen ke n
      $bulatkan = round($jumlah, 4);
      $masukkanhasil2 = mysql_query("INSERT INTO sum_q_cross_product (result) VALUES ( '$bulatkan')") or die(mysql_error());
   } //end while $rowbobot 
?>