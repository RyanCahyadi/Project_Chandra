<?php 

	require "../koneksi.php";

	$nama 		= $_POST['nama'];
	$jk 		= $_POST['jk'];
	$jabatan 	= $_POST['jabatan'];
	$project 	= $_POST['project'];
	$no_surat 	= $_POST['no-surat'];
	$tgl_tugas 	= $_POST['tgl-tugas'];
	$tgl_kembali= $_POST['tgl-kembali'];
	$pesan 		= $_POST['pesan'];

	$sql 		= mysql_query("INSERT INTO tbl_surat (nama, jenis_kelamin, jabatan, project, no_surat, tgl_tugas, tgl_kembali, pesan) VALUES ('$nama', '$jk', '$jabatan', '$project', '$no_surat', '$tgl_tugas', '$tgl_kembali', '$pesan')");

	if ($sql > 0) {
		echo "<script> alert('Data berhasil disimpan !'); window.location = '../surat_karyawan.php'; </script>";
		// header("location:../surat_karyawan.php");
	} else {
		echo "<script> alert('Gagal membuat data, silahkan coba lagi !'); window.location = 'surat_tugas.php'; </script>";
	}


?>