<?php 
	require "../koneksi.php";

	$page 	= $_GET['page'];

	switch ($page) {
		case 'surat-tugas':
			$id 		= $_POST['id'];
			$nama 		= $_POST['nama'];
			$jk 		= $_POST['jk'];
			$jabatan 	= $_POST['jabatan'];
			$project 	= $_POST['project'];
			$no_surat 	= $_POST['no-surat'];
			$tgl_tugas 	= $_POST['tgl-tugas'];
			$tgl_kembali= $_POST['tgl-kembali'];
			$pesan 		= $_POST['pesan'];

			$sql 		= mysql_query("UPDATE tbl_surat SET nama = '$nama', jenis_kelamin = '$jk', jabatan = '$jabatan', project = '$project', no_surat = '$no_surat', tgl_tugas = '$tgl_tugas', tgl_kembali = '$tgl_kembali', pesan = '$pesan' WHERE id = '$id'");

			if ($sql > 0) {
				echo "<script> alert('Data berhasil diedit !'); window.location = '../surat_karyawan.php'; </script>";
			} else {
				echo "<script> alert('Data gagal diedit !'); window.location = 'surat_tugas.php'; </script>";
			}
			break;
		case 'laporan-karyawan':
			$id 		= $_POST['id'];
			$nama 		= $_POST['nama'];
			$project 	= $_POST['project'];
			$tgl_tugas 	= $_POST['tgl-tugas'];
			$tgl_kembali= $_POST['tgl-kembali'];
			$pesan 		= $_POST['pesan'];

			$sql 		= mysql_query("UPDATE tbl_laporan SET nama = '$nama', project = '$project', tgl_tugas = '$tgl_tugas', tgl_kembali = '$tgl_kembali', pesan = '$pesan' WHERE id = '$id'");
			break;
		default:
			# code...
			break;
	}
?>