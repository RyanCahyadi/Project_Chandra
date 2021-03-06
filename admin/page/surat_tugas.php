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
		<title>Admin - Surat Tugas</title>
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
		      			<li><a href="dashboard.php">Dashboard</a></li>
				        <li class="active"><a href="proses.php?page=surat-tugas">Form Surat Tugas</a></li>
				        <!-- <li><a href="laporan_tugas.php">Form Laporan Tugas</a></li> -->
				        <li><a href="proses.php?page=surat-karyawan">Laporan Surat Karyawan</a></li>
				        <li><a href="proses.php?page=laporan-karyawan">Laporan Tugas Karyawan</a></li>
				        <li><a href="proses.php?page=data-karyawan">Data Karyawan</a></li>
				        <li><a href="proses.php?page=data-project">Data Project</a></li>
		      		</ul>
		    	</div>
		    	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				    <h3>Surat Tugas</h3><hr>
					<form action="proses.php?page=create-surat-karyawan" method="POST" enctype="multipart/form-data">
    					<div class="form-group">
    						<select name="nama" class="form-control">
                            	<option>--Pilih Nama Karyawan--</option>
                                <?php 
                                $sql_karyawan = mysql_query("SELECT * FROM tbl_karyawan");
                                while ($row_karyawan = mysql_fetch_array($sql_karyawan)) {
                                ?>
                                <option value="<?= $row_karyawan['nama']; ?>"><?= $row_karyawan['nama']; ?></option>
                                <?php } ?>
                            </select>
    					</div>
    					<div class="form-group">
    						<select name="jk" class="form-control">
                                <option>--Pilih Jenis Kelamin--</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>                              
                            </select>
    					</div>
                        <div class="form-group">
                            <select name="jabatan" class="form-control">
                                <option>--Pilih Jabatan--</option>
                                <option value="Project Manager">Project Manager</option>
                                <option value="Developer">Developer</option>
                                <option value="Quality Assurance">QA</option>
                                <option value="Web Design">Web Design</option>
                                <option value="Project Coordinator">Project Coordinator</option>
                            </select>
                        </div>
    					<div class="form-group">
    						<select name="project" class="form-control">
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
    						<input type="number" name="no-surat" class="form-control" placeholder="Masukan No Surat . . .">
    					</div>
    					<div class="form-group">
    						<input type="date" name="tgl-tugas" class="form-control">
    					</div>
    					<div class="form-group">
                            <input type="date" name="tgl-kembali" class="form-control">
    					</div>
    					<div class="form-group">
                            <input type="file" name="image" class="form-control">
    					</div>
                        <div class="form-group">
                            <textarea name="pesan" class="form-control" placeholder="Masukan Pesan . . ."></textarea>
                        </div>
    					<div class="modal-footer">
		    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    				<button type="submit" class="btn btn-primary">Save</button>
	    				</div>
    				</form>	
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