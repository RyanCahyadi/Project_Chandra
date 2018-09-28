<?php 
	
	require ('../koneksi.php');

	$id 	= $_GET['id'];

	$sql 	= mysql_query("DELETE FROM tbl_laporan WHERE id = '$id'");

	if ($sql > 0) {
		echo "<script> alert('Data berhasil dihapus !'); window.location = '../laporan_karyawan.php'; </script>";
		// header("location:../surat_karyawan.php");
	}else {
		header("location:../laporan_karyawan.php");
	}

?>