<?php 

	session_start();
	require "admin/koneksi.php";

	$page 	= $_GET['page'];

	switch ($page) {
		case 'proses-login':
			$username 	= htmlspecialchars($_POST['username']);
			$password	= htmlspecialchars(sha1($_POST['password']));

			$sql 		= mysql_query("SELECT * FROM tbl_karyawan WHERE username = '$username' AND password = '$password'");
			$num		= mysql_num_rows($sql);
			$row 		= mysql_fetch_assoc($sql);

			if ($num > 0) {
				$_SESSION['login'] = $row['nama'];
				echo "<script> alert('Login berhasil, halaman akan diarahkan ke dashboard !'); window.location ='dashboard.php'; </script>";
			} else {
				echo "<script> alert('Username atau Password salah ! Silahkan login kembali'); window.location ='index.php'; </script>"; 
			}
			break;
		case 'proses-register':
			$nik		= htmlspecialchars($_POST['nik']);
			$nama		= htmlspecialchars($_POST['nama']);
			$telp		= htmlspecialchars($_POST['no-telp']);
			$jk			= htmlspecialchars($_POST['jk']);
			$alamat		= htmlspecialchars($_POST['alamat']);
			$username	= htmlspecialchars($_POST['username']);
			$password	= htmlspecialchars(sha1($_POST['password']));

			$sql 		= mysql_query("INSERT INTO tbl_karyawan (nik, nama, no_telp, jenis_kelamin, alamat, username, password) VALUES ('$nik', '$nama', '$telp', '$jk', '$alamat', '$username', '$password')");

			if ($sql > 0) {
				echo "<script> alert('Register berhasil ! Silahkan Login dengan menggunakan akun tersebut !'); window.location ='index.php'; </script>";
			} else {
				echo "<script> alert('Register gagal ! Silahkan coba register kembali !'); window.location ='index.php'; </script>";
			}
			break;
		case 'proses-logout':
			session_destroy();
			session_unset();
			header("location:index.php");
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
			move_uploaded_file($gambar_tmp, 'assets/direct/'.$gambar_name);

			$pesan 		= htmlspecialchars($_POST['pesan']);

			$sql 		= mysql_query("INSERT INTO tbl_laporank (nama, project, jabatan, tgl_tugas, tgl_kembali, image, pesan) VALUES ('$nama', '$project', '$jabatan' ,'$tgl_tugas', '$tgl_kembali', '$gambar_name', '$pesan')");
			if ($sql > 0) {
				echo "<script> alert('Laporan Karyawan Berhasil dibuat !'); window.location = 'laporan_karyawan.php'; </script>";
			} else {
				echo "<script> alert('Laporan Karyawan Gagal dibuat !'); window.location = 'form_laporan_karyawan.php'; </script>";
			}
			break;
		case 'proses-profile':
			$id 	= $_GET['id'];

			$sql 	= mysql_query("SELECT * FROM tbl_karyawan WHERE id = '$id'");
			$row 	= mysql_fetch_assoc($sql);
			include "profile.php";
			break;
		case 'edit-karyawan':
			$id 		= htmlspecialchars($_POST['id']);
			$nik 		= htmlspecialchars($_POST['nik']);
			$nama  		= htmlspecialchars($_POST['nama']);
			$telp 		= htmlspecialchars($_POST['no-telp']);
			$jk 		= htmlspecialchars($_POST['jk']);
			$alamat 	= htmlspecialchars($_POST['alamat']);
			// $username 	= htmlspecialchars($_POST['username']);
 		// 	$password 	= htmlspecialchars(sha1($_POST['password']));

 			$sql 		= mysql_query("UPDATE tbl_karyawan SET nik = '$nik', nama = '$nama', no_telp = '$telp', jenis_kelamin = '$jk', alamat = '$alamat' WHERE id = '$id'");
			
 			if ($sql > 0) {
				echo "<script> alert('Data karyawan berhasil diubah !'); window.location = 'dashboard.php?id=$id'; </script>";
			} else {
				echo "<script> alert('Data karyawan gagal diubah !'); window.location = 'form_laporan_karyawan.php'; </script>";
			}
			break;
		case 'change-password':
			$id 			= htmlspecialchars($_POST['id']);
			$password_lama  = htmlspecialchars(sha1($_POST['password-lama']));
			$password_baru 	= htmlspecialchars(sha1($_POST['password-baru']));

			$query 			= mysql_query("SELECT * FROM tbl_karyawan WHERE id = '$id'");
			$row 			= mysql_fetch_assoc($query);

			if ($password_lama == $row['password']) {
				$sql 	= mysql_query("UPDATE tbl_karyawan SET password = '$password_baru' WHERE id = '$id'");
				if ($sql > 0) {
					session_destroy();
					session_unset();
					echo "<script> alert('Password berhasil diubah !'); window.location = 'index.php'; </script>";
				} else {

					echo "<script> alert('Password gagal diubah !'); window.location = 'dashboard.php'; </script>";
				}
			} else {
				echo "<script> alert('Password lama tidak sesuai dengan password baru !'); window.location = 'dashboard.php?id=$id'; </script>";
			}
			break;
		case 'proses-filter':
			$id 	= htmlspecialchars($_GET['id']);
			$from 	= htmlspecialchars($_POST['from']);
			$to 	= htmlspecialchars($_POST['to']);

			include "filter.php";

			break;
		default:
			# code...
			break;
	}

?>