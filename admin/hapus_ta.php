<?php  

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level_anggota']==""){
		header("location:index.php?pesan=gagal");
	}
	
require '../functions.php';

$id_ta = $_GET["id_ta"];
	
	if (hapus_ta($id_ta) > 0) {
		echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'tabel_ta.php';
		</script>
		";
	}else {
		echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'tabel_ta.php';
		</script>
		";
	}
?>