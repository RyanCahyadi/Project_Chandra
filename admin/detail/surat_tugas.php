<?php 
	require "../koneksi.php";

	$id 	= $_GET['id'];

	$sql 	= mysql_query("SELECT * FROM tbl_surat WHERE id = '$id'");
	$row 	= mysql_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan - Surat Tugas</title>
	<style type="text/css">
		header {
			text-align: center;
			border-bottom: solid 2px black;
		}
		footer table {
			text-align: center;
		}
		body {
			width: 720px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<header>
		<p>PT. WALDEN GLOBAL SERVICES</p>
		<p>Jalan Soekarno Hatta, Babakan, Bandung City, West Java, Indonesia</p>
	</header>
	<content>
		<p>
			SURAT TUGAS<br/>
			Nomor : <?= $row['no_surat']; ?>
		</p>
		<p>
			Yang bertanda tangan di bawah ini, CEO PT Walden Global Service memberikan tugas kepada :
		</p>
		<table>
			<tr>
				<td width="20%">Nama</td>
				<td width="1%"> : </td>
				<td> <?= $row['nama']; ?> </td>
			</tr>
			<tr>
				<td width="20%">Jenis kelamin</td>
				<td width="1%"> : </td>
				<td> <?= $row['jenis_kelamin']; ?> </td>
			</tr>
			<tr>
				<td width="20%">Jabatan</td>
				<td width="1%"> : </td>
				<td> <?= $row['jabatan']; ?> </td>
			</tr>
			<tr>
				<td width="20%">Project</td>
				<td width="1%"> : </td>
				<td> <?= $row['project']; ?> </td>
			</tr>
			<tr>
				<td width="20%">Tanggal tugas</td>
				<td width="1%"> : </td>
				<td> <?= $row['tgl_tugas']; ?> </td>
			</tr>
			<tr>
				<td width="20%">Tanggal kembali</td>
				<td width="1%"> : </td>
				<td> <?= $row['tgl_kembali']; ?> </td>
			</tr>
			<tr>
				<td width="20%">Pesan</td>
				<td width="1%"> : </td>
				<td> <?= $row['pesan']; ?> </td>
			</tr>
		</table>
		<p>
			Untuk bertemu dengan klien dan membahas tentang project yang sedang dalam masa pengembangan, adapun yang akan di bahas dalam pertemuan ini diantaranya :
			<br>
			1. Fitur apa yang sedang dikerjakan saat ini?
			<br>
			2. Bagaimana progress saat ini?
			<br>
			3. Kapan target progress tersebut selesai?
			<br>
		</p>
		<p>
			Diharapkan saudara/i mempersiapkan keperluan tugas tersebut dengan sebaik-baiknya 
		</p>
		<p>
			Demikian surat tugas ini diberikan untuk dapat dilaksanakan dengan penuh tanggung jawab dan jika telah selesai melaksanakan tugas tersebut di mohon untuk menyampaikan laporan secara tertulis.
		</p>
		<br/><br/>
	</content>
	<footer>
		<table width="100%">
			<tr>
				<td width="35%">
					<?= date('d/m/Y'); ?>
					<br/><br/><br/><br/><br/>
					HRD
				</td>
				<td width="30%"></td>
				<td width="35%">
					<?= date('d/m/Y'); ?>
					<br/><br/><br/><br/><br/>
					<?= $row['jabatan']; ?>
				</td>
			</tr>
		</table>
	</footer>
</body>
</html>