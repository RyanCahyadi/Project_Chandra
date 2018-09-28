<?php 
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
		      			<li><a href="dashboard.php">Dashboard</a></li>
				        <li><a href="form_laporan_karyawan.php">Form Laporan Karyawan</a></li>
						<li><a href="laporan_karyawan.php">Laporan Tugas Karyawan</a></li>
		      		</ul>
		    	</div>
    			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		    		<h2>Profile</h2>
    				<form action="proses.php?page=edit-karyawan" method="POST">
			        	<div class="form-group">
			            	<input type="hidden" name="id" class="form-control" value="<?= $row['id']; ?>">
			            </div>
<!-- 			            <fieldset disabled> -->
				            <div class="form-group">
				            	<label>Nik</label>
				            	<input type="hidden" name="nik" class="form-control" value="<?= $row['nik']; ?>">
				                <input type="text" disabled class="form-control" value="<?= $row['nik']; ?>">
				    		</div>
<!-- 				    	</fieldset> -->
<!-- 	    				<fieldset disabled> -->
	    					<div class="form-group">
	    						<label for="disable-nama">Nama</label>
				            	<input type="hidden" name="nama" class="form-control" value="<?= $row['nama']; ?>">
	    				  		<input type="text" class="form-control" value="<?= $row['nama']; ?>" disabled>
	    					</div>
<!-- 	    				</fieldset> -->
    					<div class="form-group">
    						<label>No Telp</label>
    						<input type="number" name="no-telp" class="form-control" value="<?= $row['no_telp']; ?>">
    					</div>
    					<div class="form-group">
    						<label>Jenis Kelamin</label>
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
    						<label>Alamat</label>
    						<textarea name="alamat" class="form-control"><?= $row['alamat']; ?></textarea>
    					</div>
    					<!-- <div class="form-group">
    						<label>Username</label>
    						<input type="text" name="username" class="form-control" value="<?= $row['username']; ?>">
    					</div>
    					<div class="form-group">
    						<label>Password</label>
    						<input type="password" name="password" class="form-control" value="<?= $row['password']; ?>">
    					</div> -->
		                <div class="form-group">
		                  <button type="reset" class="btn btn-danger">Reset</button>
		                  <button type="submit" class="btn btn-primary">Simpan</button>
		                </div>	
		            </form>
		            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-change-password">Change Password</button>
		            <!-- Modal -->
					<div class="modal fade" id="modal-change-password" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
						    	<div class="modal-header">
						        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        	<h4 class="modal-title" id="myModalLabel">Change Password</h4>
						      	</div>
						      	<div class="modal-body">
							        <form action="proses.php?page=change-password" method="POST">
							        	<!-- <div class="form-group"> -->
							        		<input type="hidden" name="id" value="<?= $row['id']; ?>">
							        	<!-- </div> -->
							        	<div class="form-group">
				    						<label>Password Lama</label>
				    						<input type="password" name="password-lama" class="form-control">
				    					</div>
				    					<div class="form-group">
				    						<label>Password Baru</label>
				    						<input type="password" name="password-baru" class="form-control">
				    					</div>
				    					<div class="modal-footer">
									        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									    	<button type="submit" class="btn btn-primary">Save Password</button>
									    </div>
							        </form>
						      	</div>
						    </div>
						</div>
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