<?php

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level_anggota']==""){
		header("location:index.php?pesan=gagal");
	}
	
require '../functions.php';

$id_jadwal_guru = $_GET["id_jadwal_guru"];

	if (hapus_jadwal_guru($id_jadwal_guru) > 0) {
		echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'tabel_jadwal_guru.php';
		</script>
		";
	}else {
		echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'tabel_jadwal_guru.php';
		</script>
		";
	}

?>