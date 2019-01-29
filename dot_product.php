<?php
include 'koneksi.php';
// PROSES PERHITUNGAN CROSS PRODUCT UNTUK D KE N
mysql_query("TRUNCATE cross_product");
$resn = mysql_query("SELECT doc_id FROM documents ORDER BY doc_id ASC;")  or die(mysql_error()); 
while($hasil = mysql_fetch_array($resn))
{
  $dok_id = $hasil['doc_id'];

  $resBobot = mysql_query("SELECT DocId, Weight FROM tbindex WHERE DocId = '$dok_id'")  or die(mysql_error()); 
  while($rowbobot = mysql_fetch_array($resBobot))
  {
      $Bobot = $rowbobot['Weight'];
      //pemangkatan
      $Pangkat = $Bobot*$Bobot; // pemangkatan nilai tf-idf dari data training
      $bulatkan = round($Pangkat, 4);
      $masukkanhasil3 = mysql_query("INSERT INTO cross_product ( doc_id, result) VALUES ('$dok_id', '$bulatkan')") or die(mysql_error());            
  } //end while $rowbobot 
}
// PROSES AKHIR PERHITUNGAN CROSS PRODUCT UNTUK D KE N
?>