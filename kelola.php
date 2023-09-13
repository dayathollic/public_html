
<!DOCTYPE html>


<?php 
	include'koneksi.php';

	$id_siswa = '';
	$nisn = '';
	$nama ='';
	$jenis_kelamin = '';
	$alamat = '';
		

	if(isset($_GET['ubah'])){
		$id_siswa = $_GET['ubah'];

		$query = "SELECT * FROM tb_siswa WHERE id = '$id_siswa';";
		$sql = mysqli_query($conn,$query);
		
		$result = mysqli_fetch_assoc($sql);

		$nisn = $result['nisn'];
		$nama = $result['nama'];
		$jenis_kelamin = $result['jenis_kelamin'];
		$alamat = $result['alamat'];

		// var_dump($result);

		// die();
	}

?>

<html>
<head>
	<meta charset="utf-8">
	<!--Bootstrap-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
	<title>belajar_crud</title>
</head>
<body>
	<nav class="navbar navbar-light bg-light mb-4">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">
	      CRUD 
	    </a>
	  </div>
	</nav>
	<div class="container">
	  <form method="POST" action="proses.php" enctype="multipart/form-data" >
	  	<input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
		  	<div class="mb-3 row">
		    <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
		    <div class="col-sm-10">
		      <input required type="text" class="form-control" name="nisn" id="nisn" placeholder="ex : 12345" value="<?php  echo $nisn ?>">
		    </div>
		  </div>

		  <div class="mb-3 row">
		    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
		    <div class="col-sm-10">
		      <input required type="text" class="form-control" id="nama" name="nama" placeholder="Supardi" value="<?php  echo $nama ?>">
		    </div>
		  </div>

		  <div class="mb-3 row">
		    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
		     <div class="col-sm-10">
		    	<select required id="jenis_kelamin" name="jenis_kelamin"class="form-select">
				  <!-- <option selected>--jenis kelamin--</option> -->
				  <option value="laki-laki" <?php if ($jenis_kelamin == 'laki-laki'){ echo "selected";} ?>>Laki-laki</option>
				  <option value="perempuan" <?php if ($jenis_kelamin == 'perempuan'){ echo "selected";} ?>>Perempuan</option>			  
				</select>	      
		     </div>
		  </div>

		  <div class="mb-3 row">
		    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
		    <div class="col-sm-10">
		      <textarea required class="form-control" id="alamat" name="alamat" rows="3"><?php  echo $alamat ?></textarea>
		    </div>
		  </div>

		  <div class="mb-3 row">
		    <label for="foto" class="col-sm-2 col-form-label">Foto Siswa</label>
		    <div class="col-sm-10">
		      <input <?php if(!isset($_GET['ubah'])){ echo "required";}   ?> class="form-control" type="file" id="foto" name="foto" accept="image/*">
		    </div>
		  </div>
		  <div class="mb-3 row mt-5">
		  	<div class="col">
		  		<?php 
		  			if(isset($_GET['ubah'])){
		  				?>
		  				<button type="submit" name="aksi" value="edit" class="btn btn-primary">
				  		<i class="fa fa-floppy-o" aria-hidden="true"></i>
				  		Simpan Perubahan
				  		</button>
				  	<?php
		  			}else {
		  			?>
		  				<button type="submit" name="aksi" value="add" class="btn btn-primary">
				  		<i class="fa fa-floppy-o" aria-hidden="true"></i>
				  		Tambahkan
				  		</button>
				  	
				  	<?php
		  			}
		  		?>
		  		
		  		<a href="index.php" type="button" class="btn btn-danger">	  		
			  	<i class="fa fa-step-backward" aria-hidden="true"></i>
				  Batal
				 </a>			  
			  	</div>
		  </div>  

	  </form>
	</div>
	
</body>
</html>
