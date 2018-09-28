<?php
include "../koneksi.php";

$id 	= $_GET['id'];

$sql 	= mysql_query("SELECT * FROM tbl_laporank WHERE id = '$id';");

$row 	= mysql_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>`
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
		<p>Alamat : Jalan Soekarno Hatta, Babakan, Bandung City, West Java, Indonesia</p>
	</header>
	<content>
		<p>
			LAPORAN TUGAS<br/>
		</p>
		<p>
			Yang bertanda tangan di bawah ini :
		</p>
		<table>
			<tr>
				<td width="20%">Nama</td>
				<td width="1%"> : </td>
				<td> <?= $row['nama']; ?> </td>
			</tr>
			<tr>
				<td width="20%">Nama project</td>
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
			Berhubungan dengan tugas yang telah diberikan kepada saya, berikut adalah hasil tugas mengenai project yang sedang dalam masa pengembangan 
		</p>
		<p>
			Demikian surat tugas ini diberikan untuk dapat dilaksanakan dengan penuh tanggung jawab dan setelah selesai mengikuti kegiatan di mohon untuk menyampaikan laporan secara tertulis.
		</p>
		<br/><br/>
	</content>
	<footer>
		<table width="100%">
			<tr>
				<td width="35%">
					Bandung, <?php echo date('d/m/Y') ?>
					<br/><br/><br/><br/><br/>
					HRD
				</td>
				<td width="30%"></td>
				<td width="35%">
					Bandung, <?php echo date('d/m/Y') ?>
					<br/><br/><br/><br/><br/>
					<?= $row['jabatan']; ?>
				</td>
			</tr>
		</table>
	</footer>
</body>
</html>