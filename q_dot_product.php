<?php
// PROSES PERHITUNGAN QUERY CROSS PRODUCT
mysql_query("TRUNCATE q_cross_product");
include 'koneksi.php';
$resBobot = mysql_query("SELECT  Term, Weight FROM q_index ORDER BY Id")  or die(mysql_error()); 
$n = mysql_num_rows($resBobot);
while($rowbobot = mysql_fetch_array($resBobot))
{
   $term = $rowbobot['Term'];

   $resNTerm = mysql_query("SELECT Weight FROM q_index WHERE Term = '$term'")  or die(mysql_error()); 
   $rowNTerm = mysql_fetch_array($resNTerm);
   $bobot = $rowNTerm['Weight']; // Bobot Dokumen
   //pemangkatan  
   $pangkat = $bobot*$bobot; // pemangkatan query cross product
   $bulatkan = round($pangkat, 4);

   $masukkanhasi4 = mysql_query("INSERT INTO q_cross_product (term, result) VALUES ('$term', '$bulatkan')") or die(mysql_error());      
 }
// PROSES AKHIR PERHITUNGAN QUERY CROSS PRODUCT
?>