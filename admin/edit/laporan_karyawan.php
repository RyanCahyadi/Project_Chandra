<?php 

	require "../koneksi.php";

	$id		= $_GET['id'];

	$sql 	= mysql_query("SELECT * FROM tbl_laporan WHERE id = '$id'");
	$row 	= mysql_fetch_assoc($sql);

?>


<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/dashboard.css">
	</head>
	<body>
		

		<!-- Header -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
      		<div class="cntainer-fluid">
        		<div class="navbar-header">
          			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
          			</button>
          			<a class="navbar-brand" href="#">Project name</a>
        		</div>
        		<div id="navbar" class="navbar-collapse collapse">
          			<ul class="nav navbar-nav navbar-right">
			            <li>
			            	<a href="" data-toggle="dropdown" style="margin-right: 15px;">
			            		<span class="glyphicon glyphicon-user"></span>
			            		<span class="caret"></span>
			            	</a>
			            	<ul class="dropdown-menu" style="padding: 5px;">
			            		<li><a href="profile.php">Profile</a></li>
			            		<li><a href="logout.php">Logout</a></li>
			            	</ul>	
			            </li>
          			</ul>
        		</div>
      		</div>
      	</nav>
      	<!-- End -->

      	<!-- Sidebar -->
      	<div class="container-fluid">
			<div class="row">
		    	<div class="col-sm-3 col-md-2 sidebar">
		      		<ul class="nav nav-sidebar">
		      			<li><a href="../dashboard.php">Dashboard</a></li>
				        <li><a href="../surat_tugas.php">Form Surat Tugas</a></li>
				        <!-- <li><a href="../laporan_tugas.php">Form Laporan Tugas</a></li> -->
				        <li><a href="../surat_karyawan.php">Laporan Surat Karyawan</a></li>
				        <li><a href="../laporan_karyawan.php">Laporan Tugas Karyawan</a></li>
		      		</ul>
		    	</div>
		    	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		    		<h2>Edit Laporan Karyawan</h2><hr>
		    		<form action="proses.php?page=laporan-karyawan" method="POST">
		    			<input type="hidden" name="id" value="<?= $row['id']; ?>">
						<div class="form-group">
							<input type="text" name="nama" placeholder="Masukan Nama Anda . . ." class="form-control" value="<?php echo $row['nama']; ?>">
						</div>
						<div class="form-group">
							<input type="text" name="project" class="form-control" value="<?= $row['project']; ?>">
						</div>
						<div class="form-group">
							<strong>Tanggal Tugas</strong>
							<input type="date" name="tgl-tugas" class="form-control" value="<?= $row['tgl_tugas']; ?>">
						</div>
						<div class="form-group">
							<strong>Tanggal Kembali</strong>
							<input type="date" name="tgl-kembali" class="form-control" value="<?php echo $row['tgl_kembali']; ?>">
						</div>
						<div class="form-group">
							<textarea name="pesan" class="form-control" rows="10" placeholder="Masukan Pesan anda . . ."><?php echo $row['pesan']; ?></textarea>
						</div>
						<div class="form-group">
							<button type="submit" name="btn-save" class="btn btn-primary">Simpan</button>
							<button type="reset" class="btn btn-danger">Batal</button>
						</div>
					</form>
		    	</div>
		    </div>
		</div>
		<!-- End -->

		<!-- Footer -->
      	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
      	<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
    </body>
</html>
      	<!-- End -->