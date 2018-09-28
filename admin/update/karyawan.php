<?php 
	
	session_start();
	require "koneksi.php";

	if ($_SESSION['username'] === NULL) {
		header("location:index.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin - Dashboard</title>
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
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
		      			<li><a href="dashboard.php">Dashboard</a></li>
				        <li><a href="proses.php?page=surat-tugas">Form Surat Tugas</a></li>
				        <!-- <li><a href="laporan_tugas.php">Form Laporan Tugas</a></li> -->
				        <li><a href="proses.php?page=surat-karyawan">Laporan Surat Karyawan</a></li>
				        <li><a href="proses.php?page=laporan-karyawan">Laporan Tugas Karyawan</a></li>
				        <li class="active"><a href="proses.php?page=data-karyawan">Data Karyawan</a></li>
				        <li><a href="proses.php?page=data-project">Data Project</a></li>
		      		</ul>
		    	</div>
    			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    				<h2>Update Data Karyawan</h2>
    				  <form action="proses.php?page=edit-karyawan" method="POST">
			          	<div class="form-group">
			            	<input type="hidden" name="id" class="form-control" value="<?= $row['id']; ?>">
			            </div>
			            <div class="form-group">
			                <input type="text" name="nik" class="form-control" value="<?= $row['nik']; ?>">
			    		</div>
    					<div class="form-group">
    				  		<input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>">
    					</div>
    					<div class="form-group">
    						<input type="number" name="no-telp" class="form-control" value="<?= $row['no_telp']; ?>">
    					</div>
    					<div class="form-group">
    						<select name="jk" class="form-control">
								<?php 
									if ($row['jenis_kelamin'] == "Pria") 
									{
								?>
								<option value="<?php echo $row['jenis_kelamin'] ?>"><?php echo $row['jenis_kelamin'] ?></option>
								<option value="Wanita">Wanita</option>
								<?php 
									} elseif ($row['jenis_kelamin'] == "Wanita") {
								?>
								<option value="<?php echo $row['jenis_kelamin']; ?>"><?php echo $row['jenis_kelamin']; ?></option>
								<option value="Pria">Pria</option>
								<?php 
									} 
								?>
							</select>
    					</div>
    					<div class="form-group">
    						<textarea name="alamat" class="form-control"><?= $row['alamat']; ?></textarea>
    					</div>
		                <div class="form-group">
		                  <button type="reset" class="btn btn-danger">Reset</button>
		                  <button type="submit" class="btn btn-primary">Simpan</button>
		                </div>
    				</form>
    			</div>
 			</div>
 		</div>
      	<!-- End -->

      	<!-- Footer -->
      	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
      	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
      	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#datatables-project").DataTable();
			});
		</script>
    </body>
</html>
      	<!-- End -->