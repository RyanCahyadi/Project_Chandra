<?php 

	require "../koneksi.php";

	$nama 		= $_POST['nama'];
	$project 	= $_POST['project'];
	$tgl_tugas 	= $_POST['tgl-tugas'];
	$tgl_kembali= $_POST['tgl-kembali'];
	$pesan 		= $_POST['pesan'];

	$sql 		= mysql_query("INSERT INTO tbl_laporan (nama, project, tgl_tugas, tgl_kembali, pesan) VALUES ('$nama', '$project', '$tgl_tugas', '$tgl_kembali', '$pesan')");

	// if ($sql > 0) {
	// 	echo "<script> alert('Data berhasil disimpan !'); window.location = '../laporan_tugas.php'; </script>";
	// 	// header("location:../surat_karyawan.php");
	// } else {
	// 	echo "<script> alert('Gagal membuat data, silahkan coba lagi !'); window.location = 'laporan_tugas.php'; </script>";
	// }


?>