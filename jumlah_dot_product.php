<?php
// PROSES PERHITUNGAN HASIL JUMLAH DOT PRODUCT
include 'koneksi.php';
mysql_query("TRUNCATE sum_cross_product");
$resn = mysql_query("SELECT DISTINCT doc_id FROM cross_product")  or die(mysql_error()); 
while($hasil = mysql_fetch_array($resn))
{
    $id_dok = $hasil['doc_id'];

    $resBobot = mysql_query("SELECT SUM(result) AS jumlah FROM cross_product WHERE doc_id= '$id_dok'")  or die(mysql_error()); 
    while($rowbobot = mysql_fetch_array($resBobot))
    {
        $jumlah = $rowbobot['jumlah']; // jumlah cross produk Dokumen ke n
        $bulatkan = round($jumlah, 4);
        $masukkanhasil2 = mysql_query("INSERT INTO sum_cross_product ( doc_id, result) VALUES ('$id_dok', '$bulatkan')") or die(mysql_error());            
    } //end while $rowbobot 
}
// PROSES PERHITUNGAN HASIL AKHIR JUMLAH DOT PRODUCT
?>