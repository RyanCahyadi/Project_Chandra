<?php 
	
	require ('../koneksi.php');

	$id 	= $_GET['id'];

	$sql 	= mysql_query("DELETE FROM tbl_surat WHERE id = '$id'");

	if ($sql > 0) {
		echo "<script> alert('Data berhasil dihapus !'); window.location = '../surat_karyawan.php'; </script>";
		// header("location:../surat_karyawan.php");
	}else {
		header("location:../surat_karyawan.php");
	}

?>