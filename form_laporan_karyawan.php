<?php 
	
	session_start();
	require "admin/koneksi.php";

	if ($_SESSION['login'] === NULL) {
		header("location:index.php");
	}

	$sess = $_SESSION['login'];

	$sql 	= mysql_query("SELECT * FROM tbl_karyawan WHERE nama = '$sess'");
	$row 	= mysql_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Page Karyawan - Laporan Karyawan</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
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
          			<a class="navbar-brand" href="#">WGS</a>
        		</div>
        		<div id="navbar" class="navbar-collapse collapse">
          			<ul class="nav navbar-nav navbar-right">
			            <li>
			            	<a href="" data-toggle="dropdown" style="margin-right: 15px;">
			            		<span class="glyphicon glyphicon-user"></span>
			            		<span class="caret"></span>
			            	</a>
			            	<ul class="dropdown-menu" style="padding: 5px;">
			            		<li><a href="proses.php?page=proses-profile&&id=<?= $row['id']; ?>">Profile</a></li>
			            		<li><a href="proses.php?page=proses-logout">Logout</a></li>
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
		      			<li><a href="dashboard.php">Dashboard</a></li>
				        <li class="active"><a href="form_laporan_karyawan.php">Form Laporan Karyawan</a></li>
				        <li><a href="laporan_karyawan.php">Laporan Tugas Karyawan</a></li>
		      		</ul>
		    	</div>
		    	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="width: 60%;">
				    <h3>Form Tugas Karyawan</h3><hr>
					<form action="proses.php?page=create-laporan-karyawan" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<select name="nama" class="form-control" required>
                            	<option>--Pilih Nama Karyawan--</option>
                                <?php 
                                	$sql_karyawan = mysql_query("SELECT * FROM tbl_karyawan WHERE nama = '$sess'");
                                    while ($row_karyawan = mysql_fetch_array($sql_karyawan)) {
                                ?>
                                <option value="<?= $row_karyawan['nama']; ?>"><?= $row_karyawan['nama']; ?></option>
                                <?php } ?>
                            </select>	
						</div>
						<div class="form-group">
							<select name="project" class="form-control" required="required">
                                <option>--Pilih Project--</option>
                                <?php 
                                    $sql_project = mysql_query("SELECT * FROM tbl_project");
                                    while ($row_project = mysql_fetch_array($sql_project)) {
                                ?>
                                <option value="<?= $row_project['project']; ?>"><?= $row_project['project']; ?></option>
                                <?php } ?> 
                            </select> 
						</div>
						<div class="form-group">
							<select name="jabatan" class="form-control" required="required">
                            	<option>--Pilih Jabatan--</option>
                                <option value="Project Manager">Project Manager</option>
                                <option value="Developer">Developer</option>
                                <option value="Quality Assurance">QA</option>
                                <option value="Web Design">Web Design</option>
                                <option value="Project Coordinator">Project Coordinator</option>
                            </select>
						</div>
						<div class="form-group">
							<strong>Tanggal Tugas</strong>
							<input type="date" name="tgl-tugas" class="form-control" >
						</div>
						<div class="form-group">
							<strong>Tanggal Kembali</strong>
							<input type="date" name="tgl-kembali" class="form-control" >
						</div>
						<div class="form-group">
							<input type="file" name="image" class="form-control">
						</div>
						<div class="form-group">
							<textarea name="pesan" class="form-control" rows="10" placeholder="Masukan Pesan anda . . ."></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<button type="reset" class="btn btn-danger">Batal</button>
						</div>
					</form>	
				</div>
		    </div>
		</div>
		<!-- End -->

		<!-- Footer -->
      	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
      	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
      	<!-- End -->