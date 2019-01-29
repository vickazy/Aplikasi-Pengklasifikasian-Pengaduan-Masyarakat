<?php
include 'koneksi.php';
mysql_query("TRUNCATE sqrt_cross_product");
$resn = mysql_query("SELECT doc_id, result FROM sum_cross_product")  or die(mysql_error()); 
while($hasil = mysql_fetch_array($resn))
{
    $id_dok = $hasil['doc_id'];
    $hasil  = $hasil['result'];

    $resBobot = mysql_query("SELECT result FROM sum_q_cross_product")  or die(mysql_error()); 
    while($rowbobot = mysql_fetch_array($resBobot))
    {
        $jumlah  = $rowbobot['result']; // jumlah dot produk Dokumen ke n
        $kalikan = $hasil * $jumlah;
        $akar    = sqrt($kalikan);
        $hasi_akar = round($akar, 4);

        $masukkanhasil2 = mysql_query("INSERT INTO sqrt_cross_product ( doc_id, result_product, result_sqrt) VALUES ('$id_dok', '$kalikan','$hasi_akar')") or die(mysql_error());            
    } //end while $rowbobot 
}
?>