<?php 

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level_anggota']==""){
		header("location:index.php?pesan=gagal");
	}
	
require '../functions.php';

$id_nilai = $_GET["id_nilai"];

	if (hapus_nilai($id_nilai) > 0) {
		echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'tabel_nilai.php';
		</script>
		";
	}else{
		echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'tabel_nilai.php';
		</script>
		";
	}

?>