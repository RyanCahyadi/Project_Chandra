<?php 
	
	session_start();
	require "koneksi.php";

	if ($_SESSION['username'] === NULL) {
		header("location:index.php");
	}

    $sql    = mysql_query("SELECT * FROM tbl_karyawan");
    $row    = mysql_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin - Surat Karyawan</title>
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
				        <li class="active"><a href="proses.php?page=surat-karyawan">Laporan Surat Karyawan</a></li>
				        <li><a href="proses.php?page=laporan-karyawan">Laporan Tugas Karyawan</a></li>
				        <li><a href="proses.php?page=data-karyawan">Data Karyawan</a></li>
				        <li><a href="proses.php?page=data-project">Data Project</a></li>
		      		</ul>
		    	</div>
		    	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		    		<h2>Data Surat Karyawan</h2>
    				<!-- Modal -->
    				<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-karyawan"><span class="glyphicon glyphicon-plus"></span>Tambah Surat Karyawan</button><br/><br/>
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
                            <form action="proses.php?page=filter-surat-karyawan&&id=<?= $row['id']; ?>" method="POST">
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
    				<div class="modal fade" id="modal-karyawan">
    					<div class="modal-dialog">
    						<div class="modal-content">
    							<div class="modal-header">
    								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    								<h4 class="modal-title" id="">Tambah Surat Karyawan</h4>
    							</div>
    							<div class="modal-body">
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
                                            <label>Tgl Tugas</label>
    										<input type="date" name="tgl-tugas" class="form-control">
    									</div>
    									<div class="form-group">
                                            <label>Tgl Kembali</label>
                                            <input type="date" name="tgl-kembali" class="form-control">
    									</div>
    									<div class="form-group">
                                            <label>Image</label>
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
    				</div>
    				<!-- End Modal -->
    				<table class="table table-hover table-responsive" id="datatables-surat-karyawan">
    					<thead>
    						<tr>
	    						<th>NO</th>
	    						<th>NAMA</th>
	    						<th>JENIS KELAMIN</th>
	    						<th>JABATAN</th>
	    						<th>PROJECT</th>
	    						<th>NO SURAT</th>
                                <th>TGL TUGAS</th>
                                <th>TGL KEMBALI</th>
                                <th>IMAGE</th>
                                <th>PESAN</th>
	    						<th>OPTION</th>
	    					</tr>
    					</thead>
    					<tbody>
    						<?php 
    						$no 	= 1;
						    $sql 	= mysql_query("SELECT * FROM tbl_surat WHERE tgl_tugas BETWEEN '$from' AND '$to'");
						    $nums 	= mysql_num_rows($sql);
    						while ($row = mysql_fetch_assoc($sql)) {
    					?>
    					<tr>
    						<td><?= $no++ ?></td>
    						<td><?= $row['nama']; ?></td>
    						<td><?= $row['jenis_kelamin']; ?></td>
    						<td><?= $row['jabatan']; ?></td>
    						<td><?= $row['project']; ?></td>
    						<td><?= $row['no_surat']; ?></td>
                            <td><?= $row['tgl_tugas']; ?></td>
                            <td><?= $row['tgl_kembali']; ?></td>
                            <td><a href="../assets/direct/<?= $row['image']; ?>"><img src="../assets/direct/<?= $row['image']; ?>" class="img-rounded" width="100" height="100"></a></td>
                            <td><?= $row['pesan']; ?></td>
    						<td>
    							<a href="proses.php?page=update-surat-karyawan&&id=<?= $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
    							<a href="proses.php?page=delete-surat-karyawan&&id=<?= $row['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus karyawan ini ?');"><span class="glyphicon glyphicon-trash"></span></a>
    							<a href="" onclick="window.open('detail/surat_tugas.php?id=<?= $row['id']; ?>').print();"><span class="glyphicon glyphicon-exclamation-sign"></span></a>
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
                $("#datatables-surat-karyawan").DataTable();
            });
        </script>
    </body>
</html>
      	<!-- End -->