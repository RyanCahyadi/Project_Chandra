<?php 
	
	session_start();
	require "admin/koneksi.php";

	if ($_SESSION['login'] === NULL) {
		header("location:index.php");
	}

	$sess 	= $_SESSION['login'];

	$sql 	= mysql_query("SELECT * FROM tbl_karyawan WHERE nama = '$sess'");
	$row 	= mysql_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin - Dashboard</title>
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
		      			<li class="active"><a href="dashboard.php">Dashboard</a></li>
				        <li><a href="form_laporan_karyawan.php">Form Laporan Karyawan</a></li>
						<li><a href="laporan_karyawan.php">Laporan Tugas Karyawan</a></li>
		      		</ul>
		    	</div>
    			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		    		<div class="">
		    			<h2>VISION</h2>
		    			<p>Our vision is to to become Enterprises' trusted IT advisor in navigating and winning in this globalized world. Indonesia would've become an international tech hub, exporting software and IT services. We would like to build a culture where local Indonesian talents will be proud to work in Indonesia.</p>
		    		</div>
		    		<div class="">
		    			<h2>VALUES</h2>
		    			<p>We abide by 8 values: Do the right things, Empathy, Challenge, Learning, Optimism, Perseverance, Balance & Enjoyment, Respect & Appreciation.</p>
		    		</div>
		    		<div class="">
		    			<h2>GREAT SOLUTIONS</h2>
		    			<h5>DOES NOT NEED TO BE COMPLICATED</h5>
		    			<p>Walden Global Services (WGS) is an Enterprise software solution SI company headquartered in Singapore, with delivery team in multiple sites in Indonesia. Our mission is to strengthen client's IT capacity and capabilities, automate their business processes; allowing them to innovate through technology.</p>
		    		</div>
		    		<div class="">
		    			<h2>CULTURE</h2>
		    			<p>
		    				Culture is what enables us to grow:
		    				<ol>
		    					<li>Discipline</li>
		    					<li>Passion to learn</li>
		    					<li>Excellence</li>
		    				</ol>
		    			</p>
		    		</div>
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