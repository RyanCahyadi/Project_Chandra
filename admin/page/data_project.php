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
				        <li><a href="proses.php?page=surat-tugas">Form Surat Tugas</a></li>
				        <!-- <li><a href="laporan_tugas.php">Form Laporan Tugas</a></li> -->
				        <li><a href="proses.php?page=surat-karyawan">Laporan Surat Karyawan</a></li>
				        <li><a href="proses.php?page=laporan-karyawan">Laporan Tugas Karyawan</a></li>
				        <li><a href="proses.php?page=data-karyawan">Data Karyawan</a></li>
				        <li class="active"><a href="proses.php?page=data-project">Data Project</a></li>
		      		</ul>
		    	</div>
    			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    				<h2>Data Project</h2>
    				<p>Project saat ini berjumlah : <b></b></p>
    				<!-- Modal -->
    				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-project"><span class="glyphicon glyphicon-plus"></span>Tambah Project</button><br /><br />
    				<div class="modal fade" id="modal-project">
    					<div class="modal-dialog">
    						<div class="modal-content">
    							<div class="modal-header">
    								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    								<h4 class="modal-title" id="">Buat Project</h4>
    							</div>
    							<div class="modal-body">
    								<form action="proses.php?page=create-project" method="POST">
    									<div class="form-group">
    										<input type="text" name="project" class="form-control" placeholder="Masukan Nama Project . . .">
    									</div>
    									<div class="form-group">
    										<input type="text" name="customer" class="form-control" placeholder="Masukan Nama Customer . . .">
    									</div>
    									<div class="form-group">
    										<textarea name="pesan" class="form-control" placeholder="Masukan Pesan Anda . . ."></textarea>
    									</div>
    									<div class="form-group">
    										<input type="date" name="tgl-project" class="form-control">
    									</div>
    									<div class="modal-footer">
		    								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    								<button type="submit" class="btn btn-primary">Save</button>
	    								</div>
    								</form>
    							</div>
    						</div>
    					</div>
    				</div>
    				<!-- End Modal -->
    				<table class="table table-hover table-responsive" id="datatables-project">
    					<thead>
    						<tr>
	    						<th>NO</th>
	    						<th>PROJECT</th>
	    						<th>CUSTOMER</th>
	    						<th>PESAN</th>
	    						<th>TGL PROJECT</th>
	    						<th>OPTION</th>
	    					</tr>
    					</thead>
    					<tbody>
    						<?php 
    						$no 	= 1;
						    $sql 	= mysql_query("SELECT * FROM tbl_project ORDER BY project ASC");
						    $nums 	= mysql_num_rows($sql);
    						while ($row = mysql_fetch_assoc($sql)) {
    					?>
    					<tr>
    						<td><?= $no++ ?></td>
    						<td><?= $row['project']; ?></td>
    						<td><?= $row['customer']; ?></td>
    						<td><?= $row['pesan']; ?></td>
    						<td><?= $row['tgl_project']; ?></td>
    						<td>
    							<a href="proses.php?page=update-project&&id=<?= $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
    							<a href="proses.php?page=delete-project&&id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus project ini ?');"><span class="glyphicon glyphicon-trash"></span></a>
    							<a href=""><span class="glyphicon glyphicon-exclamation-sign"></span></a>
    						</td>
    					</tr>
    					<?php } ?>
    					</tbody>
    				</table>
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