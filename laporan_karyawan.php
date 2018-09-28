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
		<title>Admin - Laporan Karyawan</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
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
						<li class="active"><a href="laporan_karyawan.php">Laporan Tugas Karyawan</a></li>
		      		</ul>
		    	</div>
		    	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		    		<h2>Laporan Tugas Karyawan</h2>
    				<label>Filter</label>
    				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-filter"><span class="glyphicon glyphicon-triangle-bottom"></span></button><br/><br/>
    				<!-- Modal -->
    				<div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			          <div class="modal-dialog" role="document">
			            <div class="modal-content">
			              <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                <h4 class="modal-title" id="myModalLabel">Filter</h4>
			              </div>
			              <div class="modal-body">
			                <form action="proses.php?page=proses-filter&&id=<?= $row['id']; ?>" method="POST">
			                 	<div class="form-group">
			                  		<label>Dari Tanggal</label>
			                  		<input type="date" name="from" class="form-control">
			                  	</div>
			                  	<div class="form-group">
			                  		<label>Sampai Tanggal</label>
			                  		<input type="date" name="to" class="form-control">
			                  	</div>
			                  	<div class="modal-footer">
			                    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                    	<button type="submit" class="btn btn-primary">Cari</button>
			                  	</div>
			                </form>
			              </div>
			            </div>
			          </div>
        			</div>
    				<!-- End -->
    				<table class="table table-hover table-responsive" id="datatables-lapkaryawan">
    					<thead>
    						<tr>
	    						<th>NO</th>
	    						<th>NAMA</th>
	    						<th>PROJECT</th>
                                <th>JABATAN</th>
	    						<th>TGL TUGAS</th>
	    						<th>TGL KEMBALI</th>
	    						<th>IMAGE</th>
	    						<!-- <th>PESAN</th> -->
	    						<th>OPTION</th>
	    					</tr>
    					</thead>
    					<tbody>
    						<?php 
    						$no 	= 1;
						    $sql 	= mysql_query("SELECT * FROM tbl_laporank WHERE nama = '$sess'");
						    $nums 	= mysql_num_rows($sql);
    						while ($row = mysql_fetch_assoc($sql)) {
    					?>
    					<tr>
    						<td><?= $no++ ?></td>
    						<td><?= $row['nama']; ?></td>
    						<td><?= $row['project']; ?></td>
                            <td><?= $row['jabatan']; ?></td>
    						<td><?= $row['tgl_tugas']; ?></td>
    						<td><?= $row['tgl_kembali']; ?></td>
    						<td><a href="assets/direct/<?= $row['image']; ?>"><img src="assets/direct/<?= $row['image']; ?>" width="100" height="100" class="img-rounded"></a></td>
    						<!-- <td><?= $row['pesan']; ?></td> -->
    						<td>
    							<!-- <a href="proses.php?page=update-laporan-karyawan&&id=<?= $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
    							<a href="proses.php?page=delete-laporan-karyawan&&id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus karyawan ini ?');"><span class="glyphicon glyphicon-trash"></span></a> -->
    							<a href="" onclick="window.open('admin/detail/laporan_karyawan.php?id=<?= $row['id']; ?>').print();"><span class="glyphicon glyphicon-exclamation-sign"></span></a>
    						</td>
    					</tr>
    					<?php } ?>
    					</tbody>
    				</table>
                    
		    	</div>
		    </div>
		</div>

		<!-- Footer -->
      	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
      	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
      	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#datatables-lapkaryawan").DataTable();
			});
		</script>
    </body>
</html>
      	<!-- End -->