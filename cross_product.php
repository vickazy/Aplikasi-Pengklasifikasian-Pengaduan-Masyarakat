<?php
// PROSES PERHITUNGAN DOT PRODUCT
include 'koneksi.php';
mysql_query("TRUNCATE tbdot_product");
$resn = mysql_query("SELECT doc_id FROM documents ORDER BY doc_id ASC;")  or die(mysql_error()); 
while($hasil = mysql_fetch_array($resn))
{
    $id_dok = $hasil['doc_id'];

   //hitung bobot untuk setiap Term dalam setiap DocId
   $resBobot = mysql_query("SELECT Id, Term, Weight FROM q_index ORDER BY Id")  or die(mysql_error()); 
   $n = mysql_num_rows($resBobot);
   while($rowbobot = mysql_fetch_array($resBobot))
   {   
        $id    = $rowbobot['Id'];
        $term  = $rowbobot['Term'];
        $bobot = $rowbobot['Weight']; // Bobot Query
        //berapa jumlah dokumen yang mengandung term tersebut?, N
        $resNTerm = mysql_query("SELECT Weight FROM tbindex  WHERE Term = '$term' AND DocId = $id_dok")  or die(mysql_error()); 
        $rowNTerm = mysql_fetch_array($resNTerm);
        $bobot_2  = $rowNTerm['Weight']; // Bobot Dokumen
       
        //hitung Dot Product
        $dot_product = $bobot*$bobot_2; // hitung perkalian antara Bobot Query dan Bobot Data Training
        $bulatkan = round($dot_product, 4);

        //update bobot dari term tersebut
        $masukkanhasil = mysql_query("INSERT INTO tbdot_product (doc_id, term, dot_product) VALUES ('$id_dok','$term', '$bulatkan')") or die(mysql_error());            
    } //end while $rowbobot 
}
// PROSES AKHIR PERHITUNGAN DOT PRODUCT
?>