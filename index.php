<?php
	include'koneksi.php';


	$query = "SELECT * FROM tb_siswa";
	$sql = mysqli_query($conn,$query);
	$no = 0;

	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--Bootstrap-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="datatables/datatables.css">
	<script type="text/javascript" src="datatables/datatables.js"></script>

	<title>belajar_crud</title>
</head>

<script type="text/javascript">
	$(document).ready( function () {
    $('#dt').DataTable();
	} );
</script>

<body>
	<nav class="navbar navbar-light bg-light">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	      CRUD 
	    </a>
	  </div>
	</nav>
	<!--judul-->
	<div class="container">
		<h1 class="mt-3">Data Siswa</h1>
		<figure>
		  <blockquote class="blockquote">
		    <p>Bersisi data yang telah disimpan di db</p>
		  </blockquote>
		  <figcaption class="blockquote-footer">
		    CRUD <cite title="Source Title">create read update delete</cite>
		  </figcaption>
		</figure>
		<a href="kelola.php" type="button" class="btn btn-primary mb-2">
			<i class="fa fa-plus"></i>
		Tambah Data
		</a>

		<?php if(isset($_SESSION['eksekusi'])):  ?>

		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>
		  	<?php echo $_SESSION['eksekusi']; ?>
		  </strong> 
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>

	   <?php   session_destroy();     endif; ?>			
		
			<div class="table-responsive">
			  <table id="dt" class="table align-middle table-bordered table-hover">
			    <thead>
			      <tr>
			      	<th><center>No.</center></th>
			        <th>Nisn</th>
			        <th>Nama</th>
			        <th>Jenis Kelamin</th>
			        <th>Alamat</th>
			        <th>Foto Siswa</th>
			        <th>Aksi</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php
				    	while($result = mysqli_fetch_assoc($sql)){							
						
					?>
			      <tr>
			        <td><center><?php echo ++$no;?></center></td>
			        <td><?php echo $result['nisn'];?></td>
			        <td><?php echo $result['nama'];?></td>
			        <td><?php echo $result['jenis_kelamin'];?></td>
			        <td><?php echo $result['alamat'];?></td>
			        <td><img src="img/<?php echo $result['foto'];?>" style="width:150px"></td>		
			        <td>
			        	<a href="kelola.php?ubah=<?php echo $result['id'];?>" type="button" class="btn btn-success">
			        		<i class="fa fa-pencil"></i>			        	
			        	</a>
			        	<a href="proses.php?hapus=<?php echo $result['id'];?>" type="button" class="btn btn-danger" onclick = "return confirm('apakah anda yakin menhgapus data tersebut?')">
			        		<i class="fa fa-trash"></i>
			        	</a>
			        </td>
			      </tr>	

			      <?php 
			      	}
			      ?>		      
			    </tbody>
			  </table>
			</div>
	</div>
</body>
</html>
