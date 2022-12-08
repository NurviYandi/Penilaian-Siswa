<?php 

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level_anggota']==""){
		header("location:index.php?pesan=gagal");
	}
	
require '../functions.php';

$id_kelas = $_GET["id_kelas"];

 	if (hapus_kelas($id_kelas) > 0) {
 		echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'tabel_kelas.php';
		</script>
		";
	}else {
		echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'tabel_kelas.php';
		</script>
		";
 	}
?>