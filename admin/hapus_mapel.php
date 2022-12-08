<?php  

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level_anggota']==""){
		header("location:index.php?pesan=gagal");
	}
	
require '../functions.php';

$id_mapel = $_GET["id_mapel"];
	
	if (hapus_mapel($id_mapel) > 0) {
		echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'tabel_mapel.php';
		</script>
		";
	}else {
		echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'tabel_mapel.php';
		</script>
		";
	}
?>