<?php
include 'koneksi.php';
// PROSES PERHITUNGAN DOT PRODUCT UNTUK D KE N
    mysql_query("TRUNCATE complaint");
    $resn = mysql_query("SELECT term FROM query")  or die(mysql_error()); 
    while($hasil = mysql_fetch_array($resn))
    {
        $kata = $hasil['term'];
        $resBobot = mysql_query("SELECT result_cosine.`doc_id`, result_cosine.`result` FROM result_cosine ORDER BY result_cosine.`result` DESC LIMIT 1")  or die(mysql_error()); 
        while($rowbobot = mysql_fetch_array($resBobot))
        {
            $id_dok = $rowbobot['doc_id'];
            $hasil  = $rowbobot['result'];
            $masukkanhasil = mysql_query("INSERT INTO complaint (query, doc_id, result_cosine) VALUES ('$kata', '$id_dok', '$hasil')") or die(mysql_error());         
        } //end while $rowbobot 
    }
// PROSES AKHIR PERHITUNGAN DOT PRODUCT UNTUK D KE N
?>