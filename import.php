<?php

// Load file koneksi.php
include "koneksi2.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';

	// Cek apakah terdapat file data.xlsx pada folder tmp
	if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
		unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
	
	$tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
	$tmp_file = $_FILES['file']['tmp_name'];
	
	// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
	if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
		// Upload file yang dipilih ke folder tmp
		// dan rename file tersebut menjadi data{ip_address}.xlsx
		// {ip_address} diganti jadi ip address user yang ada di variabel $ip
		// Contoh nama file setelah di rename : data127.0.0.1.xlsx
		move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);
	}
	
	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';
	
	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	
	// Buat query Insert
	$sql = $pdo->prepare("INSERT INTO documents VALUES(:doc_id, :complaint, :code_disposition)");
	
	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$id_dok = $row['A']; // Ambil data pengaduan
		$pengaduan = $row['B']; // Ambil data pengaduan
		$kode_disposisi = $row['C']; // Ambil kode
		
		// Cek jika semua data tidak diisi
		if(empty($id_dok) && empty($pengaduan) && empty($kode_disposisi))
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
		
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Proses simpan ke Database
			$sql->bindParam(':doc_id', $id_dok);
			$sql->bindParam(':complaint', $pengaduan);
			$sql->bindParam(':code_disposition', $kode_disposisi);
			$sql->execute(); // Eksekusi query insert
		}
		
		$numrow++; // Tambah 1 setiap kali looping
	}
}

header('location: dokumen.php'); // Redirect ke halaman awal
?>
