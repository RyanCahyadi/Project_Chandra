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
<!-- 			            		<li><a href="profile.php">Profile</a></li> -->
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
		      			<li class="active"><a href="dashboard.php">Dashboard</a></li>
				        <li><a href="proses.php?page=surat-tugas">Form Surat Tugas</a></li>
				        <!-- <li><a href="laporan_tugas.php">Form Laporan Tugas</a></li> -->
				        <li><a href="proses.php?page=surat-karyawan">Laporan Surat Karyawan</a></li>
				        <li><a href="proses.php?page=laporan-karyawan">Laporan Tugas Karyawan</a></li>
				        <li><a href="proses.php?page=data-karyawan">Data Karyawan</a></li>
				        <li><a href="proses.php?page=data-project">Data Project</a></li>
		      		</ul>
		    	</div>
    			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		    		<h2>Welcome,</h2><b><?php echo $_SESSION['username']; ?></b>	
    			</div>
 			</div>
 		</div>
      	<!-- End -->

      	<!-- Footer -->
      	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
      	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>
      	<!-- End -->