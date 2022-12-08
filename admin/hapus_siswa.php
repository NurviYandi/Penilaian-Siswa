<?php 

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level_anggota']==""){
		header("location:index.php?pesan=gagal");
	}
	
require '../functions.php';

$nis = $_GET["nis"];
	
	if (hapus_siswa($nis) > 0) {
		echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'tabel_siswa.php';
		</script>
		";
	}else {
		echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'tabel_siswa.php';
		</script>
		";
	}
?>