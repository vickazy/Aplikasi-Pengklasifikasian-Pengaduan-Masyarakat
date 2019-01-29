<?php
// PROSES PERHITUNGAN HASIL DOT PRODUCT
include 'koneksi.php';
mysql_query("TRUNCATE result_dot_product");
$resn = mysql_query("SELECT doc_id FROM documents ORDER BY doc_id ASC;")  or die(mysql_error()); 
while($hasil = mysql_fetch_array($resn))
{
    $id_dok = $hasil['doc_id'];

    $resBobot = mysql_query("SELECT SUM(dot_product) AS jumlah FROM tbdot_product WHERE doc_id = '$id_dok'")  or die(mysql_error()); 
    while($rowbobot = mysql_fetch_array($resBobot))
    {
      $jumlah = $rowbobot['jumlah'];
      $bulatkan = round($jumlah, 4);
      //masukkan nilai akhir dari perhitungan Dot Product untuk setiap dokumen
      $masukkanhasil2 = mysql_query("INSERT INTO result_dot_product ( doc_id, result_dot_product) VALUES ('$id_dok', '$jumlah')") or die(mysql_error());            
    } //end while $rowbobot 
    echo "<br>";
}
?>