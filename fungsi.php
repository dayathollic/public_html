<?php 
include'koneksi.php';

	function tambah_data($data, $files){

			$jenis_kelamin	= $data['nisn'];
			$nama			= $data['nama'];
			$jenis_kelamin	= $data['jenis_kelamin'];

			$split			= explode('.', $files['foto']['name']);
			$ekstensi 		= $split[count($split)-1];
			
			$alamat 		= $data['alamat'];
			$foto			= @$nisn.".".$ekstensi;

			$dir 			= "img/";
			$tmpFile 		= $files['foto']['tmp_name'];

			move_uploaded_file($tmpFile, $dir.$foto);

			$query = "INSERT into tb_siswa VALUES(null, '@$nisn', '$nama', '$jenis_kelamin', '$foto', '$alamat')";
			$sql = mysqli_query($GLOBALS['conn'], $query);

			return true;

		}


	function ubah_data($data, $files){
			$id_siswa = $data['id_siswa'];	
			$nisn = $data['nisn'];			
			$nama = $data['nama'];
			$jenis_kelamin = $data['jenis_kelamin'];
			$alamat = $data['alamat'];

			$queryshow = "SELECT * FROM tb_siswa WHERE id = '$id_siswa';";
			$sqlshow = mysqli_query($GLOBALS['conn'], $queryshow);
			$result = mysqli_fetch_assoc($sqlshow);			

			if($files['foto']['name'] == ""){
				$foto = $result['foto'];	
			}else{
				$split = explode('.', $files['foto']['name']);
				$ekstensi = $split[count($split)-1];

				$foto = $result['nisn'].".".$ekstensi;
				unlink("img/".$result['foto']);
				move_uploaded_file($files['foto']['tmp_name'], 'img/'.$foto);
			}

			$query = "UPDATE tb_siswa SET id = '$id_siswa', nisn = '$nisn', nama = '$nama', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', foto = '$foto' WHERE  id = '$id_siswa';";
			$sql = mysqli_query($GLOBALS['conn'], $query);

			return true;
			
		}

	function hapus_data($data){
			$id_siswa = $data['hapus'];

			$queryshow = "SELECT * FROM tb_siswa where id = '$id_siswa';";
			$sqlshow = mysqli_query($GLOBALS['conn'], $queryshow);
			$result = mysqli_fetch_assoc($sqlshow);
			
			unlink("img/".$result['foto']);

			$query = "DELETE FROM tb_siswa WHERE id = '$id_siswa';";
			$sql = mysqli_query($GLOBALS['conn'], $query);

			return true;
		}


 ?>