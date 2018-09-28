<?php 

	include "koneksi.php";

	$page 	= $_GET['page'];

	switch ($page) {
		case 'data-karyawan':
			include "page/data_karyawan.php";
			break;
		case 'data-project':
			include "page/data_project.php";
			break;
		case 'surat-tugas':
			include "page/surat_tugas.php";
			break;
		case 'surat-karyawan':
			include "page/surat_karyawan.php";
			break;
		case 'laporan-karyawan':
			include "page/laporan_karyawan.php";
			break;
		case 'filter-surat-karyawan':
			$id 	= htmlspecialchars($_GET['id']);
			$from 	= htmlspecialchars($_POST['from']);
			$to 	= htmlspecialchars($_POST['to']);

			include "page/filter_surat_karyawan.php";
			break;
		case 'filter-laporan-karyawan':
			$id 	= htmlspecialchars($_GET['id']);
			$from 	= htmlspecialchars($_POST['from']);
			$to 	= htmlspecialchars($_POST['to']);

			include "page/filter_tugas_karyawan.php";
			break;
		// Serba Create
		case 'create-project':
			$project 	= htmlspecialchars($_POST['project']);
			$customer 	= htmlspecialchars($_POST['customer']);
			$pesan 		= htmlspecialchars($_POST['pesan']);
			$tgl_project= $_POST['tgl-project'];

			$sql 		= mysql_query("INSERT INTO tbl_project (project, customer, pesan, tgl_project) VALUES ('$project', '$customer', '$pesan', '$tgl_project')");
			if ($sql > 0) {
				echo "<script> alert('Project Berhasil dibuat !'); window.location = 'proses.php?page=data-project'; </script>";
			} else {
				echo "<script> alert('Project Gagal dibuat !'); window.location = 'proses.php?page=data-project'; </script>";
			}
			break;
		case 'create-karyawan':
			$nik 		= htmlspecialchars($_POST['nik']);
			$nama 		= htmlspecialchars($_POST['nama']);
			$no_telp 	= htmlspecialchars($_POST['no-telp']);
			$jk 		= htmlspecialchars($_POST['jk']);
			$alamat 	= htmlspecialchars($_POST['alamat']);
			$username 	= htmlspecialchars($_POST['username']);
			$password 	= htmlspecialchars(sha1($_POST['password']));

			$sql 		= mysql_query("INSERT INTO tbl_karyawan (nik, nama, no_telp, jenis_kelamin, alamat, username, password) VALUES ('$nik', '$nama', '$no_telp', '$jk', '$alamat', '$username', '$password')");
			if ($sql > 0) {
				echo "<script> alert('Karyawan Berhasil dibuat !'); window.location = 'proses.php?page=data-karyawan'; </script>";
			} else {
				echo "<script> alert('Karyawan Gagal dibuat !'); window.location = 'proses.php?page=data-karyawan'; </script>";
			}
			break;
		case 'create-laporan-karyawan':
			$nama 		= htmlspecialchars($_POST['nama']);
			$project 	= htmlspecialchars($_POST['project']);
			$jabatan 	= htmlspecialchars($_POST['jabatan']);
			$tgl_tugas 	= htmlspecialchars($_POST['tgl-tugas']);
			$tgl_kembali= htmlspecialchars($_POST['tgl-kembali']);

			$gambar_name= $_FILES['image']['name'];
			$gambar_size= $_FILES['image']['size'];
			$gambar_tmp	= $_FILES['image']['tmp_name'];
			move_uploaded_file($gambar_tmp, '../assets/direct/'.$gambar_name);

			$pesan 		= htmlspecialchars($_POST['pesan']);

			$sql 		= mysql_query("INSERT INTO tbl_laporank (nama, project, jabatan, tgl_tugas, tgl_kembali, image, pesan) VALUES ('$nama', '$project', '$jabatan' ,'$tgl_tugas', '$tgl_kembali', '$gambar_name', '$pesan')");
			if ($sql > 0) {
				echo "<script> alert('Laporan Karyawan Berhasil dibuat !'); window.location = 'proses.php?page=laporan-karyawan'; </script>";
			} else {
				echo "<script> alert('Laporan Karyawan Gagal dibuat !'); window.location = 'proses.php?page=laporan-karyawan'; </script>";
			}
			break;
		case 'create-surat-tugas':
			$nama 		= htmlspecialchars($_POST['nama']);
			$jk 		= htmlspecialchars($_POST['jk']);
			$jabatan 	= htmlspecialchars($_POST['jabatan']);
			$project 	= htmlspecialchars($_POST['project']);
			$no_surat 	= htmlspecialchars($_POST['no-surat']);
			$tgl_tugas 	= htmlspecialchars($_POST['tgl-tugas']);
			$tgl_kembali= htmlspecialchars($_POST['tgl-kembali']);
			$pesan 		= htmlspecialchars($_POST['pesan']);

			$sql 		= mysql_query("INSERT INTO tbl_surat (nama, jenis_kelamin, jabatan, project, no_surat, tgl_tugas, tgl_kembali, pesan) VALUES ('$nama', '$jk', '$jabatan', '$project', '$no_surat', '$tgl_tugas', '$tgl_kembali', '$pesan')");

			if ($sql > 0) {
				echo "<script> alert('Data berhasil disimpan !'); window.location = 'proses.php?page=surat-tugas'; </script>";
				// header("location:../surat_karyawan.php");
			} else {
				echo "<script> alert('Gagal membuat data, silahkan coba lagi !'); window.location = 'surat_tugas.php'; </script>";
			}
			break;
		case 'create-surat-karyawan':
			$nama			= htmlspecialchars($_POST['nama']);
			$jk 			= htmlspecialchars($_POST['jk']);
			$jabatan		= htmlspecialchars($_POST['jabatan']);
			$project 		= htmlspecialchars($_POST['project']);
			$no_surat		= htmlspecialchars($_POST['no-surat']);
			$tgl_tugas		= htmlspecialchars($_POST['tgl-tugas']);
			$tgl_kembali	= htmlspecialchars($_POST['tgl-kembali']);

			$gambar_name= $_FILES['image']['name'];
			$gambar_size= $_FILES['image']['size'];
			$gambar_tmp	= $_FILES['image']['tmp_name'];
			move_uploaded_file($gambar_tmp, '../assets/direct/'.$gambar_name);

			$pesan			= htmlspecialchars($_POST['pesan']);

			$sql 			= mysql_query("INSERT INTO tbl_surat (nama, jenis_kelamin, jabatan, project, no_surat, tgl_tugas, tgl_kembali, image, pesan) VALUES ('$nama', '$jk', '$jabatan', '$project', '$no_surat', '$tgl_tugas', '$tgl_kembali', '$gambar_name', '$pesan')");

			if ($sql > 0) {
				echo "<script> alert('Surat Karyawan berhasil disimpan !'); window.location = 'proses.php?page=surat-karyawan'; </script>";
				// header("location:../surat_karyawan.php");
			} else {
				// echo mysql_error();
				echo "<script> alert('Surat Karyawan Gagal disimpan !'); window.location = 'proses.php?page=surat-karyawan'; </script>";
			}
			break;
		// Serba Delete
		case 'delete-project':
			$id 		= $_GET['id'];

			$sql 		= mysql_query("DELETE FROM tbl_project WHERE id = '$id'");

			if ($sql > 0) {
				echo "<script> alert('Project Berhasil dihapus !'); window.location = 'proses.php?page=data-project'; </script>";
			} else {
				echo "<script> alert('Project Gagal dihapus !'); window.location = 'proses.php?page=data-project'; </script>";
			}
			break;
		case 'delete-karyawan':
			$id 		= $_GET['id'];

			$sql 		= mysql_query("DELETE FROM tbl_karyawan WHERE id = '$id'");

			if ($sql > 0) {
				echo "<script> alert('Karyawan Berhasil dihapus !'); window.location = 'proses.php?page=data-karyawan'; </script>";
			} else {
				echo "<script> alert('Karyawan Gagal dihapus !'); window.location = 'proses.php?page=data-karyawan'; </script>";
			}
			break;
		case 'delete-laporan-karyawan':
			$id 		= $_GET['id'];

			$sql 		= mysql_query("DELETE FROM tbl_laporank WHERE id = '$id'");

			if ($sql > 0) {
				echo "<script> alert('Laporan Karyawan Berhasil dihapus !'); window.location = 'proses.php?page=laporan-karyawan'; </script>";
			} else {
				echo "<script> alert('Laporan Karyawan Gagal dihapus !'); window.location = 'proses.php?page=laporan-karyawan'; </script>";
			}
			break;
		case 'delete-surat-karyawan':
			$id 		= $_GET['id'];

			$sql 		= mysql_query("DELETE FROM tbl_surat WHERE id = '$id'");

			if ($sql > 0) {
				echo "<script> alert('Surat Karyawan Berhasil dihapus !'); window.location = 'proses.php?page=surat-karyawan'; </script>";
			} else {
				echo "<script> alert('Surat Karyawan Gagal dihapus !'); window.location = 'proses.php?page=surat-karyawan'; </script>";
			}
			break;
		// Serba Page Update
		case 'update-project':
			$id 	= $_GET['id'];

			$sql 	= mysql_query("SELECT * FROM tbl_project WHERE id = '$id'");
			$row 	= mysql_fetch_assoc($sql);

			include "update/project.php";
			break;
		case 'update-karyawan':
			$id 	= $_GET['id'];

			$sql 	= mysql_query("SELECT * FROM tbl_karyawan WHERE id = '$id'");
			$row 	= mysql_fetch_assoc($sql);

			include "update/karyawan.php";
			break;
		case 'update-laporan-karyawan':
			$id 	= $_GET['id'];

			$sql 	= mysql_query("SELECT * FROM tbl_laporank WHERE id = '$id'");
			$row 	= mysql_fetch_assoc($sql);

			include "update/laporan_karyawan.php";
			break;
		case 'update-surat-karyawan':
			$id 	= $_GET['id'];

			$sql 	= mysql_query("SELECT * FROM tbl_surat WHERE id = '$id'");
			$row 	= mysql_fetch_assoc($sql);

			include "update/surat_karyawan.php";
			break;
		// End

		// Serba Edit Data
		case 'edit-project':
			$id 		= htmlspecialchars($_POST['id']);
			$project 	= htmlspecialchars($_POST['project']);
			$customer 	= htmlspecialchars($_POST['customer']);
			$pesan 		= htmlspecialchars($_POST['pesan']);
			$tgl_project= htmlspecialchars($_POST['tgl-project']);

			$sql 		= mysql_query("UPDATE tbl_project SET project = '$project', customer = '$customer', pesan = '$pesan', tgl_project = '$tgl_project' WHERE id = '$id'");

			if ($sql > 0) {
				echo "<script> alert('Project Berhasil diubah !'); window.location = 'proses.php?page=data-project'; </script>";
			} else {
				echo "<script> alert('Project Gagal diubah !'); window.location = 'proses.php?page=data-project'; </script>";
			}
			break;
		case 'edit-karyawan':
			$id 		= htmlspecialchars($_POST['id']);
			$nik 		= htmlspecialchars($_POST['nik']);
			$nama		= htmlspecialchars($_POST['nama']);
			$no_telp	= htmlspecialchars($_POST['no-telp']);
			$jk 		= htmlspecialchars($_POST['jk']);
			$alamat 	= htmlspecialchars($_POST['alamat']);

			$sql 		= mysql_query("UPDATE tbl_karyawan SET nik = '$nik', nama = '$nama', no_telp = '$no_telp', jenis_kelamin = '$jk', alamat = '$alamat' WHERE id = '$id'");

			if ($sql > 0) {
				echo "<script> alert('Karyawan Berhasil diubah !'); window.location = 'proses.php?page=data-karyawan'; </script>";
			} else {
				echo "<script> alert('Karyawan Gagal diubah !'); window.location = 'proses.php?page=data-karyawan'; </script>";
			}
			break;
		case 'edit-laporan-karyawan':
			$id  		= htmlspecialchars($_POST['id']);
			$nama 		= htmlspecialchars($_POST['nama']);
			$project 	= htmlspecialchars($_POST['project']);
			$jabatan 	= htmlspecialchars($_POST['jabatan']);
			$tgl_tugas 	= htmlspecialchars($_POST['tgl-tugas']);
			$tgl_kembali= htmlspecialchars($_POST['tgl-kembali']);

			$gambar_name= $_FILES['image']['name'];
			$gambar_size= $_FILES['image']['size'];
			$gambar_tmp	= $_FILES['image']['tmp_name'];
			move_uploaded_file($gambar_tmp, '../assets/direct/'.$gambar_name);

			$pesan 		= htmlspecialchars($_POST['pesan']);

			$sql 		= mysql_query("UPDATE tbl_laporank SET nama = '$nama', project = '$project', jabatan = '$jabatan' ,tgl_tugas = '$tgl_tugas', tgl_kembali = '$tgl_kembali', image = '$gambar_name', pesan = '$pesan' WHERE id = '$id' ");
			if ($sql > 0) {
				echo "<script> alert('Laporan Karyawan Berhasil diubah !'); window.location = 'proses.php?page=laporan-karyawan'; </script>";
			} else {
				echo "<script> alert('Laporan Karyawan Gagal diubah !'); window.location = 'proses.php?page=laporan-karyawan'; </script>";
			}
			break;
		case 'edit-surat-karyawan':
			$id 			= htmlspecialchars($_POST['id']);
			$nama			= htmlspecialchars($_POST['nama']);
			$jk 			= htmlspecialchars($_POST['jk']);
			$jabatan		= htmlspecialchars($_POST['jabatan']);
			$project 		= htmlspecialchars($_POST['project']);
			$no_surat		= htmlspecialchars($_POST['no-surat']);
			$tgl_tugas		= htmlspecialchars($_POST['tgl-tugas']);
			$tgl_kembali	= htmlspecialchars($_POST['tgl-kembali']);

			$gambar_name= $_FILES['image']['name'];
			$gambar_size= $_FILES['image']['size'];
			$gambar_tmp	= $_FILES['image']['tmp_name'];
			move_uploaded_file($gambar_tmp, '../assets/direct/'.$gambar_name);

			$pesan			= htmlspecialchars($_POST['pesan']);

			$sql 			= mysql_query("UPDATE tbl_surat SET nama = '$nama', jenis_kelamin = '$jk', jabatan = '$jabatan', project = '$project', no_surat = '$no_surat', tgl_tugas = '$tgl_tugas', tgl_kembali = '$tgl_kembali', image = '$gambar_name', pesan = '$pesan' WHERE id = '$id'");

			if ($sql > 0) {
				echo "<script> alert('Surat Karyawan berhasil diubah !'); window.location = 'proses.php?page=surat-karyawan'; </script>";
				// header("location:../surat_karyawan.php");
			} else {
				// echo mysql_error();
				echo "<script> alert('Surat Karyawan Gagal diubah !'); window.location = 'proses.php?page=surat-karyawan'; </script>";
			}
			break;
		// End

		// Detail
		case 'detail-laporan-karyawan':
			include "detail/laporan_karyawan.php";
			break;
		// End
		default:
			# code...
			break;
	}

?>